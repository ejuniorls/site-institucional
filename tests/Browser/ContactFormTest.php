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

    public function testSisblue()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('https://sis.bluefitacademia.com.br/ControlGym/View/index.php')
                ->type('login', 'edmir.junior')
                ->type('senha', 'AdventureTime2@')
                ->press('Login')
                ->visit('https://sis.bluefitacademia.com.br/ControlGym/View/busca_de_cliente.php?espontaneo=0')
                ->type('dado_cliente', '41936508800')
                ->press('Pesquisar');
        });
    }
}
