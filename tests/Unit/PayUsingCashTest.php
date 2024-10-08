<?php

namespace Tests\Unit;

use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PayUsingCashTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        Cart::factory()->count(3)->create([
            'customer_id' => $this->user->id,
            'cus_name' => $this->user->name,
            'cus_email' => $this->user->email,
        ]);
    }

    public function test_payment_cod()
    {
        Auth::shouldReceive('user')->andReturn($this->user);

        $response = $this->get('/payment_cod');

        $response->assertStatus(302);
        $response->assertSessionHas('success', 'Order placed successfully!');

        $this->assertEquals(3, Order::count());

        $this->assertEquals(0, Cart::count());
        $order = Order::first();
        $this->assertEquals($this->user->name, $order->cus_name);
        $this->assertEquals($this->user->email, $order->cus_email);
        $this->assertEquals('Payment Method: Cash on Delivery', $order->payment_status);
        $this->assertEquals('On Transit', $order->package_status);
    }

    public function test_payment_cash()
    {
        $net_total = 1000;

        $response = $this->get("/payment_cash/{$net_total}");

        $response->assertStatus(200); // Expecting a successful response
        $response->assertViewIs('livewire.home.stripepayment');
        $response->assertViewHas('net_total', $net_total);
    }
}