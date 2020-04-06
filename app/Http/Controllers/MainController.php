<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
class MainController extends Controller
{
    public function index(){
        $products = Product::get();

       // dd($products);
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
     //  dd($tovar);

      /*      $p= Product::get();
      for($i=0;$i<$p->count();$i++){
          
            if($p[$i]->code==$product){
                
                $price=$p[$i]->price;
                 $cat=$p[$i]->category->name;
            }
        }*/
     
        return view('product',['product'=>$product],compact('tovar'));
    }

   
}
