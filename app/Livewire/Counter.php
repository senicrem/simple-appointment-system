<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $tasks;

    public function mount() {
        $this->tasks = []; // Tasks::all();
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
