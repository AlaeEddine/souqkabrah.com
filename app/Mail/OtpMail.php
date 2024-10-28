<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Setting;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;
    public $code;

    /**
     * Create a new message instance.
     */
    public function __construct($code)
    {
        $this->code = $code;
    }

    /*
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail From AMSGT',
        );
    }


     * Get the message content definition.

    public function content($data): Content
    {
        return new Content(
            markdown: 'mail.contact.index',
        );
    }*/

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function build()
    {
        return $this->markdown('emails.otp.index')->from(Setting::where('id',1)->first()->emailresponse)->subject('OTP')->with('code',$this->code);
    }

}
