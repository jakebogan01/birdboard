<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    public function testOnlyAuthenticatedUsersCanCreateProjects()
    {
        $fields = Project::factory()->raw();

        $this->post('/projects', $fields)
            ->assertRedirect('login');
    }

    public function testAUserCanCreateAProject()
    {
        $user = User::factory()->create();

        $fields = [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'owner_id' => $user->id
        ];

        $this->be($user)
            ->post('/projects', $fields)
            ->assertRedirect('/projects');

        $this->assertDatabaseHas('projects', $fields);

        $this->get('/projects')
            ->assertOk()
            ->assertSee($fields['title']);
    }

    public function testAUserCanViewAProject()
    {
        $this->actingAs(User::factory()->create());

        $project = Project::factory()->create();

        $this->get($project->path())
            ->assertSee($project->title)
            ->assertSee($project->description);
    }

    public function testAProjectRequiresATitle()
    {
        $this->actingAs(User::factory()->create());

        $fields = Project::factory()->raw([
            'title' => ''
        ]);

        $this->post('/projects', $fields)->assertSessionHasErrors('title');
    }

    public function testAProjectRequiresADescription()
    {
        $this->actingAs(User::factory()->create());

        $fields = Project::factory()->raw([
            'description' => ''
        ]);

        $this->post('/projects', $fields)
            ->assertSessionHasErrors('description');
    }
}
