<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MasukTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group login
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') //mengunjungi url halaman utama
            ->assertSee('Enterprise') //melihat teks ‘Laravel’
            ->clickLink('Log in') //menekan tautan ‘Log in’
            ->assertPathIs('/login') //memastikan url setelah menekan tautan sebelumnya
            ->type('email', 'asda@gah.com') //mengisi input yang memiliki atribut name email.
            ->type('password', '123') //mengisi input yang memiliki atribut name password.
            ->press('LOG IN') //menekan tombol submit dari form
            ->assertPathIs('/dashboard'); //memastikan url mengarah ke dashboard
        });
    }
}
