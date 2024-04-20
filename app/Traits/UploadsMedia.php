<?php

namespace App\Traits;

use Spatie\MediaLibrary\MediaCollections\FileAdder;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

trait UploadsMedia
{
    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function uploadMedia($file, $collection = 'default', $fileName = null): FileAdder
    {
        $media = $this->addMedia($file);

        $media->preservingOriginal();

        if ($fileName !== null) {
            $media->usingFileName($fileName);
        }

        $media->sanitizingFileName(function ($fileName) {
            return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
        })
            ->toMediaCollection($collection);

        return $media;
    }

    /**
     * @throws FileCannotBeAdded
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function uploadMediaFromUrl($url, $collection = 'default', $fileName = null): FileAdder
    {
        $media = $this->addMediaFromUrl($url);

        $media->preservingOriginal();

        if ($fileName !== null) {
            $media->usingFileName($fileName);
        }

        $media->sanitizingFileName(function ($fileName) {
            return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
        })
            ->toMediaCollection($collection);

        return $media;
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function uploadMediaFromRequest($requestName, $collection = 'default', $fileName = null): FileAdder
    {
        $media = $this->addMediaFromRequest($requestName);

        $media->preservingOriginal();

        if ($fileName !== null) {
            $media->usingFileName($fileName);
        }

        $media->sanitizingFileName(function ($fileName) {
            return strtolower(str_replace(['#', '/', '\\', ' '], '-', $fileName));
        })
            ->toMediaCollection($collection);

        return $media;
    }

    // public function registerMediaConversions(Media $media = null): void
    // {
    //     $this
    //         ->addMediaConversion('preview')
    //         ->fit(Fit::Contain, 300, 300)
    //         ->nonQueued();
    // }
}
