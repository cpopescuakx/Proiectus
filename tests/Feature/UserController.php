<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserController extends TestCase
{
/** @test*/
    public function provaemail() {
      $data =[
        'email' => $this->faker->email
      ];

      $this->post(route('managers.create'), $data)
      ->dump()
      ->assertStatus(201)
      ->assertJson($data);
    }
}
