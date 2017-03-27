<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Order extends Mailable
{
    use Queueable, SerializesModels;



    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.orders')
//            ->with([
//                'orderName' => $this->order->name,
//                'orderPrice' => $this->order->price,
//            ]);
//            ->attach('/path/to/file', [
//                'as' => 'name.pdf',
//                'mime' => 'application/pdf',
//            ]);


//        $order = Order::findOrFail($orderId);

        // Ship order...

//        Mail::to($request->user())->send(new OrderShipped($order));




        ;
    }
}
