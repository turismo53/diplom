<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
        public function products(){
            return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
        }

        public function user(){
            return $this->belongsTo(User::class);
        }

        public function getFullPrice(){
            $total =0;
            foreach($this->products as $product)
            {
                $total+= $product->getTotalPrice();
            }
            return $total;
        }

        public function saveOrder($name,$phone,$adres,$image){
            if($this->status==0){
            $this->name = $name;
            $this->phone = $phone;
            $this->adres = $adres;
            $this->done = 1;
            $this->user_id=Auth::id();
            if(!isset($image['name']))
            $this->image=$image;
            $this->save();
            session()->forget('orderId');
            return true;
        }
            return false;
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
        
        public function symbol(){
            return  Money::where('name',session('money','RUB'))->first()->symbol;
        }

}
