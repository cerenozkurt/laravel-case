<?php

namespace Tests\Feature;

use App\Models\Integration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class IntegrationCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_command_add_integration()
    {
        $this->artisan('integration:add', [
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ])->assertExitCode(0);

        $this->assertDatabaseHas('integrations', [
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
        ]);
    }

    public function test_command_delete_integration()
    {
        $integration = Integration::create([
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $this->artisan('integration:delete', [
            'id' => $integration->id,
        ])->assertExitCode(0);

        $this->assertDatabaseMissing('integrations', [
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
        ]);
    }

    public function test_command_update_integration()
    {
        $integration = Integration::create([
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $this->artisan('integration:update', [
            'id' => $integration->id,
            'marketplace' => 'trendyol',
            'username' => 'updateduser',
        ])->assertExitCode(0);

        $this->assertDatabaseHas('integrations', [
            'marketplace' => 'trendyol',
            'username' => 'updateduser',
        ]);
    }
}
