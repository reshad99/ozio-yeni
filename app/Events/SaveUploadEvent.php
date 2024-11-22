<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;

class SaveUploadEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     * @var UploadedFile $file
     */
    public $file;
    /**
     *  @var string $model
     */
    public $model;
    /**
     *  @var ?string $type
     */
    public $type;
    /**
     *  @var bool $overwrite
     */
    public $overwrite;
    /**
     *  @var ?int $uploadId
     */
    public $uploadId;
    /**
     *  @var string $filePath
     */
    public $filePath = null;


    /**
     * Create a new event instance.
     *
     * @param UploadedFile $file
     * @param string $model
     * @param ?string $type
     * @param bool $overwrite
     * @param ?int $uploadId
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
