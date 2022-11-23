<?php

namespace Tests\Unit;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\TestCase;

class ProfileTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function profiles_db_has_expected_colums()
    {
        $this->assertTrue(
            Schema::hasColumns('profiles', [
                'id',
                'user_id',
            ]),
            1
        );
    }

    public function a_profile_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $profile = Profile::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(User::class, $profile->user);
    }
}
