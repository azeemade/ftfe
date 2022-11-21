<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function users_db_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('users', [
                'id',
                'uuid',
                'firstname',
                'lastname',
                'email',
                'phonenumber',
                'email_verified_at',
                'password',
                'remember_token',
                'created_at',
                'updated_at',
            ]),
            1
        );
    }
}
