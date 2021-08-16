<?php

namespace Tests\Feature;

use App\Models\News;
use App\Models\User;
use Tests\TestCase;

class NewsTest extends TestCase
{
    /**
     * A feature test for news article.
     *
     * @return void
     */
    public function testNewsAreCreatedCorrectly()
    {
        $user = User::factory()->create();
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
            ->assertStatus(200);
    }

    public function testNewsAreUpdatedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->token;
        $headers = ['token' => "$token"];
        $news = News::factory()->create();

        $payload = [
            'title' => 'Lorem',
            'description' => 'Ipsum',
            'link' => 'http://www.example.com',
            'publication_date' => '2021-08-15',
            'publisher_name' => 'John Doe',
        ];

        $this->json('PUT', '/api/v1/news/' . $news->id, $payload, $headers)
            ->assertStatus(200);
    }

    public function testNewsShowSingleItemCorrectly()
    {
        $news = News::factory()->create([
            'title' => 'News first',
            'description' => 'Ipsum',
            'link' => 'http://www.example.com',
            'publication_date' => '2021-08-15',
            'publisher_name' => 'John Doe',
        ]);

        $user = User::factory()->create();
        $token = $user->token;
        $headers = ['token' => "$token"];

        $this->json('GET', '/api/v1/news/' .$news->id, [], $headers)
            ->assertStatus(200)
            ->assertJson(
                [
                    'data' => [
                        'title' => 'News first',
                    ],
                ]
            );
    }

    public function testNewsAreDeletedCorrectly()
    {
        $user = User::factory()->create();
        $token = $user->token;
        $headers = ['token' => "$token"];
        $news = News::factory()->create();

        $this->json('DELETE', '/api/v1/news/' . $news->id, [], $headers)
            ->assertStatus(204);
    }
}
