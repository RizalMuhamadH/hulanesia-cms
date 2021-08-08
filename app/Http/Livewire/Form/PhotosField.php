<?php

namespace App\Http\Livewire\Form;

use Livewire\Component;
use Livewire\WithFileUploads;

class PhotosField extends Component
{
    use WithFileUploads;

    public $photos;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    public function render()
    {
        return view('livewire.form.photos-field');
    }
}
