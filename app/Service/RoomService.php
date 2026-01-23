<?php
namespace App\Service;

use App\Models\Room;

class RoomService
{
    public function getRoom(int $authUserId, int $participantId)
    {
        $room = Room::where(function ($query) use ($authUserId) {
            $query->where('creator_user_id', $authUserId)
                  ->orWhere('participant_user_id', $authUserId);
        })->where(function ($query) use ($participantId) {
            $query->where('creator_user_id', $participantId)
                  ->orWhere('participant_user_id', $participantId);
        })->first();


        if(!$room) {
            $room = Room::create([
                'creator_user_id' => $authUserId,
                'participant_user_id' => $participantId,
            ]);
        }

        return $room;
    }
}