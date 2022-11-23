<?php

namespace Tests\Unit;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class AddressTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_addresses_db_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('addresses', [
                'id',
                'user_id',
            ]),
            1
        );
    }

    public function test_an_address_belongs_to_a_user()
    {
        $user = User::factory()->create();
        $address = Address::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(User::class, $address->user);
    }
}
