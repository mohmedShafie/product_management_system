<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function show_product()
    {
        $product = Product::all(); 
        $category = Category::all();
        return response([$product , $category], '200' , ['ok'] );
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
        $message = ['meesege'=>'the product is deleted'];
        return response($message,201, ['ok']);
    }
    public function edit_product($id)
    {
        $product = Product::find($id);
        $categories = Category::all();
        
        return response([$product , $categories], 200 , ['ok']);
        
    }
    public function insert_product()
    {
        $categories=Category::all();
      return response($categories , 200 , ['ok']);
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
        return response('the data is added sussfully', '200' , 'ok');
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
        $message = [
            'messege'=> 'data is updated',
        ];
        return response($message , 201 , ['ok']);
    }
}
