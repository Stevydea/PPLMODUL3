<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group registrasi
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Enterprise')
                    ->clickLink('Register') //menekan tautan ‘Log in’
                    ->assertPathIs('/register') //memastikan url setelah menekan tautan sebelumnya
                    ->type('name', 'stevy') //mengisi input yang memiliki atribut nama.
                    ->type('email', 'asda1@gah.com') //mengisi input yang memiliki atribut name email.
                    ->type('password', '123') //mengisi input yang memiliki atribut name password.
                    ->type('password_confirmation', '123') //mengisi input yang memiliki atribut name password.
                    ->press('REGISTER') //menekan tombol submit dari form
                    ->assertPathIs('/dashboard'); //memastikan url mengarah ke dashboard
        });
    }
}
