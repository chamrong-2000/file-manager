<?php

namespace App\Http\Controllers\Backend\Uploads;

use App\Http\Controllers\Controller;
use App\Models\FileEntry;
use Illuminate\Http\Request;

class GuestUploadsController extends Controller
{
    public function index(Request $request)
    {
        $unviewedFiles = FileEntry::where('admin_has_viewed', 0)->guestEntry()->notExpired()->get();
        if (count($unviewedFiles) > 0) {
            foreach ($unviewedFiles as $unviewedFile) {
                $unviewedFile->admin_has_viewed = 1;
                $unviewedFile->save();
            }
        }
        if ($request->has('search')) {
            $q = $request->search;
            $fileEntries = FileEntry::where(function ($query) {
                $query->guestEntry();
            })->where(function ($query) use ($q) {
                $query->where('shared_id', 'like', '%' . $q . '%')
                    ->OrWhere('name', 'like', '%' . $q . '%')
                    ->OrWhere('filename', 'like', '%' . $q . '%')
                    ->OrWhere('mime', 'like', '%' . $q . '%')
                    ->OrWhere('size', 'like', '%' . $q . '%')
                    ->OrWhere('extension', 'like', '%' . $q . '%');
            })->notExpired()->with('storageProvider')->orderbyDesc('id')->paginate(30);
            $fileEntries->appends(['search' => $q]);
        } else {
            $fileEntries = FileEntry::guestEntry()->notExpired()->with('storageProvider')->orderbyDesc('id')->paginate(30);
        }
        $totalUploads = FileEntry::guestEntry()->notExpired()->count();
        $usedSpace = FileEntry::guestEntry()->notExpired()->sum('size');
        return view('backend.uploads.guests.index', [
            'fileEntries' => $fileEntries,
            'totalUploads' => formatNumber($totalUploads),
            'usedSpace' => formatBytes($usedSpace),
        ]);
    }

    public function view($shared_id)
    {
        $fileEntry = FileEntry::where('shared_id', $shared_id)->guestEntry()->notExpired()->with('storageProvider')->firstOrFail();
        return view('backend.uploads.guests.view', ['fileEntry' => $fileEntry]);
    }

    public function downloadFile($shared_id)
    {
        $fileEntry = FileEntry::where('shared_id', $shared_id)->guestEntry()->notExpired()->with('storageProvider')->firstOrFail();
        try {
            $handler = $fileEntry->storageProvider->handler;
            $download = $handler::download($fileEntry);
            if ($fileEntry->storageProvider->symbol == "local") {
                return $download;
            } else {
                return redirect($download);
            }
        } catch (\Exception$e) {
            toastr()->error($e->getMessage());
            return back();
        }
    }

    public function destroy($shared_id)
    {
        $fileEntry = FileEntry::where('shared_id', $shared_id)->guestEntry()->notExpired()->with('storageProvider')->firstOrFail();
        try {
            $handler = $fileEntry->storageProvider->handler;
            $delete = $handler::delete($fileEntry->path);
            if ($delete) {
                $fileEntry->delete();
                toastr()->success(__('Deleted successfully'));
                return redirect()->route('admin.uploads.guests.index');
            }
        } catch (\Exception$e) {
            toastr()->error($e->getMessage());
            return back();
        }
    }

    public function destroySelected(Request $request)
    {
        if (empty($request->delete_ids)) {
            toastr()->error(__('You have not selected any file'));
            return back();
        }
        try {
            $fileEntriesIds = explode(',', $request->delete_ids);
            $totalDelete = 0;
            foreach ($fileEntriesIds as $fileEntryId) {
                $fileEntry = FileEntry::where('id', $fileEntryId)->guestEntry()->notExpired()->with('storageProvider')->first();
                if (!is_null($fileEntry)) {
                    $handler = $fileEntry->storageProvider->handler;
                    $handler::delete($fileEntry->path);
                    $fileEntry->forceDelete();
                    $totalDelete += 1;
                }
            }
            if ($totalDelete != 0) {
                $countFiles = ($totalDelete > 1) ? $totalDelete . ' ' . __('Files') : $totalDelete . ' ' . __('File');
                toastr()->success($countFiles . ' ' . __('deleted successfully'));
                return back();
            } else {
                toastr()->info(__('No files have been deleted'));
                return back();
            }
        } catch (\Exception$e) {
            toastr()->error($e->getMessage());
            return back();
        }
    }
}
