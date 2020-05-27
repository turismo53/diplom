<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Individual_order extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }


    public function saveOrder($image){
            $this->user_id=Auth::id();
            $this->image=$image;
            $this->save();
            session()->forget('orderId');
            return true;
    }

    public function price(){
        $currentValue = Money::where('name',session('money','RUB'))->first()->factor;
        return $this->individual_price / $currentValue;
    }

    public function symbol(){
        return  Money::where('name',session('money','RUB'))->first()->symbol;
    }

    public function saveNewInfo($status,$individual_price){

        $this->status=$status;

        if($individual_price!=null) {
            $currentValue = Money::where('name',session('money','RUB'))->first()->factor;
            $this->individual_price = $individual_price*$currentValue;
        }
        $this->save();
    }

    public function individual_price(){
        $currentValue = Money::where('name',session('money','RUB'))->first()->factor;
        return $this->individual_price / $currentValue;
    }


}
