<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatUser extends Component
{
    public $message = '';
    
    public function render()
    {
        return view('livewire.chat-user');
    }

    public function mount()
    {
        //
    }

    public function sendMessage()
    {
        dd($this->message);
    }
}
