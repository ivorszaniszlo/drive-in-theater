<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Screening;
use App\Models\Film;

class ScreeningControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_all_screenings()
    {
        Screening::factory()->count(5)->create();

        $response = $this->getJson('/api/screenings');

        $response->assertStatus(200)
                 ->assertJsonCount(5);
    }

    /** @test */
    public function it_can_show_a_specific_screening()
    {
        $screening = Screening::factory()->create();

        $response = $this->getJson("/api/screenings/{$screening->id}");

        $response->assertStatus(200)
                 ->assertJson(['id' => $screening->id]);
    }

    /** @test */
    public function it_can_create_a_new_screening()
    {
        $film = Film::factory()->create();

        $data = [
            'film_id' => $film->id,
            'datetime' => now()->addDays(1)->toDateTimeString(), // Hozzáadjuk a "datetime" mezőt
            'available_seats' => 50,
        ];

        $response = $this->postJson('/api/screenings', $data);

        $response->assertStatus(201)
                ->assertJson($data);

        $this->assertDatabaseHas('screenings', $data);
    }

    /** @test */
    public function it_can_update_a_screening()
    {
        $screening = Screening::factory()->create();

        $updateData = [
            'available_seats' => 30
        ];

        $response = $this->putJson("/api/screenings/{$screening->id}", $updateData);

        $response->assertStatus(200)
                 ->assertJson($updateData);

        $this->assertDatabaseHas('screenings', $updateData);
    }

    /** @test */
    public function it_can_delete_a_screening()
    {
        $screening = Screening::factory()->create();

        $response = $this->deleteJson("/api/screenings/{$screening->id}");

        $response->assertStatus(200)
                 ->assertJson(['message' => 'Screening deleted successfully']);

        $this->assertDatabaseMissing('screenings', ['id' => $screening->id]);
    }
}
