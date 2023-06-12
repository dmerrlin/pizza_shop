<?php

namespace Tests\Feature;

use App\menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testProducts()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }
}
