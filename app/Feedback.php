<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Feedback extends Model
{
  protected $fillable=['text'];



    public function saveFeedback($request){
        $this->text=$request;
        $this->user_id=Auth::User()->id;
        $this->save();
        return true;
    }

     public function user(){
         return $this->belongsTo(User::class);
         }

}
