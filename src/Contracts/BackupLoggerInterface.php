<?php

namespace somarkn99\laravelDbBackupScheduling\Contracts;

interface BackupLoggerInterface
{
    // Log backup success
    public function logBackupSuccess(string $file_path, int $size): void;
    // Log backup failures
    public function logBackupFailure(string $error): void;
}
