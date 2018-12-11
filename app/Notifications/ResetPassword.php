<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
         if (static::$toMailCallback) {
             return call_user_func(static::$toMailCallback, $notifiable, $this->token);
         }

         return (new MailMessage)
             ->subject(Lang::getFromJson('Reiniciar la contrseña'))
             ->line(Lang::getFromJson('Esta recibiendo esta notificacion por que se ha realizado una peticion de reinicio de contraseña para su cuenta.'))
             ->action(Lang::getFromJson('Reiniciar contraseña'), url(config('app.url').route('password.reset', $this->token, false)))
             ->line(Lang::getFromJson('Si usted no ha pedido el reinicio de contraseña no necesita hacer nada mas, aunque se recomienda el cambio de contraseña en caso de acceso no permitido a su cuenta.'));
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
