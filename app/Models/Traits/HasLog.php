<?php

namespace App\Models\Traits;

use App\Models\Log;
use App\Events\FinishLogEvent;
use App\Events\StoredLogEvent;
use App\Listeners\FinishLogListener;

trait HasLog
{
    public static function bootHasLog(): void
    {
        static::creating(function($model){
            static::handleCreating($model);
        });

        static::updating(function($model){
            static::handleUpdating($model);
        });

        static::deleting(function ($model)  {
            static::handleDeleting($model);
        });
    }


    public static function handleCreating($model) : void
    {
        $attributes = $model->getAttributes();
        foreach($attributes as $key => $value){
            if (in_array($key, ['created_at', 'updated_at', 'deleted_at', 'published_at'])) {
                continue; // просто пропускаем эти поля
            }
            $log = New Log;
            StoredLogEvent::dispatch($log);
            $log -> model = class_basename($model);
            $log -> method = 'Creating';
            $log -> old_value = $key . '';
            $log -> new_value = $key . ': ' . $value ?? '';
            $log ->save();
            FinishLogEvent::dispatch($log);
        }
    }

    public static function handleUpdating($model):void
    {
        $attributes = $model->getAttributes();
        $origin = $model->getOriginal();
        foreach($attributes as $key => $value){
            $log = New Log;
            $log -> model = class_basename($model);
            $log -> method = 'Updating';
            $log -> old_value = $key . ': ' . $origin[$key] ?? '';
            $log -> new_value = $key . ': ' . $value ?? '';
            $log ->save();
        }
    }

    public static function handleDeleting($model)
    {
        $attributes = $model->getAttributes();
        foreach($attributes as $key=>$value){
            $log = new Log;
            $log->model = class_basename($model);
            $log->method = 'Deleting';
            $log->old_value = $key . ': ' . $value ?? '';
            $log->new_value =  $key . ': ' . '';
            $log->save();
        }
    }
}
