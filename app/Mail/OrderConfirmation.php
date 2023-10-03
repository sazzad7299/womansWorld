<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $orders;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orders,$subject)
    {
        $this->orders = $orders;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->subject;
        $order = Order::where('id',$this->orders)->with('orderDetails')->first();
        return $this->view('emails.order')
        ->subject($subject)
        ->with([
            'order' => $order,
        ]);
    }
}
