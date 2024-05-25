<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $products)
    {
        unset($products[0]);

        foreach ($products as $product) {
          Product::create([
            'user_id' => Auth::id(),
            'name'=> $product[0],
            'berat'=>$product[1],
            'harga'=>$product[2],
            'stock'=>$product[3],
            'kondisi'=>$product[4],
          ]);        
    
        }
    }
}
