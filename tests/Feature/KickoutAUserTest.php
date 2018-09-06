<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KickoutAUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_kick_out_a_user()
    {
        $adminUser = factory(User::class)->create();
        $kickedUser = factory(User::class)->create();

        $this->actingAs($kickedUser)->get('/')->assertStatus(200);

        $this->actingAs($adminUser)->get(route('admin.users.kick', $kickedUser))->assertStatus(200);

        $this->actingAs($kickedUser)->get('/')->assertRedirect('login');
        $this->assertFalse(auth()->check());
    }
}
