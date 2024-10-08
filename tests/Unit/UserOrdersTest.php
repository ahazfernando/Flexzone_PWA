<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserOrdersTest extends TestCase
{
    //User Orders Test
    public function test_create_order(): void
    {
        $order = Order::create([
            'customer_id' => 1,
            'product_id' => 100,
            'pro_name' => 'Test Product',
            'pro_price' => 99.99,
            'cus_name' => 'Ahaz Fernando',
            'cus_email' => 'ahaz@example.com',
            'cus_phone' => '0776992735',
            'cus_address' => 'Ontario, Canada',
            'pro_image' => 'test_product_image.jpg'
        ]);

        $this->assertDatabaseHas('orders', [
            'cus_name' => 'Ahaz Fernando',
            'cus_email' => 'ahaz@example.com',
            'cus_phone' => '0776992735',
            'cus_address' => 'Ontario, Canada',
        ]);
    }

    public function test_order_fillable_attributes(): void
    {
        $order = new Order();

        $fillable = [
            'customer_id',
            'product_id',
            'pro_name',
            'pro_price',
            'cus_name',
            'cus_email',
            'cus_phone',
            'cus_address',
            'pro_image',
        ];

        $this->assertEquals($fillable, $order->getFillable());
    }
}
