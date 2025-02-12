<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;

class AdminPage extends Component
{

    public function mount () {
        $appointments =  Appointment::forMonth(2)->groupBy('scheduled_date')->toArray();
        // dd($appointments);
    }

    
    public function render()
    {
        return view('livewire.admin-page');
    }
}
