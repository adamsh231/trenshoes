<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function getProduct()
    {
        $product = Product::with(['brand'])->orderBy('id','DESC')->get();
        return response()->json($product, 200);
    }

    public function addProduct(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'price' => ['required', 'numeric'],
                'brand' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $product = new Product;
        $product->name = $request->name;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->save();

        return response()->json([
            'error' => false,
        ], 200);
    }

    public function editProduct(Request $request,Product $product)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'price' => ['required', 'numeric'],
                'brand' => ['required'],
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $product->name = $request->name;
        $product->brand_id = $request->brand;
        $product->price = $request->price;
        $product->save();

        return response()->json([
            'error' => false,
        ], 200);
    }

    public function deleteProduct(Product $product){
        $product->delete();
        return response()->json([
            'error' => false,
        ], 200);
    }
}
