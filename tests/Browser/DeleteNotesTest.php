<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     * @group Deletenotes
     */
    public function testNotes(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/') //mengunjungi url halaman utama
            ->assertSee('Enterprise') //melihat teks ‘Laravel’
            ->clickLink('Log in') //menekan tautan ‘Log in’
            ->assertPathIs('/login') //memastikan url setelah menekan tautan sebelumnya
            ->type('email', 'asda@gah.com') //mengisi input yang memiliki atribut name email.
            ->type('password', '123') //mengisi input yang memiliki atribut name password.
            ->press('LOG IN') //menekan tombol submit dari form
            ->assertPathIs('/dashboard') //memastikan url mengarah ke dashboard
            ->clickLink('Notes') //menekan tautan ‘Notes’
            ->clickLink('Create Note') //menekan tautan ‘Create Note’
            ->assertPathIs('/create-note') //memastikan url setelah menekan tautan sebelumnya
            ->type('title', 'ppl') //mengisi input title.
            ->type('description', 'mantap betuls') //mengisi input yang memiliki atribut description.
            ->press('CREATE') //menekan tombol submit dari form
            ->assertPathIs('/notes') //memastikan url mengarah ke dashboard
            ->clickLink('Delete') //menekan tautan 'Delete'
            ->assertPathIs('/notes'); //memastikan url mengarah ke halaman notes
        });
    }
}
