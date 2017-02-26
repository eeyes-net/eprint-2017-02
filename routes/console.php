<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('admin:create', function () {
    \App\User::create([
        'username' => 'root',
        'password' => bcrypt('root'),
        'name' => 'root',
        'type' => 'root',
    ]);
    $this->comment('"root" created.');
    \App\User::create([
        'username' => 'admin',
        'password' => bcrypt('admin'),
        'name' => 'admin',
        'type' => 'admin',
    ]);
    $this->comment('"admin" created.');
    \App\User::create([
        'username' => 'anonymous',
        'password' => '*',
        'name' => 'anonymous',
        'type' => 'anonymous',
    ]);
    $this->comment('"anonymous" created.');
})->describe('Create "root", "admin" and "anonymous" user.');
