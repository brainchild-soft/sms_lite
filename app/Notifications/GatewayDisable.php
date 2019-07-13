<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class GatewayDisable extends Notification 
{
    public $GatewayUser;
    public $Gateway;
    public $Action;
    //use Queueable;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($GatewayUser, $Gateway, $Action)
    {
        $this->name = $GatewayUser['name'];
        $this->CustomerId = $GatewayUser['CustomerId'];
        $this->Gateway = $Gateway;
        $this->Action = $Action;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Gateway Switching')
            ->view('email.GatewaySwitchEmail', 
                [
                    'name' => $this->name,
                    'CustomerId' => $this->CustomerId,
                    'Gateway' => $this->Gateway,
                    'Action' => $this->Action,
                ]
        );

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
            //
        ];
    }
}
