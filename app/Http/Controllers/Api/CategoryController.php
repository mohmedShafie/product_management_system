<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add_category(Request $request)
    {
        $category = Category::create([
            'name'=> $request->name,
            'description'=>$request->description,
        ]);
        Mail::send('emails.category_created' , ['category' =>$category ], function($message) {
            $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('category created');
        });
        $message = [
            'messege'=> 'data created',
        ];
        return response($message , 201 , ['ok']);;
    }
    public function show_category()
    {
        $category = Category::all();
        return response($category , 200 , ['ok']);
    }
    public function delete_category($id)
    {
        $category = Category::find($id);
if($category->product)
{
    Mail::send('emails.category_delete' , ['category' =>$category ], function($message) {
        $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('category can not delete');
    });
    $message = [
        'messege'=> 'can not delete this category because it has a product',
    ];
    
    return response($message , 400 , ['ok']);
}
        $category->delete();
        Mail::send('emails.category_delete' , ['category' =>$category ], function($message) {
            $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('category deleted');
        });
        $message = [
            'messege'=> 'data is deleted'
        ];
        return response($message, 201 , ['ok']);
    }

    public function update_category(Request $request , $id)
    {
        $category = Category::find($id);
        $category->update([
            'name'=>$request->name,
            'description'=> $request->description,
        ]);
        Mail::send('emails.category_update' , ['category' =>$category ], function($message) {
            $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('category updated');
        });
        $messege = [
            'messege'=> 'data is updated'
        ];
        return response($messege, 201 , ['ok']);
    }
}

