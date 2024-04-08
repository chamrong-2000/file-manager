<?php

namespace App\Http\Controllers\Backend\Uploads;

use App\Http\Controllers\Controller;
use App\Models\FileEntry;

class EmbedController extends Controller
{
    public function index($shared_id)
    {
        $fileEntry = FileEntry::where('shared_id', $shared_id)->notExpired()->firstOrFail();
        return view('backend.uploads.embed', ['fileEntry' => $fileEntry]);
    }
}
