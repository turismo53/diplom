<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

        public function saveOrder($name,$phone){
            if($this->status==0){
            $this->name = $name;
            $this->phone = $phone;
            $this->done = 1;
            $this->save();
            session()->forget('orderId');
            return true;
        }else return false;
        }

        public function saveStatus($status){
            $this->status=$status;
            $this->save();
        }
}
