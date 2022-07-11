<?php

namespace App\Http\Livewire\Form;

use App\Notifications\SendPushNotification;
use App\Repository\PushNotification;
use Livewire\Component;

class NotificationForm extends Component
{

    public $title;
    public $description;
    public $image;
    public $url;
    public $segment;
    public function render()
    {
        // return view('livewire.form.notification-form');
        return view('livewire.form.notification-form')->extends('layouts.app')->section('body');
    }

    public function submit()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'required',
            'image' => 'required',
            'segment' => 'required'
        ]);

        $push = new PushNotification();
        $push->sendNotificationSegment($this->title, $this->segment, $this->url, $this->description, $this->image);

        // auth()->user()->notify(new SendPushNotification(null, $this->title, $this->description, $this->image, $this->url, $this->segment));

        $this->dispatchBrowserEvent('swal:response', [
            'title' => 'Notification has been send.',
            'type'  => 'success'
        ]);

    }
}
