<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function insert_category()
    {
        return view('user_category.add_category');
    }
    public function add_category(Request $request)
    {
        $category = Category::create([
            'name'=> $request->name,
            'description'=>$request->description,
        ]);
        Mail::send('emails.category_created' , ['category' =>$category ], function($message) {
            $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('category created');
        });
        return redirect()->back()->with('messege' , 'category is added');
    }
    public function show_category()
    {
        $category = Category::all();
        return view('user_category.show_category' , compact('category'));
    }
    public function delete_category($id)
    {
        $category = Category::find($id);
        $category->delete();
        Mail::send('emails.category_delete' , ['category' =>$category ], function($message) {
            $message->to('mohamedhassanelshafay@gmail@gmail.com')->subject('category deleted');
        });
        return redirect()->back()->with('messege' , 'category deleted');
    }
    public function edit_category($id)
    {
        $category = Category::find($id);
        return view('user_category.edit_category' , compact('category'));
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
        return redirect()->back();
    }
}
