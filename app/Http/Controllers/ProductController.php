<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =Product::all();
        return view('admin.tables')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.add-product')->with('Product', '');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'file' => 'required|mimes:pdf,xlx,csv|max:2048',
        // ]);
        if($request->hasfile('product_picture')){
            $rand_num = (rand(10,100));
            $product_picture = $request->file('product_picture')->getClientOriginalExtension(); // getting file extension
            $fileName_product = 'product_picture_'.$rand_num."_".$product_picture; // renameing image
            $upload_success_product =$request->file('product_picture')->move(public_path('uploads'), $fileName_product); // uploading file to given path
        }else{
            $fileName_product =$request->file_name;
        }
       
            if(!empty($request->id)){
                $Product =Product::find($request->id);   
            }else{
                $Product =new Product();
            }
    
        $Product->product_name = $request->product_name;
        $Product->product_price = $request->product_price;
        $Product->product_picture =  $fileName_product;
        $Product->title_one =  $request->product_title1;
        $Product->title_two =  $request->product_title2;
        $Product->save();
        $data =$Product->all();
        return redirect('productlist')
        ->with('Success', 'Product Saved Successfully!')->with('data', $data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $Product = Product::find($id);
        return view('admin.add-product')->with('Product', $Product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
      $post = Product::find($id);
      $post->delete();
      return redirect()->route('product.list')
        ->with('Success', 'Product deleted successfully');
    }
}
