<?php

namespace somarkn99\laravelDbBackupScheduling\Console\Commands;

use Illuminate\Console\Command;

use somarkn99\laravelDbBackupScheduling\StorageStrategyFactory;

use somarkn99\laravelDbBackupScheduling\LoggingStrategies\DatabaseLoggingStrategy;


class BackupDatabase extends Command
{
    

    protected $signature = 'backup:database';
    protected $description = 'Backup the database and store it.';



    public function handle()
    {
        
        // Example: Using LocalStorageStrategy, adjust accordingly
        $storageType = 'local';
        $storageStrategy = StorageStrategyFactory::create($storageType);

        $filePath = 'path/to/your/backup'; // Define your file path here
        $result = $storageStrategy->save($filePath);

        // Create an instance object 
        $logger = new DatabaseLoggingStrategy('backup.log');

        if ($result) {
            $this->info('Database backup was successful.');

            // Size in Kbytes
            $size = round(filesize($file_path) / 1024, 2); 

            // Log the backup details
            $logger->logBackupSuccess($filePath ,$size);
            
        } else {
            $this->error('Database backup failed.');

            $logger->logBackupFailure('Backup failed due to an error.');
        }
    }
}
