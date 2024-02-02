<?php

namespace somarkn99\laravelDbBackupScheduling\StorageStrategies;

use somarkn99\laravelDbBackupScheduling\Contracts\StorageStrategyInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class LocalStorageStrategy implements StorageStrategyInterface
{
    public function save($filePath): bool
    {
        $date = Carbon::now()->format('Y-m-d');
        $filename = "backup-{$date}.gz";
        $backupPath = storage_path("app/backup/{$filename}");

        // Build the command using environment variables and the target path
        $command = sprintf(
            "mysqldump --user=%s --password=%s --host=%s %s | gzip > %s",
            escapeshellarg(env('DB_USERNAME')),
            escapeshellarg(env('DB_PASSWORD')),
            escapeshellarg(env('DB_HOST')),
            escapeshellarg(env('DB_DATABASE')),
            escapeshellarg($backupPath)
        );

        $returnVar = null;
        $output = null;

        // Execute the command
        exec($command, $output, $returnVar);

        // Check if the command was successful
        return $returnVar === 0;
    }



    public function delete($filePath): bool
    {
        // Assuming $filePath is the relative path from the disk's root to the file
        try {
            if (Storage::disk('local')->exists($filePath)) {
                return Storage::disk('local')->delete($filePath);
            }
            return false;
        } catch (\Exception $e) {
            // Log error or handle exception
            return false;
        }
    }
}
