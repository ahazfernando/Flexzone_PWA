<?php

namespace Tests\Unit;

use App\Models\Item;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddProductTest extends TestCase
{
    //Add Product
    public function test_can_add_product_to_database()
    {
        $productData = [
            'product_name' => 'Test Product',
            'product_price' => '99.99',
            'product_description' => 'This is a test product',
            'product_category' => 'Test Category',
            'product_quantity' => '10',
            'product_discount' => '5',
            'product_image' => 'test-image.jpg'
        ];

        $item = Item::create($productData);

        $this->assertInstanceOf(Item::class, $item);
        $this->assertDatabaseHas('items', $productData);

        foreach ($productData as $key => $value) {
            $this->assertEquals($value, $item->$key);
        }
    }

    public function test_can_add_product_with_minimal_data()
    {
        $minimalProductData = [
            'product_name' => 'Minimal Product',
            'product_price' => '10.00',
        ];

        $item = Item::create($minimalProductData);

        $this->assertInstanceOf(Item::class, $item);
        $this->assertDatabaseHas('items', $minimalProductData);

        foreach ($minimalProductData as $key => $value) {
            $this->assertEquals($value, $item->$key);
        }

        $this->assertNull($item->product_description);
        $this->assertNull($item->product_category);
        $this->assertNull($item->product_quantity);
        $this->assertNull($item->product_discount);
        $this->assertNull($item->product_image);
    }
}