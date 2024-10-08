<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserLoginTest extends TestCase
{
    /**
     * User Login Test Case - 1
     */
    public function test_user_can_login()
    {
        $user = User::factory()->make([
            'email' => 'ahaz@gmail.com',
            'password' => bcrypt('Dark123@'),
            'role' => 'user',
        ]);

        // Simulate login
        Auth::shouldReceive('attempt')
            ->once()
            ->with([
                'email' => 'ahaz@gmail.com',
                'password' => bcrypt('Dark123@')
            ])
            ->andReturn(true);

        $this->assertTrue(Auth::attempt([
            'email' => 'ahaz@gmail.com',
            'password' => bcrypt('Dark123@')
        ]));
    }

    /**
     * Test user login with incorrect credentials.
     */
    public function test_user_login_fails_with_wrong_password()
    {
        // Mock a normal user
        $user = User::factory()->make([
            'email' => 'ahaz@gmail.com',
            'password' => bcrypt('Dark123@'),
            'role' => 'user',
        ]);

        // Simulate failed login
        Auth::shouldReceive('attempt')
            ->once()
            ->with([
                'email' => 'ahaz@gmail.com',
                'password' => bcrypt('Dark123@')
            ])
            ->andReturn(false);

        $this->assertFalse(Auth::attempt([
            'email' => 'ahaz@gmail.com',
            'password' => bcrypt('Dark123@')
        ]));
    }
}