<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function testAUserHasProjects()
    {
        $user = User::factory()->create();

        $this->assertInstanceOf(Collection::class, $user->projects());
    }
}
