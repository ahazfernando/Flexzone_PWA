<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\View;

class UserFooterTest extends TestCase
{
    use RefreshDatabase;

    public function test_footer_contains_subscribe_form(): void
    {
        $view = View::make('livewire.home.footer'); // Correct path to the footer view
        $output = $view->render();

        $this->assertStringContainsString('Subscribe to Newsletter', $output);
        $this->assertStringContainsString('Enter your name', $output);
        $this->assertStringContainsString('Enter your email', $output);
    }

    public function test_footer_social_links_present(): void
    {
        $view = View::make('livewire.home.footer');
        $output = $view->render();

        $this->assertStringContainsString('fa-facebook-f', $output);
        $this->assertStringContainsString('fa-twitter', $output);
        $this->assertStringContainsString('fa-instagram', $output);
        $this->assertStringContainsString('fa-linkedin', $output);
    }
}
