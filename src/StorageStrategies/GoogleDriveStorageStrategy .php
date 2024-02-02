<?php

namespace somarkn99\laravelDbBackupScheduling\StorageStrategies;

use somarkn99\laravelDbBackupScheduling\Contracts\StorageStrategyInterface;

class GoogleDriveStorageStrategy implements StorageStrategyInterface
{
    public function save($filePath): bool
    {
        // Implementation for saving the file to Google Drive
    }

    public function delete($filePath): bool
    {
        // Implementation for deleting the file from Google Drive
    }
}
