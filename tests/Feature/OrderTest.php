<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testOrder()
    {
        $response = $this->postJson('/api/orders', [
            'email' => 'test@1mail.ru',
            'name' => 'Заказчик 1',
            'address' => 'ул. Ледина, д.12',
            'phone' => '890099999',
            'total_price' => 349,
            'products' => [
                [
                    'id' => 2,
                    'qty' => 1
                ]
            ]
        ]);

        $response->assertStatus(201);
    }
}
