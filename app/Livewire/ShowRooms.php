<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;

class ShowRooms extends Component
{
    public $rooms;
    public function mount()
    {
        $this->rooms = Room::all(); // Fetch all rooms
    }

    public function render()
    {
        return view('livewire.show-rooms');
    }
}
