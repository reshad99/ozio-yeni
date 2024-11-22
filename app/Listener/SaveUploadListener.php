<?php

namespace App\Listeners;

use App\Events\SaveUploadEvent;
use App\Models\Upload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SaveUploadListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param SaveUploadEvent $event
     * @return void
     */
    public function handle(SaveUploadEvent $event)
    {
        /**
         * @var \Illuminate\Http\UploadedFile $file
         */
        $file = $event->file;

        /**
         * @var Model $model
         */
        $model = $event->model;
        /**
         * @var string $type
         */
        $type = $event->type;
        /**
         * @var bool $overwrite
         */
        $overwrite = $event->overwrite;

        $uploadId = $event->uploadId;

        if ($type == null) {
            $type = 'default';
        }


        $upload = new Upload();
        $upload->setOriginalName($file->getClientOriginalName());
        $upload->setSize($file->getSize());
        if ($file->getMimeType() !== null) {
            $upload->setMimeType($file->getMimeType());
        }
        $ext = $file->getClientOriginalExtension();

        $upload->generateObjectKey($ext);
        $upload->setExtension($ext);
        $upload->setType($type);

        /**
         * @var ?int $uploadId
         */
        $uploadId = $event->uploadId;
        if ($overwrite && isset($uploadId) && $uploadId != null) {
            //get upload
            $oldUpload = Upload::where('id', $uploadId)->first();
            $oldUpload->delete();
            $event->uploadId = null;
        }

        /** @phpstan-ignore-next-line */
        if ($model instanceof Model) {
            $upload->setUploadable($model);
        }

        //save file
        Storage::disk('local')->putFileAs(
            'public/uploads',
            $file,
            $upload->getObjectKey(),
            [
                'visibility' => 'public',
                'directory_visibility' => 'public'
            ]
        );

        $upload->save();

        $event->uploadId = $upload->id;
        $event->filePath = $upload->getObjectKey();
    }
}
