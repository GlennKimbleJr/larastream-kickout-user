<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewTheIndexPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_view_the_index_page()
    {
        $this->get('/')->assertStatus(200);
    }
}
