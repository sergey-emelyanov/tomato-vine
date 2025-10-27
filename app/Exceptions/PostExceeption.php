<?php

namespace App\Exceptions;

use Exception;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class PostExceeption extends Exception
{
    /**
     * Report the exception.
     */
    public function report(): void
    {
        //
    }

    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): Response
    {
        return response([
            'message' => 'already exists'
        ],HttpFoundationResponse::HTTP_UNPROCESSABLE_ENTITY);
    }

    public static function isPostAlreadyExists(Post $post)
    {
        if (!$post->wasRecentlyCreated) {
            throw new self();
        }
    }
}
