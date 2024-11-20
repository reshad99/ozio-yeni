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
        $file = $event->file;
        $model = $event->model;
        $type = $event->type;
        $overwrite = $event->overwrite;

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

        //check overwrite
        if ($overwrite && isset($event->uploadId) && $event->uploadId != null) {
            //get upload
            $oldUpload = Upload::where('id', $event->uploadId)->first();
            $oldUpload->delete();
            $event->uploadId = null;
        }

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
