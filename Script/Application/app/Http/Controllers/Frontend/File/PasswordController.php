<?php

namespace App\Http\Controllers\Frontend\File;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Frontend\File\ViewFileController;
use App\Models\FileEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;

class PasswordController extends Controller
{
    public function index(Request $request, $shared_id)
    {
        $fileEntry = FileEntry::where('shared_id', $shared_id)->notExpired()->firstOrFail();
        abort_if(!ViewFileController::accessCheck($fileEntry), 404);
        if (is_null($fileEntry->password)) {
            return redirect()->route('file.view', $fileEntry->shared_id);
        }
        if (Session::has(filePasswordSession($fileEntry->shared_id))) {
            $password = decrypt(Session::get(filePasswordSession($fileEntry->shared_id)));
            if ($password == $fileEntry->password) {
                return redirect()->route('file.view', $fileEntry->shared_id);
            }
        }
        return view('frontend.file.password', ['fileEntry' => $fileEntry]);
    }

    public function unlock(Request $request, $shared_id)
    {
        $validator = Validator::make($request->all(), [
            'password' => ['required'],
        ]);
        if ($validator->fails()) {
            foreach ($validator->errors()->all() as $error) {
                toastr()->error($error);
            }
            return back()->withInput();
        }
        $fileEntry = FileEntry::where([['shared_id', $shared_id], ['password', '!=', null]])->notExpired()->first();
        if (is_null($fileEntry) || !ViewFileController::accessCheck($fileEntry)) {
            toastr()->error(lang('Unauthorized action', 'alerts'));
            return back();
        }
        if (is_null($fileEntry->password)) {
            return redirect()->route('file.view', $fileEntry->shared_id);
        }
        if (Hash::check($request->password, $fileEntry->password)) {
            $request->session()->put(filePasswordSession($fileEntry->shared_id), encrypt($fileEntry->password));
            return redirect()->route('file.view', $fileEntry->shared_id);
        } else {
            toastr()->error(lang('Incorrect password', 'video password'));
            return back();
        }
    }
}
