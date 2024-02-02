<?php

namespace somarkn99\laravelDbBackupScheduling\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BackupStatusNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $status;
    public $date;
    public $fileSize;
    public $errorMessage;

    public function __construct($status, $date, $fileSize, $errorMessage = null)
    {
        $this->status = $status;
        $this->date = $date;
        $this->fileSize = $fileSize;
        $this->errorMessage = $errorMessage;
    }

    public function build()
    {
        return $this->view('laravelDbBackupScheduling::emails.backup_status')
            ->with([
                'status' => $this->status,
                'date' => $this->date,
                'fileSize' => $this->fileSize,
                'errorMessage' => $this->errorMessage,
            ]);
    }
}
