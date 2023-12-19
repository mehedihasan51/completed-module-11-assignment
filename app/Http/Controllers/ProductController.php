<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    public function index()
    {
        $products = DB::table('products')->get();
        return view("backend.pages.product.index", compact('products'));
    }
    public function dashboard()
    {
        return view('backend.pages.product.dashboard');
    }
    public function addProduct()
    {
        return view('backend.pages.product.create');
    }
    public function store(Request $request){
        $request->validate([
            'product_name'       => 'required',
            'product_slug'       => 'required',
            'product_price'      => 'required',
            'product_quantity'   => 'required|integer',
            'product_stock'      => 'required',
            'product_img'        => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('product_img')) {
            $product_imgs = $request->product_img;
            $productlImage = 'product_' . time() . '.' . $product_imgs->getClientOriginalExtension();
            $request->product_img->move(public_path('uploads/product'), $productlImage);
        }

        $data = [
            'product_name'      => $request->input('product_name'),
            'product_slug'      => Str::slug($request->input('product_slug')),
            'product_price'     => $request->input('product_price'),
            'product_quantity'  => $request->input('product_quantity'),
            'product_stock'     => $request->input('product_stock'),
            'product_img'       => $productlImage
        ];
        DB::table('products')->insert($data);
        return redirect()->route('product.index')->with('success', 'Product has been successfully added.');
    }

    public function edit($id){
        $product = DB::table('products')->find($id);
        return view('backend.pages.product.edit', compact('product'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'product_name'       => 'required',
            'product_slug'       => 'required',
            'product_price'      => 'required',
            'product_quantity'   => 'required|integer',
            'product_stock'      => 'required',
            'product_img'        => 'required|image|mimes:jpg,png,jpeg',
        ]);

        if ($request->hasFile('product_img')) {
            $product_imgs = $request->product_img;
            $productlImage = 'product_' . time() . '.' . $product_imgs->getClientOriginalExtension();

            $request->product_img->move(public_path('uploads/product'), $productlImage);
            $imagePath = public_path('uploads/product/') . $request->old_product_img;
            unlink($imagePath);
        }else {
            $productlImage = $request->old_product_img;
        }

        
        $data = [
            'product_name'      => $request->input('product_name'),
            'product_slug'      => Str::slug($request->input('product_slug')),
            'product_price'     => $request->input('product_price'),
            'product_quantity'  => $request->input('product_quantity'),
            'product_stock'     => $request->input('product_stock'),
            'product_img'       => $productlImage
        ];
        DB::table('products')->where('id',$id)->update($data);
        return redirect()->route('product.index')->with('success', 'Product has been updated successfully.');
    }


    public function destroy($id)
    {
        $product = DB::table('products')->find($id);
        if ($product) {
            DB::table('products')->where('id', $id)->delete();
            unlink(public_path('uploads/product/' . $product->product_img));
        }

        return redirect()->route('product.index')->with('success', 'Product has been successfully delete.');
    }
}
