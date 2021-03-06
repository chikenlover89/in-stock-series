<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\Retailer;
use App\Models\Stock;
use Database\Seeders\RetailerWithProductSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TrackCommandTest extends TestCase
{
    /** @test **/
    public function it_tracks_product_stock()
    {

        $this->seed(RetailerWithProductSeeder::class);

        $this->assertFalse(Product::first()->inStock());

        Http::fake(fn() => ['available'=>true, 'price'=>2990]);

        $this->artisan('track')
            ->expectsOutput('All done');

        $this->assertTrue(Product::first()->inStock());
    }
}
