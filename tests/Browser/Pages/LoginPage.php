<?php

namespace Tests\Browser\Pages;

use Laravel\Dusk\Browser;

class LoginPage extends Page
{
    public function url(): string
    {
        return '/login';
    }

    public function assert(Browser $browser)
    {
        //
    }

    public function elements(): array
    {
        return [
            '@email' => '#email',
            '@password' => '#password',
            '@remember' => 'input[name=remember]',
        ];
    }
}