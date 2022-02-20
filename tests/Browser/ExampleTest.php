<?php

use Laravel\Dusk\Browser;
use Tests\Browser\Pages\LoginPage;

test('example test', function () {
    $this->browse(function (Browser $browser) {
        $browser->visit('/')
            ->assertSee('Laravel');
    });
});

it('can login', function () {
   $this->browse(function (Browser $browser) {
       $user = \App\Models\User::factory()->create();

       $browser->visit(new LoginPage())
           ->waitFor('@email')
           ->type('@email', $user->email)
           ->type('@password', 'password')
           ->check('@remember', true)
           ->press('LOG IN')
           ->waitForLocation('/dashboard')
           ->assertAuthenticated()
           ->assertPathIs('/dashboard');
   });
});