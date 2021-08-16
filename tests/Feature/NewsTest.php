<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testsNewsAreCreatedCorrectly()
    {
        $user = User::factory()->count(10)->create();
        $token = $user->token;
        $headers = ['token' => "$token"];
        $payload = [
            'title' => 'Lorem',
            'description' => 'Ipsum',
            'link' => 'http://www.example.com',
            'publication_date' => '2021-08-15',
            'publisher_name' => 'John Doe',
        ];

        $this->json('POST', '/api/v1/news', $payload, $headers)
            ->assertStatus(200)
            ->assertJson(['id' => 1,
                'title' => 'Lorem',
                'description' => 'Ipsum',
                'link' => 'https://www.example.com',
                'publication_date' => '2021-08-15',
                'publisher_name' => 'John Doe'
            ]);
    }
}
