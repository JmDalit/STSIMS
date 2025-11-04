<?php

namespace App\Mail\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $firstname;

    /**
     * Create a new message instance.
     */
    public function __construct($otp, $firstname)
    {
        $this->otp = $otp;
        $this->firstname = $firstname;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Otp Request Mail',
        );
    }

    /**
     * Get the message content definition.
     */

    public function build()
    {
        return $this->subject('STSIMS One-Time Password Verification')
            ->view(('otpMail'))
            ->with([
                'otp' => $this->otp,
                'firstname' => $this->firstname,
            ]);
    }
}
