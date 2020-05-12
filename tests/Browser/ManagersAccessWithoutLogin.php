<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class Test extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function ManagersAccessWithoutLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/managers')
                    ->assertSee('Login');
        });
    }
}
