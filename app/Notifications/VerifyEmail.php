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
          ->subject(Lang::getFromJson('¡Verificame esta!'))
          ->line(Lang::getFromJson('Pues... si le das al boton verifica.'))
          ->action(
              Lang::getFromJson('Verifica email'),
              $this->verificationUrl($notifiable)
          )
          ->line(Lang::getFromJson('Si no fuiste tu el que creo la cuenta jaja salu2.'));
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
