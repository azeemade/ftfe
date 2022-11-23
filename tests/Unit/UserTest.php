<?php

namespace Tests\Unit;

use App\Models\Address;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_users_db_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id',
                'firstname',
                'lastname',
                'email',
                'phonenumber',
                'password'
            ]),
            1
        );
    }

    public function test_a_user_has_a_profile()
    {
        $user = User::factory()->create();
        $profile = Profile::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(Profile::class, $user->profile);
    }

    public function test_a_user_has_a_address()
    {
        $user = User::factory()->create();
        $address = Address::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(Address::class, $user->address);
    }
}
