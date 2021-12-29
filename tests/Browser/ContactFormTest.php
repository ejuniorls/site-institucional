<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ContactFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testVisitContactPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                ->assertSee('Nome completo');
        });
    }

    public function testIfInputsExists()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                ->assertSee('Nome completo')
                ->assertSee('Email')
                ->assertSee('Mensagem');
        });
    }

    public function testIfContactFormIsWorking()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/contato')
                ->type('name', 'Edmir Lôbo')
                ->type('email', 'email')
                ->type('message', 'teste')
                ->press('Enviar mensagem')
                ->assertPathIs('/contato');
        });
    }
}
