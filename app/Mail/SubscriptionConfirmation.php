<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Subscriber;

class SubscriptionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $subscriber;

    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function build()
    {
        // config([
        //     'mail.mailers.smtp.username' => env('NEWSLETTER_MAIL_USERNAME'),
        //     'mail.mailers.smtp.password' => env('NEWSLETTER_MAIL_PASSWORD'),
        //     'mail.from.address' => env('NEWSLETTER_MAIL_FROM_ADDRESS'),
        //     'mail.from.name' => env('NEWSLETTER_MAIL_FROM_NAME'),
        // ]);

        return $this->from(env('NEWSLETTER_MAIL_FROM_ADDRESS'))
                    ->subject('Confirmación de suscripción')
                    ->view('emails.subscription_confirmation')
                    ->with('subscriber', $this->subscriber);
    }
    
}
