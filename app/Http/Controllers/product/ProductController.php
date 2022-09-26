<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Product;

class ProductController extends Controller
{
   public function index()
   {
      $product = Product::select('product_id','product_code','product_name','product_description','product_type','product_price','status')
      ->paginate(10);
      return view('content.product.index',compact('product'));
   }
   public function create()
   {
      return view('content.product.create');
   }
   public function store(Request $request)
   {
		try {
            $product_count = Product::count();
            $product_id = "P000".$product_count + 1;
            Product::create([
               'product_id' => $product_id,
               'product_code' => $request->product_code,
               'product_name' => $request->product_name,
               'product_description' => $request->product_description,
               'product_type' => $request->product_type,
               'product_price' => $request->product_price,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('product.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('product.index');
      }
   }
   public function edit($id)
   {
      $product = Product::select('product_id','product_code','product_name','product_description','product_type','product_price','status')
      ->where('product_id',$id)
      ->first();
      return view('content.product.edit',compact('product'));
   }
   public function update(Request $request, $id)
   {
		try {

            $product = Product::where('product_id',$id)->first();
            $product->update([
               'product_code' => $request->product_code,
               'product_name' => $request->product_name,
               'product_description' => $request->product_description,
               'product_type' => $request->product_type,
               'product_price' => $request->product_price,
               'status' => $request->status
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('product.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('product.index');
      }
   }
   public function delete($id)
	{
		$product = Product::where('product_id',$id)->first();
      $product->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('product.index');
	}
}
