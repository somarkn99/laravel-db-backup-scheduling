<?php

namespace somarkn99\laravelDbBackupScheduling\Contracts;

interface StorageStrategyInterface
{
    public function save($filePath): bool;
    public function delete($filePath): bool;
}
