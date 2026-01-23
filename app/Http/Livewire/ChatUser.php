<?php

namespace App\Http\Livewire;

//use App\Service\UserService;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Database\Eloquent\Collection;

class ChatUser extends Component
{
    public string          $message  =   '';
    public int|null        $participantId   = null;
    public int|null        $roomId          = null;
    public Collection|null $messages = null;
    public Collection|null $users    = null;
    
    public function render()
    {
        return view('livewire.chat-user');
    }

    public function mount()
    {
        $this->participantId = session('user_id');
        //$participantId = session('users_id');
        
        if (!$this->participantId) {
            //dd( $participantId , Auth::user()->id);
            $this->participantId = Auth::user()->id;
        }
        
        //dd( $participantId , Auth::user()->id);
        $this->setRoomByUserId();

        $this->users = (new \App\Service\UserService)->getOtherUsers(Auth::user());
    }

    public function sendMessage()
    {
        (new \App\Service\MessageService)->insertAndNotifyMessage($this->roomId, Auth::user()->id, $this->message);
        $this->message = '';
        $this->setRoomByUserId();
    }

    public function setRoomByUserId()
    {
        session(['user_id' => $this->participantId]);
        $room = (new \App\Service\RoomService)->getRoom(Auth::user()->id, $this->participantId);//talvez Auth::id().
        $this->messages = (new \App\Service\MessageService)->getMessageByRoomId($room->id);
    }
}
