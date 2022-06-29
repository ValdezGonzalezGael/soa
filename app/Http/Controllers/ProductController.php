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
    public function CreateProduct()
    {
        Product::Create ([
            'name' => 'T.Docente',
            'key_name' => 'tdocente'
        ]);
    }

    public function UpdateProduct($id)
    {
        $product= Product::find($id);
        $product->update ([
            'name' => 'Tec.Docente',
            'key_name' => 'tec_docente'
        ]);
    }
    public function UpdateProductbyKeyName($key_name)
    {
        $product= Product::where('key_name',$key_name)->first();
        $product->update ([
            'name' => 'Tec.docente',
            'key_name' => 'tec_docente'
        ]);
    }

    public function DeleteProduct($key_name)
    {
     $product= Product::where('key_name',$key_name)->first();
     $product->delete();   
    }
}
