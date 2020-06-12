<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Requests\GuestOrderRequest;
use App\Mail\CreateAccOrder;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use function foo\func;

class MailController extends Controller
{



    protected function generatePassword(){
        $mytime = Carbon::now();
        $hash1=bcrypt($mytime);
        $hash2=bcrypt($hash1);
        $password ="";
        for($i=7;$i<60;$i++){
            $password.=$hash2[$i];
        }
        return $password;
    }
    public function customReg(GuestOrderRequest $data){

        $data['password']=MailController::generatePassword();
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'street' => $data['street'],
            'city' => $data['city'],
            'mail_index' => $data['mail_index'],
        ]);
        Mail::send(new CreateAccOrder($data),['name','online'],function($message){
            $message->subject('created account');
        });
        Auth::login($user);
    }


    public function createdAccount(GuestOrderRequest $data){

        MailController::customReg($data);

        (new BasketController)->basketConfirm($data);

        return redirect()->route('index');

    }




}
