<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function products($id)
    {
        $products = Product::where('category_id', $id)->get();
        return ProductResource::collection($products);
    }
}
