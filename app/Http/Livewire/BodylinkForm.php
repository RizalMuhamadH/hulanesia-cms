<?php

namespace App\Http\Livewire;

use Livewire\Component;

class BodylinkForm extends Component
{
    public $count = 0;
    public function render()
    {
        if($this->count != 0){
            dd($this->count);
        }
        return view('livewire.bodylink-form');
    }
}
