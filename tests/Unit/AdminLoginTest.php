<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;

class AdminLoginTest extends TestCase
{
    public function test_admin_can_login()
    {
        $adminUser = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'usertype' => '1',
        ]);

        $response = $this->post('/login', [
            'email' => $adminUser->email,
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($adminUser);
        $this->assertEquals('1', auth()->user()->usertype);
        $response->assertRedirect('/redirect');
    }

    public function test_admin_cannot_login_with_incorrect_password()
    {
        $adminUser = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'usertype' => '1',
        ]);

        $response = $this->post('/login', [
            'email' => $adminUser->email,
            'password' => 'wrongpassword',
        ]);

        $response->assertStatus(302);
        $this->assertGuest();
    }
}
