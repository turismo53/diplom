<?php

namespace App\Http\Controllers;

use App\Money;
use App\Order;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\User;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MainController extends Controller
{
    public function index(){

        $products = Product::get();

        return view('index', compact('products'));

    }

    public function getJson(){

        $products = Product::get();
        return $products->toArray();

      /*
        $array = [ array(
            'title' =>'google',
            'url'=>'google.com',
        ),
            array(
                'title' =>'yandex',
                'url'=>'yandex',
            )
        ];
        return $array;*/
    }

    public function dataChart(){
return [
    'labels'=>['a','b','c','d'],
        'datasets'=>array([
            'label'=>'sales',
            'backgroundColor'=>['blue','red','yellow','black'],
            'data'=>[15000,25945,4444,5555],
        ])
];
}

public function dataRandom(){
    return [
        'labels'=>['a','b','c','d'],
        'datasets'=>array([
            'label'=>'1',
            'backgroundColor'=>'blue',
            'data'=>[rand(5,100),rand(5,100),rand(5,100),rand(5,100)],
        ],
            [
                'label'=>'2',
                'backgroundColor'=>'red',
                'data'=>[rand(5,100),rand(5,100),rand(5,100),rand(5,100)],
            ])
    ];
}



    public function categories(){
        $unSorted = Category::get();
        $categories = $unSorted -> sort();
        return view('categories',compact('categories'));
    }

    public function category($code){
        $category = Category::where('code',$code)->first();
        return view('category', compact('category'));
    }

    public function product($category,$product=null){


        $tovar = Product::where('code',$product)->firstOrFail();
        return view('product',['product'=>$product],compact('tovar'));
    }
    public function changeLang($locale)
    {
        session(['locale'=>$locale]);
        App::setLocale($locale);
        $currentLocale = App::getLocale();
        return redirect()->back();
    }

    public function changeValue($code){
      $money =  Money::where('name',$code)->first();
      session(['money'=>$money->name]);
        return redirect()->back();
    }

}
