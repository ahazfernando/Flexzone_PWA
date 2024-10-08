<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRegistrationTest extends TestCase
{
    /**
     * Test user can register with valid credentials.
     */
    public function test_user_can_register()
    {
        // Mock registration data
        $registrationData = [
            'name' => 'Ahaz Fernando',
            'email' => 'ahaz@gmail.com',
            'password' => 'Dark123@',
            'password_confirmation' => 'Dark123@',
            'phone' => '0771234567',
            'address' => '123 Main St, Colombo',
            'dob' => '1990-05-15', // Date of birth format: YYYY-MM-DD
        ];

        // Simulate registration
        $user = User::create([
            'name' => $registrationData['name'],
            'email' => $registrationData['email'],
            'password' => Hash::make($registrationData['password']),
            'phone' => $registrationData['phone'],
            'address' => $registrationData['address'],
            'dob' => $registrationData['dob'],
        ]);

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Ahaz Fernando', $user->name);
        $this->assertEquals('ahaz@gmail.com', $user->email);
        $this->assertEquals('0771234567', $user->phone);
        $this->assertEquals('123 Main St, Colombo', $user->address);
        $this->assertEquals('1990-05-15', $user->dob);
        $this->assertTrue(Hash::check('Dark123@', $user->password));
    }

    /**
     * Test registration fails if email already exists.
     */
    public function test_registration_fails_if_email_exists()
    {
        // Create a user first
        User::factory()->create([
            'name' => 'Ahaz Fernando',
            'email' => 'ahaz@gmail.com',
            'password' => bcrypt('Dark123@'),
            'phone' => '0771234567',
            'address' => '123 Main St, Colombo',
            'dob' => '1990-05-15',
        ]);

        // Attempt to register with the same email
        $response = $this->post('/register', [
            'name' => 'Ahaz Fernando',
            'email' => 'ahaz@gmail.com',
            'password' => 'Dark123@',
            'password_confirmation' => 'Dark123@',
            'phone' => '0771234567',
            'address' => '123 Main St, Colombo',
            'dob' => '1990-05-15',
        ]);

        // Assert registration fails due to existing email
        $response->assertSessionHasErrors(['email']);
    }
}
