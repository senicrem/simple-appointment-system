<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class AdminPage extends Component
{
    public array $appointments = [];

    public function mount () {
        $this->appointments =  Appointment::forMonth(2)->groupBy('scheduled_date')->toArray();
    }

    
    public function render()
    {
        return view('livewire.admin-page');
    }
}
