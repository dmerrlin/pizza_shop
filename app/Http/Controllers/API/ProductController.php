<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\menu;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(){
        $products = menu::all();
        return ProductResource::collection($products);
    }
}
