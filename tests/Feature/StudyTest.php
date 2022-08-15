<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class StudyTest extends TestCase
{
    /**
     * Studyページを表示できることを確認
     *
     * @return void
     */
    public function test_study_page_returns_a_successful_response()
    {
        $this->get(route('study'))
             ->assertStatus(200)
             ->assertInertia(fn (AssertableInertia $page) => $page
             ->component('Study')
        );
    }
}
