<?php

namespace App\Http\Methods;

use App\Models\FileEntry;
use App\Models\UploadSettings;
use Auth;

class UploadSettingsManager
{
    public static function handler()
    {
        $uploadSettings = static::guests();
        if (Auth::user()) {
            $uploadSettings = static::users();
        }
        return json_decode(json_encode($uploadSettings));
    }

    private static function guests()
    {
        $uploadSetting = UploadSettings::where([['symbol', 'guests'], ['status', 1]])->first();
        if (!is_null($uploadSetting)) {
            $storageSpace = $uploadSetting->storage_space ? intval($uploadSetting->storage_space) : null;
            $fileSize = $uploadSetting->file_size ? intval($uploadSetting->file_size) : null;
            $filesDuration = $uploadSetting->files_duration ? intval($uploadSetting->files_duration) : null;
            $data = [
                "active" => true,
                "upload" => [
                    "storage_space" => $storageSpace,
                    "file_size" => $fileSize,
                    "files_duration" => $filesDuration,
                    "upload_at_once" => intval($uploadSetting->upload_at_once),
                    "password_protection" => $uploadSetting->password_protection,
                    "allow_downloading" => $uploadSetting->allow_downloading,
                    "advertisements" => $uploadSetting->advertisements,
                ],
                "formates" => [
                    "storage_space" => static::storageSpace($storageSpace),
                    "file_size" => static::maxFileSize($fileSize),
                    "files_duration" => static::filesDuration($filesDuration),
                ],
                "storage" => [
                    "used" => [
                        "number" => static::getClientUsedSpace(),
                        "format" => formatBytes(static::getClientUsedSpace()),
                    ],
                    "remining" => [
                        "number" => $storageSpace ? ($storageSpace-static::getClientUsedSpace()) : null,
                        "format" => $storageSpace ? formatBytes(($storageSpace-static::getClientUsedSpace())) : null,
                    ],
                    "fullness" => static::storageFullness($uploadSetting),
                ],
            ];
        } else {
            $uploadSetting = UploadSettings::where('symbol', 'guests')->first();
            $data = [
                "active" => false,
                "upload" => [
                    "allow_downloading" => $uploadSetting->allow_downloading,
                    "advertisements" => $uploadSetting->advertisements,
                ],
            ];
        }
        return $data;
    }

    private static function users()
    {
        $uploadSetting = UploadSettings::where('symbol', 'users')->first();
        $storageSpace = $uploadSetting->storage_space ? intval($uploadSetting->storage_space) : null;
        $fileSize = $uploadSetting->file_size ? intval($uploadSetting->file_size) : null;
        $filesDuration = $uploadSetting->files_duration ? intval($uploadSetting->files_duration) : null;
        $data = [
            "active" => true,
            "upload" => [
                "storage_space" => $storageSpace,
                "file_size" => $fileSize,
                "files_duration" => $filesDuration,
                "upload_at_once" => intval($uploadSetting->upload_at_once),
                "password_protection" => $uploadSetting->password_protection,
                "allow_downloading" => $uploadSetting->allow_downloading,
                "advertisements" => $uploadSetting->advertisements,
            ],
            "formates" => [
                "storage_space" => static::storageSpace($storageSpace),
                "file_size" => static::maxFileSize($fileSize),
                "files_duration" => static::filesDuration($filesDuration),
            ],
            "storage" => [
                "used" => [
                    "number" => static::getClientUsedSpace(),
                    "format" => formatBytes(static::getClientUsedSpace()),
                ],
                "remining" => [
                    "number" => $storageSpace ? ($storageSpace-static::getClientUsedSpace()) : null,
                    "format" => $storageSpace ? formatBytes(($storageSpace-static::getClientUsedSpace())) : null,
                ],
                "fullness" => static::storageFullness($uploadSetting),
            ],
        ];
        return $data;
    }

    private static function storageSpace($storageSpace)
    {
        if (is_null($storageSpace)) {
            return "∞";
        } else {
            return formatBytes($storageSpace);
        }
    }

    private static function maxFileSize($maxFileSize)
    {
        if (is_null($maxFileSize)) {
            return lang('Unlimited');
        } else {
            return formatBytes($maxFileSize);
        }
    }

    private static function filesDuration($filesDuration)
    {
        if (is_null($filesDuration)) {
            return lang('Unlimited time');
        } else {
            return formatDays($filesDuration);
        }
    }

    private static function getClientUsedSpace()
    {
        if (Auth::user()) {
            $usedSpace = FileEntry::currentUser()->notExpired()->sum('size');
        } else {
            $usedSpace = FileEntry::where([['ip', vIpInfo()->ip], ['user_id', null]])->notExpired()->sum('size');
        }
        return intval($usedSpace);
    }

    private static function storageFullness($uploadSetting)
    {
        $fullnessPercentage = $uploadSetting->storage_space ? (static::getClientUsedSpace() * 100) / $uploadSetting->storage_space : 0;
        return round($fullnessPercentage, 1);
    }
}
