<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Carbon\Carbon;

class AdminPage extends Component
{
    public array $appointments = [];
    public int $month = 0;

    public function mount () {
        $currMonth = Carbon::now()->format('m');

        $this->month = $currMonth;
        $this->setSessionsByMonth($currMonth);
    }

    public function setSessionsByMonth (int $month) {
        $sessions = Appointment::forMonth($month)
            ->groupBy('scheduled_date')
            ->toArray();

        $this->appointments = $sessions;
    }

    public function changeMonth ($optVal) : void {
        $month = (int) $optVal;

        $this->month = $month;
        $this->setSessionsByMonth($month);
    }   

    
    public function render()
    {
        return view('livewire.admin-page');
    }
}
