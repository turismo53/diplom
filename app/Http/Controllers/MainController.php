<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Category;
use App\Product;
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

}
