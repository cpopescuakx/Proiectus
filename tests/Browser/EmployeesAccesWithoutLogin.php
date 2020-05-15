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
    public function EmployeesAccesWithoutLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/Employees')
                    ->assertSee('Login');
        });
    }
}
