<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Notification;
use App\Notifications\SendEmaiNotification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function view_category()
    {   
        if(Auth::id())
        {
            $data = category::all();
            return view ('admin.category',compact('data'));
        }
        return redirect('login');

       
    }
 
    //Adding data to the database for CATEGORY
    public function add_category(Request $request)
    {
        $data = new Category;
        $data ->category_name = $request ->category;
        $data ->save();

        return redirect() -> back()->with('message' , 'Category Added Successfully');
    }


    //Deleting data from the database
    public function delete_category($id)
    {
      
        $data = category::find($id);
        $data -> delete();
        return redirect()->back()->with('message' , 'Category Deleted Successfully');

    }

    public function view_product()
    {   
        $category =  category ::all();
        return view('admin.product',compact('category'));
    }

    public function add_product( Request $request )
    {
        
        $product = new product;

         $product ->title = $request -> title;
         $product ->description = $request -> description;
         $product ->price = $request -> price; 
         $product -> quantity = $request -> quantity;
         $product ->discount_price= $request -> dis_price;
         $product ->category = $request -> category ;


         $image = $request ->image;
         $imagename = time().'.'.$image->getClientOriginalExtension();

         $request->image ->move('product' ,$imagename);

         $product ->image = $imagename;


        $product->save();
        
        return redirect()->back()->with('message','Product Added Successfully.');


    }


    public function show_product()
    {   
        $product = product::all();
        return view ('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        
        $product = product::find($id);

        $product->delete();

        return redirect()->back()->with('message','Product Deleted Succesfully');

    }

    public function update_product($id)
    {
        
       $product = product::find($id);

       $category = category::all();

       return view('admin.update_product',compact('product','category'));


    }

    public function update_product_confirm( Request  $request,$id)
    {
        
        $product = product :: find($id);
        
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_price = $request->dis_price;
        $product->category = $request->category;
        $product->quantity = $request->quantity;


        $image = $request->image;

        if ($image)
         {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
    
            $product-> image = $imagename;


        }

        
        $product->save();

        return redirect()->back()->with('message','Update Successfull');



    }

   

    public function order()
    {
        $order = order::all();
         return view('admin.order',compact('order'));

    }

    public function delivered($id)
    {
        $order = order::find($id);

        $order->delivery_status = "delivered";

        $order ->save();

        return redirect()->back()->with('message','Item delivered successfully');
    }

    public function send_email($id)
    {
        $order = order::find($id);
        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request ,$id)
    {
        $order = order::find($id);

        $details = [
               
            'greeting' => $request->greeting,

            'firstline' => $request->firstline,

            'body' => $request->body,

            'button' => $request->button,

            'url' => $request->url,

            'lastline' => $request->lastline,


        ];

        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back()->with('message','Email sent Successfully.');
    }

   /*  searchbox */

    public function searchdata(Request $request)
    {
        $searchText = $request->search;

        $order = order::where('name','LIKE',"%$searchText%")->orWhere('phone',
        'LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")
        ->orWhere('delivery_status','LIKE',"%$searchText%")->get();

        return view('admin.order',compact('order'));
    }

}