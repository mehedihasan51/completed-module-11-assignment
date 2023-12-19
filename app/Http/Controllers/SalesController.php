<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index(){
        $transactions = DB::table('sales as s')
        ->join('products as p', 'p.id', 's.product_id')
        ->select( 's.price', 's.quantity', 's.total_price', 'p.product_name')
        ->get();
        return view('backend.pages.sales.index', compact('transactions'));
    }
    public function create(){
        $products = DB::table('products')->get();
        return view('backend.pages.sales.create', compact('products'));
    }

    public function store(Request $request){
        $request->validate([
            "product_id"        => 'required|integer',
            "price"             => 'required',
            "quantity"          => 'required|integer',
        ]);

        $product = DB::table('products')->find($request->input('product_id'));
        
        $stock = ($product->product_stock - $request->product_quantity);

        $data = [
            "product_id"    => $request->input('product_id'),
            'price'         => $request->input('price'),
            'quantity'      => $request->input('quantity'),
        ];

        DB::table('products')->where('id', $request->input('product_id'))->update([
            'product_stock' => $stock,
        ]);

        DB::table('sales')->insert($data);

        return redirect()->route('product.index')->with('success', 'Sales successfully');
    }
}
