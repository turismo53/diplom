<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CreateAccOrder extends Mailable
{
    use Queueable, SerializesModels;

    protected $password;
    protected $email;
    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->password=$data->password;
        $this->email=$data->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('account_info',['password'=>$this->password,'email'=>$this->email])
            ->from('onlineshop228@gmail.com','Online shop')
            ->to($this->email,'Customer')
            ->subject('created account');;
    }
}
