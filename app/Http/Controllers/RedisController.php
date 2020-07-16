<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\User;
use Illuminate\Http\Request;
use App\Events\NewEvent;
use Illuminate\Support\Facades\Auth;


class RedisController extends Controller
{

    public function newEvent(Request $request){
        $result= [
            'labels'=>['a','b','c','d'],
            'datasets'=>array([
                'label'=>'sales',
                'backgroundColor'=>['blue'],
                'data'=>[15000,25945,4444,5555],
            ])
        ];
    if($request->has('label')){
        $result['labels'][] = $request->input('label');
        $result['datasets'][0]['data'][] = (integer)$request->input('value');
        if($request->has('realtime')){
            if($request->input('realtime')=="true"){
            event(new \App\Events\NewEvent($result));
            }
        }
    }
            return $result;
    }

    public function newMessage(Request $request){
          $user = Auth::user();
          if($user==null) $user="anonymous";
          else $user=$user->name;
          event( new \App\Events\MessageEvent($request->input('message'),$user));
    }

}
