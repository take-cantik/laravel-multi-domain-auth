<?php

/** @noinspection NonAsciiCharacters */

namespace Tests\Feature\Controller\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class VerifyAuthControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        User::query()->insert([
            'email' => 'ahiahi@example.com',
            'password' => password_hash('password', PASSWORD_DEFAULT),
        ]);
    }

    /**
     * @return void
     */
    public function testログインしている場合200を返却できること(): void
    {
        $user = User::query()->first();

        $response = $this->actingAs($user)->getJson('/api/verify-auth');
        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function testログインしていない場合401を返却できること(): void
    {
        $response = $this->getJson('/api/verify-auth');

        $response->assertStatus(401);
    }
}
