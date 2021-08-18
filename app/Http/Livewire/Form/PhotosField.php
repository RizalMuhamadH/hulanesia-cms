<?php

namespace App\Http\Livewire\Form;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class PhotosField extends Component
{
    use WithFileUploads;

    public $photos;
    public $current;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024',
        ]);
    }

    public function mount($current)
    {
        $this->current = $current;
    }

    public function removeImg($index, $id)
    {
        $this->current->forget($index);
        Image::where('id', $id)->delete();
    }

    public function render()
    {
        return view('livewire.form.photos-field');
    }
}
