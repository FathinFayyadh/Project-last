<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChekoutController extends Controller
{
   
   
   
    public function checkout(){
    
    $user = Auth::user();
       $product = Product::where('user_id', $user->id)->first();
       $productId = $user->id;

       // Cek apakah produk ditemukan
       if (!$product) {
           return redirect()->back()->with('error', 'Produk tidak ditemukan');
       }

       return view('dashboard.checkout.chekout', compact('product', 'productId'));  
       
    }
    public function transaction(){
        $user = Auth::user();
       $product = Product::where('user_id', $user->id)->first();
       $productId = $user->id;

       // Cek apakah produk ditemukan
       if (!$product) {
           return redirect()->back()->with('error', 'Produk tidak ditemukan');
       }

        return view('dashboard.checkout.transaction', compact('product', 'productId'));
    }
}
