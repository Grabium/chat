<?php
namespace App\Service;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;

class MessageService
{
    public function getMessageByRoomId(int $roomId)
    {
        return Message::select(
            'messages.user_id',
            'messages.content',
            'messages.created_at',
            'users.name as user_name',
            'users.avatar as user_avatar'
        )->join('users', 'users.id', '=', 'messages.user_id')
            ->where('messages.room_id', $roomId)
            ->orderBy('messages.created_at', 'ASC')
            ->get();
        
        
    }

    public function insertAndNotifyMessage(int $roomId, int $authUserId, string $content): void
    {
        Message::create([
            'room_id'   =>  $roomId,
            'user_id'   =>  $authUserId,
            'content'   =>  $content
        ]);

        //falta notificar via mqtt
    }
}