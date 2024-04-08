<?php

namespace App\Http\Controllers\Frontend\Storage;

use App\Http\Controllers\Controller;
use Exception;
use Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class LocalController extends Controller
{
    public static function upload($file, $location)
    {
        try {
            $filename = generateFileName($file);
            $path = "videos/" . $location;
            $upload = $file->move($path, $filename);
            if ($upload) {
                $data = [
                    "type" => "success",
                    "filename" => $filename,
                    "path" => $path . $filename,
                    "link" => url($path . $filename),
                ];
                return responseHandler($data);
            }
        } catch (Exception $e) {
            return responseHandler(["type" => "error", 'msg' => lang('Storage provider error', 'upload zone')]);
        }
    }

    public static function download($fileEntry)
    {
        try {
            if (file_exists($fileEntry->path)) {
                $headers = [
                    'Content-Type' => $fileEntry->mime,
                    'Content-Disposition' => 'attachment; filename="' . $fileEntry->name . '"',
                    'Content-Length' => $fileEntry->size,
                ];
                $fileName = $fileEntry->filename;
                $filePath = $fileEntry->path;
                $response = new StreamedResponse(
                    function () use ($filePath, $fileName) {
                        if ($file = fopen($filePath, 'rb')) {
                            while (!feof($file) and (connection_status() == 0)) {
                                print(fread($file, 1024 * 8));
                                flush();
                            }
                            fclose($file);
                        }
                    },
                    200, $headers);
                return $response;
            } else {
                throw new Exception(lang('There was a problem while trying to download the video', 'video page'));
            }
        } catch (Exception $e) {
            throw new Exception(lang('There was a problem while trying to download the video', 'video page'));
        }
    }

    public static function delete($filePath)
    {
        $disk = Storage::disk('direct');
        if ($disk->has($filePath)) {
            $disk->delete($filePath);
        }
        return true;
    }
}
