<?php

namespace Tests\Unit;

use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_example()
    {
        $project = Project::factory()->create();

        $this->assertEquals('/projects/' . $project->id, $project->path());
    }
}
