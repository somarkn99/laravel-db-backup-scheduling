<?php

namespace somarkn99\laravelDbBackupScheduling\Console\Commands;

use Illuminate\Console\Command;
use somarkn99\laravelDbBackupScheduling\StorageStrategyFactory;

class BackupDatabase extends Command
{
    protected $signature = 'backup:database';
    protected $description = 'Backup the database and store it.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Example: Using LocalStorageStrategy, adjust accordingly
        $storageType = 'local';
        $storageStrategy = StorageStrategyFactory::create($storageType);

        $filePath = 'path/to/your/backup'; // Define your file path here
        $result = $storageStrategy->save($filePath);

        if ($result) {
            $this->info('Database backup was successful.');
        } else {
            $this->error('Database backup failed.');
        }
    }
}
