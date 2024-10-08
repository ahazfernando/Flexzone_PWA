<?php

namespace Tests\Unit;

use App\Models\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddProductToCartTest extends TestCase
{

    public function test_can_add_product_to_cart()
    {
        $cartData = [
            'cus_name' => 'Ahaz Fernando',
            'cus_email' => 'ahaz@gmail.com',
            'cus_phone' => '119119119',
            'cus_address' => 'Arigathooo',
            'pro_name' => 'Test Product',
            'pro_price' => '99.99',
            'pro_image' => 'test-image.jpg',
            'customer_id' => '1',
            'product_id' => '1'
        ];

        $cart = Cart::create($cartData);

        $this->assertInstanceOf(Cart::class, $cart);
        $this->assertDatabaseHas('carts', $cartData);

        foreach ($cartData as $key => $value) {
            $this->assertEquals($value, $cart->$key);
        }
    }

    public function test_can_add_product_to_cart_with_minimal_data()
    {
        $minimalCartData = [
            'pro_name' => 'Minimal Product',
            'pro_price' => '10.00',
            'product_id' => '2'
        ];

        $cart = Cart::create($minimalCartData);

        $this->assertInstanceOf(Cart::class, $cart);
        $this->assertDatabaseHas('carts', $minimalCartData);

        foreach ($minimalCartData as $key => $value) {
            $this->assertEquals($value, $cart->$key);
        }

        $this->assertNull($cart->cus_name);
        $this->assertNull($cart->cus_email);
        $this->assertNull($cart->cus_phone);
        $this->assertNull($cart->cus_address);
        $this->assertNull($cart->pro_image);
        $this->assertNull($cart->customer_id);
    }
}