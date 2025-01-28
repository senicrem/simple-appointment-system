<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class CustomCalendar extends Component
{
    public string $currDay;
    public string $currFullDay;
    public string $currYear;
    public string $selectedMonth;
    public array $calendatDateMatrix;
    public string $dateNow;
    
    public function mount () {
        $this->dateNow = Carbon::now()->format('Y-d-m');

        $this->selectedMonth = Carbon::now()->format('m');
        $this->currDay = Carbon::now()->format('d');
        $this->currFullDay = Carbon::now()->format('l');
        $this->currYear = Carbon::now()->year;
        $this->setCalendarDateMatrix();
    }

    public function setCalendarDateMatrix () {
        $startOfMonth = Carbon::create(
            $this->currYear,
            $this->selectedMonth,
            $this->currDay
        )->startOfMonth();
        
        $endOfMonth = Carbon::create(
            $this->currYear,
            $this->selectedMonth,
            $this->currDay
        )->endOfMonth();

        $matrix = [];
        $fulldayDict = [
            [ 'fday' => 'Sunday' ],
            [ 'fday' => 'Monday' ],
            [ 'fday' => 'Tuesday' ],
            [ 'fday' => 'Wednesday' ],
            [ 'fday' => 'Thursday' ],
            [ 'fday' => 'Friday' ],
            [ 'fday' => 'Saturday' ],
        ];

        $fdayIdx = array_filter($fulldayDict, function($arr) use ($startOfMonth) {
            return $arr['fday'] == $startOfMonth->dayName;
        });

        if (!is_null($fdayIdx)) {
            if (key($fdayIdx) != 0) {

                for ($i=0; $i < key($fdayIdx) ; $i++) { 
                    array_push($matrix, null);
                }
            }
        } 
        
        while ($startOfMonth <= $endOfMonth) {
            array_push($matrix, [
                'day' => $startOfMonth->day,
                'full_date' =>  Carbon::create(
                    $this->currYear,
                    $this->selectedMonth,
                    $startOfMonth->day,
                )->format('Y-d-m')
            ]);

            //increment
            $startOfMonth->addDay();
        }
        
        $this->calendatDateMatrix = $matrix;
    }

    public function changeMonth (string $direction) {
        $newSelectedMonthValue = $this->selectedMonth + ($direction === 'next' ? 1 : -1);

        if ($newSelectedMonthValue === 0) {
            $newSelectedMonthValue = 12;
        } else if ($newSelectedMonthValue === 13) {
            $newSelectedMonthValue = 1;
        }

        $this->selectedMonth = $newSelectedMonthValue;
        $this->setCalendarDateMatrix();
    }

    public function changeDate () {}

    public function changeYear () {}

    public function render() {
        return view('livewire.custom-calendar');
    }
}
