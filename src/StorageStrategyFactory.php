<?php

namespace somarkn99\laravelDbBackupScheduling;

use somarkn99\laravelDbBackupScheduling\Contracts\StorageStrategyInterface;
use somarkn99\laravelDbBackupScheduling\StorageStrategies\LocalStorageStrategy;
use somarkn99\laravelDbBackupScheduling\StorageStrategies\GoogleDriveStorageStrategy;

class StorageStrategyFactory
{
    public static function create($type): StorageStrategyInterface
    {
        switch ($type) {
            case 'local':
                return new LocalStorageStrategy();
            case 'google_drive':
                return new GoogleDriveStorageStrategy();
            default:
                throw new \InvalidArgumentException("Unsupported storage type: {$type}");
        }
    }
}
