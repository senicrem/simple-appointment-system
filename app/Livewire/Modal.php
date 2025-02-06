<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class Modal extends Component
{
    public bool $isOpen = false;

    // Listen for the 'openModal' event with the parameter
    protected $listeners = [
        'openModal' => 'modalSwitch'
    ];

    #[On('open-modal')] 
    public function modalSwitch (bool $value = false) {
        $this->isOpen  = $value;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
