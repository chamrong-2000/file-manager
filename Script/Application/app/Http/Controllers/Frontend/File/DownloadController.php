<?php

namespace App\Http\Controllers\Frontend\File;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\File\ViewFileController;
use App\Models\FileEntry;
use Illuminate\Http\Request;
use Session;

class DownloadController extends Controller
{
    public function createDownloadLink(Request $request, $shared_id)
    {
        if (!uploadSettings()->upload->allow_downloading) {
            toastr()->error(lang('There was a problem while trying to download the video', 'alerts'));
            return back();
        }
        $fileEntry = FileEntry::where('shared_id', $shared_id)->notExpired()->first();
        if (is_null($fileEntry) || !ViewFileController::accessCheck($fileEntry)) {
            return jsonError(lang('Video not found, missing or expired', 'video page'));
        }
        if (!is_null($fileEntry->password)) {
            if (!Session::has(filePasswordSession($fileEntry->shared_id))) {
                return jsonError(lang('Unauthorized access', 'alerts'));
            } else {
                $password = decrypt(Session::get(filePasswordSession($fileEntry->shared_id)));
                if ($password != $fileEntry->password) {
                    return jsonError(lang('Unauthorized access', 'alerts'));
                }
            }
        }
        $request->session()->put(fileDownloadSession($fileEntry->shared_id), true);
        return response()->json([
            'type' => 'success',
            'download_link' => route('file.download.approval', $fileEntry->shared_id),
        ]);
    }

    public function download($shared_id)
    {
        $fileEntry = FileEntry::where('shared_id', $shared_id)->notExpired()->firstOrFail();
        abort_if(!ViewFileController::accessCheck($fileEntry), 404);
        if (!is_null($fileEntry->password) && !Session::has(fileDownloadSession($fileEntry->shared_id))) {
            return redirect(route('file.password', $fileEntry->shared_id));
        }
        if (!Session::has(fileDownloadSession($fileEntry->shared_id))) {
            return redirect()->route('file.view', $fileEntry->shared_id);
        }
        try {
            $handler = $fileEntry->storageProvider->handler;
            Session::forget(fileDownloadSession($fileEntry->shared_id));
            $fileEntry->increment('downloads');
            $download = $handler::download($fileEntry);
            if ($fileEntry->storageProvider->symbol == "local") {
                return $download;
            } else {
                return redirect($download);
            }
        } catch (Exception $e) {
            toastr()->error(lang('There was a problem while trying to download the video', 'alerts'));
            return redirect()->route('file.view', $fileEntry->shared_id);
        }
    }
}
