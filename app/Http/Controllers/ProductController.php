<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::paginate(10);
        // $total = Product::sum('price');

        $seconds = 60;
        $total   = Cache::remember('total_price', $seconds, function () {
            return Product::sum('price');
        });

        return view('product', compact('products', 'total'));
    }
}