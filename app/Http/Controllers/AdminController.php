<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;    


class AdminController extends Controller
{
    public function MenageProduct(){
        $products = Product::all();
        return view('admin.listproduct', compact('products'));
    }
    public function form(){
        return view('admin.auth.formproduct');
    }

    public function formcreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string',
            'berat' => 'required|integer',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'kondisi' => 'required|in:Bekas,Baru',
            'deskripsi' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('form.store')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('image');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move('storage/products', $fileName);

        Product::create([
            'user_id' => Auth::user()->id,
            'image' => '/storage/products/' . $fileName,
            'name' => $request->nama,
            'berat' => $request->berat,
            'harga' => $request->harga,
            'kondisi' => $request->kondisi,
            'stock' => $request->stok,
            'description' => $request->deskripsi,
        ]);

        return redirect()->route('product.manage')->with('success', 'Product added successfully');
    }

    // edit product
    public function editProduct($id)
    {
        $product = Product::find($id);
        return view('admin.auth.formedit', compact('product'));
    }

    // update product
    public function updateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string',
            'berat' => 'required|integer',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'kondisi' => 'required|in:Bekas,Baru',
            'deskripsi' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            return redirect()->route('product.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::find($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move('storage/products', $fileName);

            $imagePath = public_path($product->image);
            if (file_exists($imagePath))
                unlink($imagePath);

            $product->image = '/storage/products/' . $fileName;
        }

        $product->name = $request->nama;
        $product->berat = $request->berat;
        $product->harga = $request->harga;
        $product->kondisi = $request->kondisi;
        $product->stock = $request->stok;
        $product->description = $request->deskripsi;
        $product->save();

        return redirect()->route('product.manage')->with('success', 'Product updated successfully');
    }

    // delete product
    public function deleteProduct($id)
    {
        $product = Product::find($id);

        $product->delete();
        

        // delete image
        $imagePath = public_path($product->image);
        if (file_exists($imagePath))
            unlink($imagePath);

        return redirect()->route('product.manage')->with('success', 'Product deleted successfully');
    }

    public function import(Request $request){

        $validator = Validator::make($request->all(), [
            'fileimport' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('form.store')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('fileimport');

        Excel::import(new ProductImport, $file);
        
        return redirect()->route('product.manage')->with('success', 'Product deleted successfully');
    }
    
    public function export(){

        return Excel::download(new ProductExport, 'data.xlsx');
    }

    public function getdatatable(Request $request){
       $product =Product::select('*');
        return Datatables::of($product)
        ->addIndexcolumn()

        ->make(true);

    }
    
}
