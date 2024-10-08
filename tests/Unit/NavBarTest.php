<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;

class NavBarTest extends TestCase
{
    public function test_home_link_is_present(): void
    {
        $response = $this->get('/');
        $response->assertSee('<a class="nav-link" href="/">Home</a>', false);
    }

    public function test_shop_link_is_present(): void
    {
        $response = $this->get('/');
        $response->assertSee('<a class="nav-link" href="/shopnow">Shop</a>', false);
    }

    public function test_aboutus_link_is_present(): void
    {
        $response = $this->get('/');
        $response->assertSee('<a class="nav-link" href="/aboutus">About us</a>', false);
    }

    public function test_cart_link_is_present_when_logged_in(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertSee('Cart');
    }

    public function test_login_and_register_buttons_are_present_for_guests(): void
    {
        $response = $this->get('/');
        $response->assertSee('Login');
        $response->assertSee('Register');
    }

    public function test_logout_button_is_present_when_logged_in(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/');
        $response->assertSee('logout');
    }
}


