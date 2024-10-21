<?php

namespace App\Mail;

use App\Models\Booking; // Correct import
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;
    public $statusMessage;

    /**
     * Create a new message instance.
     *
     * @param Booking $booking
     * @param string $statusMessage
     */
    public function __construct(Booking $booking, string $statusMessage)
    {
        $this->booking = $booking;
        $this->statusMessage = $statusMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Booking Status Update')
                    ->view('emails.booking_status')
                    ->with([
                        'booking' => $this->booking,
                        'statusMessage' => $this->statusMessage,
                    ]);
    }
}
