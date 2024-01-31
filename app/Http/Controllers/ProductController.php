<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $category = Category::all();
        return view('user_product.index' , compact('product' ));
    }
    public function delete_product($id)
    {
        
        $product = Product::find($id);
        if($product){
            $product->delete();
        }
        Mail::send('emails.product_delete' , ['product' => $product], function($message) {
            $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('product delete');
        });
        return redirect()->back()->with("messege", "product deleted succesfuly");
    }
    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        return view('user_product.edit_product' , compact('product' , 'categories'));
        
    }
    public function insert_product()
    {
        $categories=Category::all();
      return view('user_product.insert_product' ,compact('categories'));
    }
    public function add_product(Request $request)
    {
        $image= $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('storage' , $imagename);  
       $product =  Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'is_avilable'=>$request->is_avilable,
            'category_id'=>$request->category_id,
            'image'=>$imagename,
        ]);
        Mail::send('emails.product_create' , ['product' => $product], function($message) {
            $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('New Product Created');
        });
        return redirect()->back()->with("messege","Product added Successfully!");
    }
    public function update_product(Request $request , $id )
    {
        $image= $request->image;
        $imagename= time().'.'.$image->getClientOriginalExtension();
        $request->image->move('storage' , $imagename);
        $product = Product::find($id);
        $product->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'price'=>$request->price,
            'is_avlibale'=>$request->is_avlibale,
            'category_id'=>$request->category_id,
            'image'=>$imagename,
        ]);
        Mail::send('emails.product_update' , ['product' => $product], function($message) {
            $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('product updeted');
        });
        return redirect('/')->with("messege","Product updated Successfully!");
    }
}
