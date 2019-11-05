<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersControllerTest extends TestCase
{
    /**
     *Get all users without filter
     *
     * @return void
     */
    public function testAllUsers()
    {
        $response = $this->get('/api/v1/users');

        $response->assertStatus(200);
        $response->assertSee('balance');
    }

    /**
     * Filter users by currency.
     *
     * @return void
     *
     */

    public function testGetUsersByCurrency()
    {
        $response = $this->get('/api/v1/users?currency=USD');

        $response->assertStatus(200);
        $response->assertSee('USD');
        $response->assertDontSee('EUR');
    }

    /**
     * Filter users by status.
     *
     * @return void
     *
     */

    public function testGetUsersByStatus()
    {
        $response = $this->get('/api/v1/users?statusCode=authorised');

        $response->assertStatus(200);
        $response->assertSee('authorised');
        $response->assertDontSee('decline');
    }

    /**
     * Filter users by provider.
     *
     * @return void
     *
     */

    public function testGetUsersByProvider()
    {
        $response = $this->get('/api/v1/users?provider=DataProviderY');

        $response->assertStatus(200);
        $response->assertSee('DataProviderY');
        $response->assertDontSee('DataProviderX');
    }

    /**
     * Filter users by balance between min balance  and max balance.
     *
     * @return void
     *
     */

    public function testGetUsersByBalance()
    {
        $response = $this->get('/api/v1/users?balanceMin=200 && balanceMax=500');

        $response->assertStatus(200);
        $response->assertSee('200');
        $response->assertDontSee('1000');
    }

    /**
     * Filter users by multi filter like provider , currency and status.
     *
     * @return void
     */

    public function testGetUsersWithMultiFilter()
    {
        $response = $this->get('/api/v1/users?provider=DataProviderY && currency=USD && statusCode=authorised');

        $response->assertStatus(200);
        $response->assertSee('DataProviderY');
        $response->assertSee('4fc2-a8d1');
        $response->assertDontSee('3fc2-a8d1');
    }
}
