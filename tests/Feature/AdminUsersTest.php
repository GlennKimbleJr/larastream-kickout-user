<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminUsersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_see_a_list_of_active_users()
    {
        $adminUser = factory(User::class)->create();
        $activeUser = factory(User::class)->create(['last_active_at' => now()]);
        $inactiveUser = factory(User::class)->create(['last_active_at' => null]);

        $this->actingAs($adminUser)
            ->get(route('admin.users.active'))
            ->assertSee($activeUser->name)
            ->assertDontSee($inactiveUser->name);
    }
}
