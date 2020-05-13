<?php

namespace Tests\Feature\Http\Controllers\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function testlogin_displays_the_login_form()
    {
        $response = $this->get(route('login'));

        $response->assertStatus(500);
    }
    public function testlogin_displays_validation_errors()
    {
        $response = $this->post(route('login'), []);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('username');
    }
    public function testlogin_authenticates_and_redirects_user()
    {
        $user = factory(User::class)->create();

        $response = $this->post(route('login'), [
            'username' => $user->username,
            'password' => 'password'
        ]);

        $this->assertAuthenticatedAs($user);
    }
}
