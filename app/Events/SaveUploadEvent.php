<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SaveUploadEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    public $file;
    public $model;
    public $type;
    public $overwrite;
    public $uploadId;
    public $filePath = null;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($file, $model, $type = null, $overwrite = false, $uploadId = null)
    {
        $this->file = $file;
        $this->model = $model;
        $this->type = $type;
        $this->overwrite = $overwrite;
        $this->uploadId = $uploadId;
    }
}
