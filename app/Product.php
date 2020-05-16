<?php

namespace App;

use App\Money;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


protected $fillable = ['name', 'code', 'price', 'category_id', 'image'];

public function category(){

    return $this->belongsTo(Category::class);
}

public function getTotalPrice(){
    $currentValue=Money::where('name',session('money','RUB'))->first()->factor;
    return $this->price*$this->pivot->count/$currentValue;

}


public function price(){
    $currentValue = Money::where('name',session('money','RUB'))->first()->factor;
    return $this->price / $currentValue;
}

    public function symbol(){
        return  Money::where('name',session('money','RUB'))->first()->symbol;
    }

}
