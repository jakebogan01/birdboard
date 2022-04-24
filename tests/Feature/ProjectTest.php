<?php

namespace Tests\Feature;

use App\Models\Project;
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

    public function testAProjectRequiresATitle()
    {
        $fields = Project::factory()->raw([
            'title' => ''
        ]);

        $this->post('/projects', $fields)->assertSessionHasErrors('title');
    }

    public function testAProjectRequiresADescription()
    {
        $fields = Project::factory()->raw([
            'description' => ''
        ]);

        $this->post('/projects', $fields)->assertSessionHasErrors('description');
    }
}
