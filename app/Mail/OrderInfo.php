<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderInfo extends Mailable
{
    use Queueable, SerializesModels;


    protected $order_id;
    protected $order_price;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order_id,$order_price)
    {
        $this->order_id=$order_id;
        $this->order_price=$order_price;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('order_info',['order_id'=>$this->order_id,'order_price'=>$this->order_price])
            ->from('onlineshop228@gmail.com','Online shop')
            ->to($this->email,'Customer')
            ->subject('Information about order');;
    }
}
