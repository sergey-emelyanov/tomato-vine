<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

trait Loggable
{
    protected static function bootLoggable()
    {

        static::created(function ($model) {
            $model->logEvent('created', [
                'attributes' => $model->getAttributes(),
                'id' => $model->getKey()
            ]);
        });

        static::updated(function ($model){
            $model->logEvent('updated', [
                'original' => $model->getOriginal(),
                'changes' => $model->getChanges(),
                'id' => $model->getKey()
            ]);
        });

        static::deleted(function ($model){
            $model->logEvent('deleted', [
                'id' => $model->getKey()
            ]);
        });


    }

    protected function logEvent(string $event, array $data)
    {
        $logPath = $this->getLogPath($event);

        tap(Log::build([
            'driver' => 'single',
            'path' => storage_path("logs/{$logPath}")
        ]), function ($logger) use ($event, $data){
            $logger->info($this->getLogMessage($event), $data);
        });
    }

    protected function getLogPath(string $event): string
    {
        $modelName = Str::kebab(class_basename($this));
        return "{$modelName}/{$event}.log";
    }

    protected function getLogMessage(string $event):string
    {
        $modelName = class_basename($this);
        $id = $this->getKey();

        return match($event) {
            'created' => "{$modelName} [ID: { $id}] created",
            'updated' => "{$modelName} [ID: { $id}] updated",
            'deleted' => "{$modelName} [ID: { $id}] deleted",
            default => "{$modelName} [ID: { $id}] $event",
        };
    }
}
