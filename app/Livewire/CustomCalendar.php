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
    
    public function mount () {
        $this->selectedMonth = Carbon::now()->format('m');
        $this->currDay = Carbon::now()->format('d');
        $this->currFullDay = Carbon::now()->format('l');
        $this->currYear = Carbon::now()->year;
        $this->setCalendarDateMatrix();
    }

    public function getFullDayIndex (string $fullday) {
        $fullDayArray = [
            [ 'fday' => 'Sunday' ],
            [ 'fday' => 'Monday' ],
            [ 'fday' => 'Tuesday' ],
            [ 'fday' => 'Wednesday' ],
            [ 'fday' => 'Thursday' ],
            [ 'fday' => 'Friday' ],
            [ 'fday' => 'Saturday' ],
        ];

        $result = array_filter($fullDayArray, function($arr) use ($fullday) {
            return $arr['fday'] == $fullday;
        });

        if (is_null($result)) return null;
        return key($result);
    }

    public function setCalendarDateMatrix () {
        $dateNow = Carbon::now();
        $startOfMonth = Carbon::create($this->currYear, $this->selectedMonth, $this->currDay)->startOfMonth();
        $endOfMonth = Carbon::create($this->currYear, $this->selectedMonth, $this->currDay)->endOfMonth();
        $matrix = [];
        $fullDayIndex = $this->getFullDayIndex($startOfMonth->dayName);

        // add null before the start day
        if (!is_null($fullDayIndex)) {
            if ($fullDayIndex != 0) {

                for ($i=0; $i < $fullDayIndex ; $i++) { 
                    array_push($matrix, null);
                }
            }
        } 
        
        // add to matrix
        while ($startOfMonth <= $endOfMonth) {
            $fullDate = Carbon::create($this->currYear, $this->selectedMonth, $startOfMonth->day);

            array_push($matrix, [
                'day' => $startOfMonth->day,
                'is_the_current_day' => $fullDate->isSameDay($dateNow),
                'is_active_day' => $fullDate->isFuture($dateNow)
            ]);

            // increment
            $startOfMonth->addDay();
        }

        $this->calendatDateMatrix = $matrix;
    }

    public function changeMonth (string $direction) {
        $newSelectedMonthValue = $this->selectedMonth + ($direction === 'next' ? 1 : -1);

        if ($newSelectedMonthValue === 0) {
            $newSelectedMonthValue = 12;
            $this->currYear -= 1;
        } else if ($newSelectedMonthValue === 13) {
            $newSelectedMonthValue = 1;
            $this->currYear += 1;
        }

        $this->selectedMonth = $newSelectedMonthValue;
        $this->setCalendarDateMatrix();
    }

    public function render() {
        return view('livewire.custom-calendar');
    }
}
