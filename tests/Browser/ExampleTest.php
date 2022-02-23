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
       ->clickAtXPath('//*[@id="app"]/nav/div/div[1]/div/ul[1]/li[3]/a/button')
       ->waitForText('CREATE SHARE')
       ->clickAtXPath('//*[@id="app"]/nav/div/div[1]/div/ul[1]/li[3]/div/div[2]/div[2]/button');
   });
});