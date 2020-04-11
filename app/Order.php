<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    public function products(){

        return $this->belongsToMany(Product::class);
    }




     /*   public function user(){
        return $this->belongsTo(User::class);
        }*/

        public function getFullPrice(){

            $total =0;
            foreach($this->products as $product)
            {
                $total+= $product->price;
            }
            return $total;
        }

        public function saveOrder($image){
            if($this->status==0){
            $this->name = Auth::User()->name;
            $this->phone = Auth::User()->phone;
            $this->adres = Auth::User()->street;
            $this->done = 1;
            $this->user_id=Auth::id();
            if(!isset($image['name']))

            $this->image=$image;
            $this->save();
            session()->forget('orderId');
            return true;
        }else return false;
        }

        public function saveStatus($status,$individual_price){
            $this->status=$status;
            if($individual_price!=null)
            $this->individual_price=$individual_price;
            $this->save();
        }


}
