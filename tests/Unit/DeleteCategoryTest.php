<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteCategoryTest extends TestCase
{

    public function test_can_delete_category(): void
    {
        $category = Category::factory()->create();
        $this->assertDatabaseHas('categories', ['id' => $category->id]);
        $category->delete();
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}