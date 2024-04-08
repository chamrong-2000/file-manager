<?php

namespace App\Console\Commands;

use App\Models\FileEntry;
use Illuminate\Console\Command;

class DeleteExpiredVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uploads:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deleting the expired videos';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fileEntries = FileEntry::hasExpired()->get();
        foreach ($fileEntries as $fileEntry) {
            $handler = $fileEntry->storageProvider->handler;
            $delete = $handler::delete($fileEntry->path);
            if ($delete) {
                $fileEntry->delete();
            }
        }
    }
}
