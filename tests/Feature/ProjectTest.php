<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testAUserCanCreateAProject()
    {
        $this->withoutExceptionHandling();

        $fields = [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence()
        ];

        $this->post('/projects', $fields)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $fields);

        $this->get('/projects')->assertSee($fields['title']);
    }
}
