<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Appointment;
use Illuminate\Support\Facades\Log;

class Modal extends Component
{
    public bool $isOpen = false;
    public string $date;

    // Form
    public $form_name = '';
    public $form_email = '';
    public $form_concern = '';

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

    public function submitForm () {
        $slot = Appointment::create([
            'email' => $this->form_email,
            'name' => $this->form_name,
            'concern' => $this->form_concern,
            "scheduled_date" => $this->date
        ]);

        if ($slot) {
            $this->form_email = '';
            $this->form_name = '';
            $this->form_concern = '';
            $this->modalSwitch(false);
        }

    }

    public function render()
    {
        return view('livewire.modal');
    }
}
