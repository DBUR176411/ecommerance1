<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
        //For testing purpose, use hard coded data, till we design UI
        
  public function register()
  {
  return view('product.register');
  }
    function store(Request $request)
    
    {
      $product =new product();
      $product->id = $request->id;
      $product->name = $request->name;
      $product->unit = $request->unit;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
     $is_saved = $product->save();
    if($is_saved){
    echo "  YOUR DATA Record saved successfully.";
               }
    else{
     echo "Sorry, try again something went wrong.";
       }

       
    }
    public function get_all()
    {
     $product = Product::all();
     return view('product.list', compact('product'));
    } 
    public function edit($id)
 {
 $product = Product::find($id);
 return view('product.edit', compact('product'));
 }
 public function update(Request $request)
 {
  $request->validate([
    'name' => 'required'
    ]);
    $product= Product::find($request->id);
    $product->name = $request->name;
    $product->unit = $request->unit;
    $product->price = $request->price;
    $product->quantity = $request->quantity;
    $product->save();
    return redirect('product/list');
    }
    public function delete($id)
 {
 Product::where('id', $id)->delete();
 return redirect('product/list');
   
}

public function search($id)
    {
     $product = Product::where('id',$id)->first();
     return view('product.search', compact('product'));
    } 
  }