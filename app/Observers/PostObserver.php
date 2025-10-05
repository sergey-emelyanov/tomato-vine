<?php

namespace App\Observers;

use App\Models\Log;
use App\Models\Post;
use PhpParser\Node\Expr\New_;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {

    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }

    public function creating(Post $post): void
    {

        $attributes = $post->getAttributes();
        foreach($attributes as $key=>$value){
            $log = new Log;
            $log->model = 'Post';
            $log->method = 'Creating';
            $log->old_value = "";
            $log->new_value = $value;
            $log->save();
        }
    }

    public function updating(Post $post): void
    {
        $old_values = $post->getOriginal();
        $diff = $post->getDirty();
        foreach($diff as $key=>$value){
            $log = new Log;
            $log->model = 'Post';
            $log->method = 'Updating';
            $log->old_value = $old_values[$key];
            $log->new_value = $value;
            $log->save();
        }
    }

    public function retrieved (Post $post): void
    {
        $attributes = $post->getAttributes();
        foreach($attributes as $attr){
            $log = new Log;
            $log->model = 'Post';
            $log->method = 'Retrieving';
            $log->old_value = $attr ?? '';
            $log->new_value = $attr ?? '';
            $log->save();
        }
    }

    public function deleting(Post $post)
    {
        $attributes = $post->getAttributes();
        foreach($attributes as $key=>$value){
            $log = new Log;
            $log->model = 'Post';
            $log->method = 'Deleting';
            $log->old_value = $value ?? '';
            $log->new_value = '';
            $log->save();
        }
    }
}
