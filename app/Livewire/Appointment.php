<?php

namespace App\Livewire;

use Livewire\Component;

class Appointment extends Component
{
    public string $hello = "Hello World!";
    public $doctors = [
        ['id' => 1, 'name' => 'John Doe', 'job_title' => 'Doctor' ],
        ['id' => 2, 'name' => 'John Foe', 'job_title' => 'Dota Player' ],
    ];

    

    public function updateHello (string $text) {
        $this->hello = $text;
    }

    public function render()
    {
        return view('livewire.appointment', [
            'doctor' => $this->doctors
        ]);
    }
}
