<?php

namespace App\Http\Controllers\Frontend\File;

use App\Http\Controllers\Controller;
use App\Http\Methods\ReCaptchaValidation;
use App\Models\BlogArticle;
use App\Models\FileEntry;
use App\Models\FileReport;
use Auth;
use Illuminate\Http\Request;
use Session;
use Validator;

class ViewFileController extends Controller
{
    public function index($shared_id)
    {
        $fileEntry = FileEntry::where('shared_id', $shared_id)->notExpired()->firstOrFail();
        abort_if(!static::accessCheck($fileEntry), 404);
        if (!is_null($fileEntry->password)) {
            if (!Session::has(filePasswordSession($fileEntry->shared_id))) {
                return redirect(route('file.password', $fileEntry->shared_id));
            } else {
                $password = decrypt(Session::get(filePasswordSession($fileEntry->shared_id)));
                if ($password != $fileEntry->password) {
                    return redirect(route('file.password', $fileEntry->shared_id));
                }
            }
        }
        $fileEntry->increment('views');
        $blogArticles = BlogArticle::where('lang', getLang())->with(['blogCategory', 'admin'])->orderbyDesc('id')->limit(6)->get();
        return view('frontend.file.view', ['fileEntry' => $fileEntry, 'blogArticles' => $blogArticles]);
    }

    public function embed($shared_id)
    {
        $fileEntry = FileEntry::where('shared_id', $shared_id)->notExpired()->firstOrFail();
        abort_if(!static::accessCheck($fileEntry), 404);
        if (!is_null($fileEntry->password)) {
            if (!Session::has(filePasswordSession($fileEntry->shared_id))) {
                return redirect(route('file.password', $fileEntry->shared_id));
            } else {
                $password = decrypt(Session::get(filePasswordSession($fileEntry->shared_id)));
                if ($password != $fileEntry->password) {
                    return redirect(route('file.password', $fileEntry->shared_id));
                }
            }
        }
        return view('frontend.file.embed', ['fileEntry' => $fileEntry]);
    }

    public function reportFile(Request $request, $shared_id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'reason' => ['required', 'integer', 'min:0', 'max:4'],
            'details' => ['required', 'string', 'max:600'],
        ] + ReCaptchaValidation::validate());
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error);
            }
            return back();
        }
        $fileEntry = FileEntry::where('shared_id', $shared_id)->notExpired()->first();
        if (is_null($fileEntry) || !static::accessCheck($fileEntry)) {
            toastr()->error(lang('Video not found, missing or expired', 'video page'));
            return back();
        }
        if (Auth::user()) {
            if ($fileEntry->user_id == Auth::user()->id) {
                toastr()->error(lang('Video not found, missing or expired', 'video page'));
                return back();
            }
        }
        if (!array_key_exists($request->reason, reportReasons())) {
            toastr()->error(lang('Invalid report reason', 'video page'));
            return back();
        }
        $alreadyReported = FileReport::where([['file_entry_id', $fileEntry->id], ['ip', vIpInfo()->ip]])
            ->OrWhere([['file_entry_id', $fileEntry->id], ['email', $request->email]])
            ->first();
        if (!is_null($alreadyReported)) {
            toastr()->error(lang('You have already reported this video', 'video page'));
            return back();
        }
        $createFileReport = FileReport::create([
            'file_entry_id' => $fileEntry->id,
            'ip' => vIpInfo()->ip,
            'name' => $request->name,
            'email' => $request->email,
            'reason' => $request->reason,
            'details' => $request->details,
        ]);
        if ($createFileReport) {
            $title = __('New report #') . $fileEntry->shared_id;
            $image = asset('images/icons/report.png');
            $link = route('admin.reports.view', $createFileReport->id);
            adminNotify($title, $image, $link);
            toastr()->success(lang('Your report has been sent successfully, we will review and take the necessary action', 'video page'));
            return back();
        }
    }

    public static function accessCheck($fileEntry)
    {
        if ($fileEntry->access_status) {
            return true;
        } else {
            if (Auth::user() && Auth::user()->id == $fileEntry->user_id) {
                return true;
            }
        }
        return false;
    }
}
