<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\OneSignal\OneSignalChannel;
use NotificationChannels\OneSignal\OneSignalMessage;
use NotificationChannels\OneSignal\OneSignalWebButton;
use Illuminate\Notifications\Notification;

class SendPushNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    // public $connection = 'redis';

    public function __construct()
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [OneSignalChannel::class];
    }

    /**
     * Get the OneSignal representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return NotificationChannels\OneSignal\OneSignalMessage
     */
    public function toOneSignal($notifiable)
    {
        return OneSignalMessage::create()
            ->setSubject("Berita")
            ->setBody($notifiable->title)
            ->setIcon($notifiable->imagePath)
            ->setUrl($notifiable->url);
        // return OneSignalMessage::create()
        //     ->setSubject("test")
        //     ->setBody("test")
        //     ->setUrl("test")
        //     ->setButtons([
        //         OneSignalWebButton::create('View')
        //             ->text('button text')
        //             ->icon('button icon')
        //             ->url('http://127.0.0.1:8000/home')
        //     ]);
    }

    // public function routeNotificationForOneSignal()
    // {
    //     return ['included_segments' => ['Subscribed Users']];
    //     // return 'd12b7548-d246-4ff6-96c8-8c517352e87f';
    // }
}
