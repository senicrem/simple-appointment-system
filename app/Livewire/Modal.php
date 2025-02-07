<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class Modal extends Component
{
    public bool $isOpen = false;
    public string $date;

    // Listen for the 'openModal' event with the parameter
    protected $listeners = [
        'openModal' => 'modalSwitch'
    ];

    #[On('open-modal')] 
    public function modalSwitch (bool $value = false, string $date = "") {
        if ($value === false) {
            $this->$date = '';
            $this->isOpen = false;
            return;
        }

        $this->date = $date;
        $this->isOpen  = $value;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
