<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    protected $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->category = Category::factory()->create([
            'name' => 'Test Category',
            'is_publish' => true,
        ]);
    }

    public function testCanFetchCategories()
    {
        $response = $this->json('GET', '/api/categories');

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'name' => 'Test Category',
            'is_publish' => "1",
        ]);
    }

    public function testCanCreateCategory()
    {
        $data = [
            'name' => 'New Category',
            'is_publish' => true
        ];

        $response = $this->json('POST', '/api/categories', $data);

        $response->assertStatus(201);

        $this->assertDatabaseHas('categories', $data);
    }

    public function testCanFetchSingleCategory()
    {
        $response = $this->json('GET', "/api/categories/{$this->category->id}");

        $response->assertStatus(200);

        $response->assertJson([
            'id' => $this->category->id,
            'name' => $this->category->name,
            'is_publish' => $this->category->is_publish,
        ]);
    }

    public function testCanUpdateCategory()
    {
        $data = [
            'name' => 'Updated Category',
            'is_publish' => false
        ];

        $response = $this->json('PUT', "/api/categories/{$this->category->id}", $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('categories', $data);
    }

    public function testCanDeleteCategory()
    {
        $response = $this->json('DELETE', "/api/categories/{$this->category->id}");
    
        $response->assertStatus(200);
    
        $this->assertDatabaseMissing('categories', [
            'id' => (string) $this->category->id,
            'name' => $this->category->name,
            'is_publish' => (string) $this->category->is_publish,
        ]);
    }
    
}
