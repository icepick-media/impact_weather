<?php

namespace App\Laravel\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use NotificationChannels\FCM\FCMMessage;

class MainNotification extends Notification implements ShouldQueue
{
     use Queueable;

    /**
     * The notification data.
     *
     */
    protected $data;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 3;

    /**
     * Set the notification data.
     *
     * @return void
     */
    protected function setData($data) {
        $this->data = collect($data);
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'fcm'];
    }

    /**
     * Get the fcm representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toFCM($notifiable)
    {

        $notification = [
            'title' => $this->data->get('title'),
            'body' => $this->data->get('content'),
        ];

        $data = [
            'title' => $this->data->get('title'),
            'body' => $this->data->get('content'),
            'type' => $this->data->get('type'),
            'reference_id' => $this->data->get('reference_id'),
            'thumbnail' => $this->data->get('thumbnail'),
        ];

        return (new FCMMessage())
            ->notification($notification)
            ->data($data);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => $this->data->get('type'),
            'reference_id' => $this->data->get('reference_id'),
            'title' => $this->data->get('title'),
            'content' => $this->data->get('content'),
            'thumbnail' => $this->data->get('thumbnail'),
        ];
    }
}
