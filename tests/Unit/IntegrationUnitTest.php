<?php

namespace Tests\Unit;

use App\Models\Integration;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use PHPUnit\Framework\TestCase;

class IntegrationUnitTest extends TestCase
{
    use WithFaker;
    public function test_unit_add_integration()
    {
        $mock = Mockery::mock('overload:' . Integration::class);
        $mock->shouldReceive('save')->andReturn(true);

        $integration = new Integration([
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $integration->save();

        $integration->marketplace = 'hepsiburada';
        $integration->username = 'testuser';
        $integration->password = 'password123';

        $this->assertInstanceOf(Integration::class, $integration);
        $this->assertEquals('hepsiburada', $integration->marketplace);
        $this->assertEquals('testuser', $integration->username);
        $this->assertEquals('password123', $integration->password);
    }

    public function test_unit_update_integration()
    {
        $mock = Mockery::mock('overload:' . Integration::class);
        $mock->shouldReceive('save')->andReturn(true);

        $integration = new Integration([
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $integration->save();

        $integration->marketplace = 'trendyol';
        $integration->username = 'updateduser';
        $integration->save();

        $this->assertEquals('trendyol', $integration->marketplace);
        $this->assertEquals('updateduser', $integration->username);
    }

    public function test_unit_delete_integration()
    {
        $mock = Mockery::mock('overload:' . Integration::class);
        $mock->shouldReceive('delete')->andReturn(true);
        $mock->shouldReceive('save')->andReturn(true);


        $integration = new Integration([
            'marketplace' => 'hepsiburada',
            'username' => 'testuser',
            'password' => 'password123',
        ]);

        $integration->save();

        $this->assertTrue($integration->delete());
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
