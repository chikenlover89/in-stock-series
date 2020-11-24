<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Retailer;
use App\Models\Stock;
use Illuminate\Database\Seeder;

class RetailerWithProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $switch = Product::create(['name' => 'Nintendo Switch']);
        $bestBuy = Retailer::create(['name' => 'Best Buy']);

        $stock = new Stock([
            'price'=>10000,
            'url'=>'http://foo.com',
            'sku'=> '1234',
            'in_stock'=>false
        ]);

        $bestBuy->addStock($switch,$stock);
    }
}
