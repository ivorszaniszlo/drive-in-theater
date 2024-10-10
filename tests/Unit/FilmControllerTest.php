<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Film;

class FilmControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_films()
    {
        Film::factory()->count(10)->create();

        $response = $this->getJson('/api/films');

        $response->assertStatus(200)
                 ->assertJsonCount(10);
    }

    /** @test */
    public function it_can_show_a_specific_film()
    {
        $film = Film::factory()->create();

        $response = $this->getJson("/api/films/{$film->id}");

        $response->assertStatus(200)
                 ->assertJson([ 'title' => $film->title ]);
    }

    /** @test */
    public function it_can_create_a_new_film()
    {
        $data = [
            'title' => 'New Film',
            'description' => 'A great movie.',
            'rating' => 'PG-13',
            'language' => 'English',
            'cover_image' => 'image.jpg',
        ];

        $response = $this->postJson('/api/films', $data);

        $response->assertStatus(201)
                 ->assertJson($data);

        $this->assertDatabaseHas('films', $data);
    }

    /** @test */
    public function it_can_update_a_film()
    {
        $film = Film::factory()->create();

        $updateData = [
            'title' => 'Updated Film Title'
        ];

        $response = $this->putJson("/api/films/{$film->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJson($updateData);

        $this->assertDatabaseHas('films', $updateData);
    }

    /** @test */
    public function it_can_delete_a_film()
    {
        $film = Film::factory()->create();

        $response = $this->deleteJson("/api/films/{$film->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Film deleted successfully']);

        $this->assertDatabaseMissing('films', ['id' => $film->id]);
    }
}
