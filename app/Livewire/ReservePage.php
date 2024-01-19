<?php

namespace App\Livewire;

use Livewire\Component;

class ReservePage extends Component
{
    public $name;
    public $email;
    public $message;

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'date' => 'required|date|after:today',
            'time' => 'required',
            'guests' => 'required|numeric|min:1',
        ]);

        // Handle the form submission logic, like saving to the database, sending an email, etc.

        session()->flash('message', 'Form submitted successfully.');

        $this->reset();
    }
    
    public function render()
    {
        return view('livewire.reserve-page');
    }
}
