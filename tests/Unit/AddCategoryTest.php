<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AddCategoryTest extends TestCase
{

    public function test_can_add_category_to_database()
    {
        $categoryData = [
            'category_name' => 'Protein Shake'
        ];

        $category = Category::create($categoryData);

        $this->assertInstanceOf(Category::class, $category);
        $this->assertDatabaseHas('categories', $categoryData);
        $this->assertEquals($categoryData['category_name'], $category->category_name);
    }

    public function test_cannot_add_category_without_name()
    {
        $this->expectException(\Illuminate\Database\QueryException::class);

        Category::create([]);
    }

}