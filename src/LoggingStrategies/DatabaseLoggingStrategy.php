<?php

namespace somarkn99\laravelDbBackupScheduling\LoggingStrategies;

use somarkn99\laravelDbBackupScheduling\Contracts\BackupLoggerInterface;



class DatabaseLoggingStrategy implements BackupLoggerInterface
{
    protected  $logFilePath;

    public function __construct()
    {
        $this->logFilePath = storage_path('logs/backup.log');
    }

    public function logBackupSuccess(string $file_path, int $size): void
    {
        $timestamp =  now()->toDateTimeString();

        $logMessage = "[$timestamp] File_Path: $file_path | Size: $size KB | Status: Success" . PHP_EOL;

        file_put_contents($this->logFilePath, $logMessage, FILE_APPEND);
    }

    // implementation function that appends the failure log to a file
    public function logBackupFailure(string $error): void
    {
        $timestamp =  now()->toDateTimeString();

        $logMessage = "[$timestamp] Backup Failure: $error | Status: Failure" . PHP_EOL;

        file_put_contents($this->logFilePath, $logMessage, FILE_APPEND);
    }

}
