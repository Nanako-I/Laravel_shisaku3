<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class AgeInput extends Component
{
    public $birthday;
    public $age;

    public function updatedBirthday($value)
    {
        $this->age = Carbon::parse($value)->age;
    }

    public function render()
    {
        return view('livewire.age-input');
    }
}
