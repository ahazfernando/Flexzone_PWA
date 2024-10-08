<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AdminLogoutTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $admin = User::factory()->create([
            'usertype' => '1'
        ]);

        $this->actingAs($admin);
    }

    public function test_admin_can_logout()
    {
        $this->assertTrue(Auth::check());
        $this->assertEquals('1', Auth::user()->usertype);

        $response = $this->post('/logout');

        $response->assertStatus(302);
        $this->assertFalse(Auth::check());
        $this->assertGuest();
    }

    public function test_logout_redirects_to_home()
    {
        $response = $this->post('/logout');

        $response->assertRedirect('/'); // Assuming logout redirects to home
    }
}