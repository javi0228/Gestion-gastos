<?php

namespace App\Http\Livewire;

use Auth;
use Livewire\Component;

class MenageChat extends Component
{

    /**
     * Chat users
     */
    public $users;

    /**
     * Chat's menage
     */
    public $menage;
    
    /**
     * List of sent messages in the chat
     */
    public $messages;
    
    /**
     * Message to send
     */
    public $message;

    public function mount($menage)
    {
        // Get menage of the chat and users from menage
        $this->menage = $menage;
        $this->users = $this->menage->users;
        $this->getMessages();
    }

    /**
     * Get all the chat messages
     */
    public function getMessages()
    {
        // Aux variable to check new messages
        $messagesAux = $this->messages;

        $this->messages = $this->menage->chat ? $this->menage->chat()->orderBy('created_at')->get() : [];

        // check if there are new messages
        if ($messagesAux)
            if (count($this->messages) != count($messagesAux))
                $this->emit('message-sended');
    }

    public function render()
    {
        return view('livewire.menage-chat');
    }

    public function sendMessage()
    {
        if ($this->message)
            // Create message on chat
            $this->menage->chat()->create([
                'user_id' => Auth::user()->id,
                'message' => $this->message
            ]);

        unset($this->message);
    }
}