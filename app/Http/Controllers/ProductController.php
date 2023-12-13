<?php

namespace App\Http\Controllers;

use Session;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::paginate(10);
        return view('pages.product', compact('product'));
    }

    public function entries_product(Request $request){
        try {
            $limit = $request->input('entries');
            $product = Product::paginate($limit);
            $view = view('pages.product_search_filter', compact('product'))->render();
            return response()->json(['html' => $view]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function search_product(Request $request){
        try {
            $search = $request->input('search');

            // Perform the search
            $product= Product::where('vtype', 'like', '%' . $search . '%')
                ->orWhere('opr', 'like', '%' . $search . '%')
                ->orWhere('harga8', 'like', '%' . $search . '%')
                ->paginate(10);

            // Render the view for the search results
            $view = view('pages.product_search_filter', compact('product'))->render();

            return response()->json(['html' => $view]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
