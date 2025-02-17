<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Appointment;
use Carbon\Carbon;

class AdminPage extends Component
{
    public array $appointments = [];
    public int $month = 0;
    public int $year = 1800;

    public function mount () {
        $currMonth = Carbon::now()->format('m');
        $currYear = Carbon::now()->format('Y');
        
        $this->month = $currMonth;
        $this->year = $currYear;
        $this->setSessions($currMonth, $currYear);
    }

    public function setSessions (int $month, int $year) : void {
        $sessions = Appointment::getByMonthAndYear($month, $year)
            ->groupBy('scheduled_date')
            ->toArray();

        $this->appointments = $sessions;
    }

    public function changeMonth ($optVal) : void {
        $month = (int) $optVal;
        $year = (int) $this->year;

        $this->month = $month;
        $this->setSessions($month, $year);
    }
    
    public function changeYear ($optVal) : void {
        $year = (int) $optVal;
        $month = (int) $this->month;
        
        $this->year = $year;
        $this->setSessions($month, $year);
    }   
    
    public function render()
    {
        return view('livewire.admin-page');
    }
}
