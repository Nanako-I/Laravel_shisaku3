<?php
    
    
namespace App\Http\Livewire;


use Livewire\Component;

class Birthday extends Component
{
    public $birthday;

    public function render()
    {
        return view('livewire.birthday');
    }
}

