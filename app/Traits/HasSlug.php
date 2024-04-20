<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

trait HasSlug
{
    public static function bootHasSlug(): void
    {
        static::saving(function (Model $model) {
            $model->slug = $model->generateSlug($model->title);
        });
    }

    protected function generateSlug(string $title): string
    {
        return Str::slug($title).'-'.Str::of(Str::random(3))->lower()->__toString();
    }
}
