<?php

namespace Modules\ProjectContract\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClientReview extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $mailData;
    public function __construct($mailData)
    {
        $this->mailData=$mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('portal@coloredcow.com')
            ->subject('Please review contract with coloredcow')
            ->view('projectcontract::client-review-mail');
    }
}