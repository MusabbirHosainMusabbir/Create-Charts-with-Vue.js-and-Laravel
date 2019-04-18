<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){

        $products= Product::orderBy('year','ASC')->get();

        return response()->json($products);

    }

    public function store(Request $request){

        $prduct = new Product();
        $prduct->name=$request->name;
        $prduct->year=$request->year;
        $prduct->price=$request->price;
        $prduct->save();

        return response()->json(['success','The product has been successfully added']);
    }

}
