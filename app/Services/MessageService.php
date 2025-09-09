<?php

namespace App\Services;

use App\Models\Message;

class MessageService
{
    public static function update(Message $message, array $data)
    {
        $message->update($data);
        return $message->refresh();
    }
}
