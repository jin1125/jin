<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    /**
     * Profileページを表示できることを確認
     *
     * @return void
     */
    public function test_profile_page_returns_a_successful_response()
    {
        $this->get(route('profile'))
             ->assertStatus(200)
             ->assertInertia(fn (AssertableInertia $page) => $page
             ->component('Profile')
        );
    }
}
