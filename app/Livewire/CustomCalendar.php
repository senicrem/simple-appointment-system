<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;

class CustomCalendar extends Component
{
    public string $currDay;
    public string $currFullDay;
    public string $currYear;
    public string $selectedMonth;
    public array $calendatDateMatrix;
    public string $selectedDate;
    public object $appointments;
    
    public function mount () {
        $dateNow = Carbon::now();
        // dd(Appointment::all());
        $this->selectedMonth = $dateNow->format('m');
        $this->currDay = $dateNow->format('d');
        $this->currFullDay = $dateNow->format('l');
        $this->currYear = $dateNow->year;
        $this->selectedDate = $dateNow->toDateString();

        $this->setCalendarDateMatrix();
        $this->getAppointmentsByDate($dateNow->toDateString());
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
        $startOfMonth = Carbon::create($this->currYear, $this->selectedMonth, $this->currDay, 0, 0, 0)->startOfMonth();
        $endOfMonth = Carbon::create($this->currYear, $this->selectedMonth, $this->currDay, 0, 0, 0)->endOfMonth();
        $matrix = [];
        $fullDayIndex = $this->getFullDayIndex($startOfMonth->dayName);
        Log::info($this->selectedMonth);
        Log::info($startOfMonth->toDateString());
        Log::info($endOfMonth->toDateString());
        // endOfMonthLog::info($startOfMonth->toDateString());

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
                'date' => $fullDate->toDateString(),
                'is_the_current_day' => $fullDate->isSameDay($dateNow),
                'is_active_day' => $fullDate->isFuture($dateNow),
                'is_weekend' => $fullDate->isWeekend(),
            ]);

            // increment
            if ($startOfMonth != $endOfMonth) {
                $startOfMonth->addDay();
            }
        }

        $this->calendatDateMatrix = $matrix;
    }

    public function getAppointmentsByDate(string $date) {
        $this->appointments = Appointment::where('scheduled_date', $date)->get();
    }

    public function setSelectedDate (string $date) {
        $this->selectedDate = $date;  
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
        Log::info("changeMonth funcs {$newSelectedMonthValue}");

        $this->selectedMonth = $newSelectedMonthValue;
        $this->setCalendarDateMatrix();
    }

    public function render() {
        return view('livewire.custom-calendar');
    }
}
