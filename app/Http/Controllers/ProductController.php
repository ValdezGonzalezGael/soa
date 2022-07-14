<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all()->toJson();
        dd($products);
    }

    public function findProduct($key_name)
    {
        $product = Product::where('key_name',$key_name)->first()->toJson();
        dd($product);
    }
    public function CreateProduct(Request $request)
    {
        Product::Create ([
            'name' =>  $request->name,
            'details' =>  $request->details,
            'price' => $request->price,
            'key_name' =>  $request->name
        ]);
    }

    public function UpdateProduct($id)
    {
        $product= Product::find($id);
        $product->update ([
            'name' => 'Skinny',
            'key_name' => 'skinny'
        ]);
    }
    public function UpdateProductbyKeyName($key_name)
    {
        $product= Product::where('key_name',$key_name)->first();
        $product->update ([
            'name' => 'Skinny',
            'key_name' => 'skinny'
        ]);
    }

    public function DeleteProduct($key_name)
    {
     $product= Product::where('key_name',$key_name)->first();
     $product->delete();   
    }
}
