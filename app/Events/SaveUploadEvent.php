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

    /**
     * @var mixed The uploaded file.
     */
    public $file;

    /**
     * @var mixed The model instance associated with the upload.
     */
    public $model;

    /**
     * @var string|null The type of the file.
     */
    public $type;

    /**
     * @var bool Whether to overwrite existing files.
     */
    public $overwrite;

    /**
     * @var int|string|null The upload ID.
     */
    public $uploadId;

    /**
     * @var string|null The file path.
     */
    public $filePath = null;


    /**
     * Create a new event instance.
     *
     * @param mixed $file
     * @param mixed $model
     * @param string|null $type
     * @param bool $overwrite
     * @param int|string|null $uploadId
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
