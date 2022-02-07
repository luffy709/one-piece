<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    protected mixed $lastname;
    protected mixed $firstname;
    protected mixed $email;
    protected mixed $message;


    public function __construct($infos)
    {
        $this->lastname = $infos['lastname'];
        $this->firstname = $infos['firstname'];
        $this->email = $infos['email'];
        $this->message = $infos['message'];
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
                    ->line('Nom: ' . $this->lastname)
                    ->line('Prenom: ' . $this->firstname)
                    ->line('Email: ' . $this->email)
                    ->line('Message:')
                    ->line($this->message);
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
