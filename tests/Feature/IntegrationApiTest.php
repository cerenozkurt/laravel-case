<?php

namespace Tests\Feature;

use App\Models\Integration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IntegrationApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_api_add()
    {
        $response = $this->postJson('/api/integrations', [
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('integrations', [
            'marketplace' => 'hepsiburada',
            'username' => 'testuser'
        ]);
    }

    public function test_api_delete()
    {
        $integration = Integration::create([
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $response = $this->deleteJson('/api/integrations/' . $integration->id);

        $response->assertStatus(200);
        $this->assertDatabaseMissing('integrations', [
            'marketplace' => 'hepsiburada',
            'username' => 'testuser'
        ]);
    }

    public function test_api_update()
    {
        $integration = Integration::create([
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $response = $this->putJson('/api/integrations/' . $integration->id, [
            'marketplace' => 'trendyol',
            'username' => 'updateduser',
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('integrations', [
            'marketplace' => 'trendyol',
            'username' => 'updateduser'
        ]);
    }
}
