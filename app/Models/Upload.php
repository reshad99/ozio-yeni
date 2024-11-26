<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Nonstandard\Uuid;

class Upload extends Model
{
    use SoftDeletes;

    //on created set size 031
    protected static function boot()
    {
        parent::boot();
        static::forceDeleted(function ($model) {
            //delete old file
            Storage::disk('local')->delete('public/uploads/' . $model->getObjectKey());
        });
    }

    // 'uploadable_id' => $this->upload->getUploadableId(),
    // 'uploadable_type' => $this->upload->getUploadableType(),

    public function getUploadableId(): ?int
    {
        return $this->attributes['uploadable_id'];
    }
    public function getUploadableType(): ?string
    {
        return $this->attributes['uploadable_type'];
    }

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'object_key',
        'size',
        'mime_type',
        'extension',
        'original_name',
        'uploadable_id',
        'uploadable_type',
        'type'
    ];

    /**      
     * @return MorphTo<Model, self>
     */
    public function uploadable(): MorphTo
    {
        return $this->morphTo();
    }

    public function setUploadable(Model $model): void
    {
        $this->uploadable()->associate($model);
    }

    public function setOriginalName(string $name): void
    {
        $this->attributes['original_name'] = $name;
    }

    public function setMimeType(string $mime): void
    {
        $this->attributes['mime_type'] = $mime;
    }

    public function setExtension(string $ext): void
    {
        $this->attributes['extension'] = $ext;
    }

    public function setSize(int $size): void
    {
        $this->attributes['size'] = $size;
    }

    /**
     * @param string|null $ext
     * @return Upload
     */
    public function generateObjectKey(?string $ext = null): self
    {
        $ext = $ext ? '.' . trim(trim($ext, '.')) : '';
        $key = date('/y/m/d/') . Uuid::uuid4() . $ext;
        $this->attributes['object_key'] = $key;
        return $this;
    }

    public function getObjectKey(): string
    {
        return $this->attributes['object_key'];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return (int) $this->attributes['id'];
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->attributes['size'];
    }

    /**
     * @return string
     */
    public function getMimeType(): string
    {
        return $this->attributes['mime_type'];
    }
    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->attributes['type'] = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->attributes['type'];
    }

    /**
     * @return string
     */
    public function getExtension(): string
    {
        return $this->attributes['extension'];
    }

    /**
     * @return string
     */
    public function getOriginalName(): string
    {
        return $this->attributes['original_name'];
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->attributes['created_at'];
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->attributes['updated_at'];
    }
}
