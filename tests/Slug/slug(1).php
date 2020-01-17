<?php

//composer require spatie/laravel-sluggable

class Item extends Model
{
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->slug = str_slug($model->name);
        });
    }
}

?>