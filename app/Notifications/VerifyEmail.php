<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class verifyEmail extends Notification
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
      return call_user_func(static::$toMailCallback, $notifiable);
    }

    return (new MailMessage)
    ->subject(Lang::getFromJson('Verifique el correo electronico'))
    ->line(Lang::getFromJson('Haga click en el boton de abajo para verificar el correo electronico.'))
    ->action(
      Lang::getFromJson('Verificar Email'),
      $this->verificationUrl($notifiable)
      )
      ->line(Lang::getFromJson('Si usted no ha creado la cuenta no se necesita ninguna accion.'));
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
