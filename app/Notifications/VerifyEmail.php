<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;

class verifyEmail extends Notification
{
  /**
   * The callback that should be used to build the mail message.
   *
   * @var \Closure|null
   */
  public static $toMailCallback;

  /**
   * Get the notification's channels.
   *
   * @param  mixed  $notifiable
   * @return array|string
   */
  public function via($notifiable)
  {
      return ['mail'];
  }

  /**
   * Build the mail representation of the notification.
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
          ->subject(Lang::getFromJson('Verificaion de email'))
          ->line(Lang::getFromJson('Este mensaje es un mensaje automatico para asegurar que usted ha solicitado el registro de una cuenta en nuestra plataforma.'))
          ->action(
              Lang::getFromJson('Verificar email'),
              $this->verificationUrl($notifiable)
          )
          ->line(Lang::getFromJson('Si usted no solicito el registro ignore este mensaje.'));
  }

  /**
   * Get the verification URL for the given notifiable.
   *
   * @param  mixed  $notifiable
   * @return string
   */
  protected function verificationUrl($notifiable)
  {
      return URL::temporarySignedRoute(
          'verification.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
      );
  }

  /**
   * Set a callback that should be used when building the notification mail message.
   *
   * @param  \Closure  $callback
   * @return void
   */
  public static function toMailUsing($callback)
  {
      static::$toMailCallback = $callback;
  }  }
