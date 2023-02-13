<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WmtProductSeeder extends Seeder
{
    
    public function run()
    {
        \App\Models\WmtProduct::create([
            'product_unique_code' => 'SPKSKP',
            'product_name' => 'So Klin Pewangi',
            'price' => 15000,
            'currency' => 'Rp.',
            'discount' => 1500,
            'dimension' => '13cm x 10 cm',
            'unit' => 'PCS'
        ]);
        \App\Models\WmtProduct::create([
            'product_unique_code' => 'SPKGB',
            'product_name' => 'Giv Biru',
            'price' => 11000,
            'currency' => 'Rp.',
            'discount' => 0,
            'dimension' => '13cm x 10 cm',
            'unit' => 'PCS'
        ]);
        \App\Models\WmtProduct::create([
            'product_unique_code' => 'SPKSKL',
            'product_name' => 'So Klin Liquid',
            'price' => 18000,
            'currency' => 'Rp.',
            'discount' => 0,
            'dimension' => '13cm x 10 cm',
            'unit' => 'PCS'
        ]);
    }
}
