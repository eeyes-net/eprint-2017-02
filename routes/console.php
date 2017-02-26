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
    (new \App\User([
        'username' => 'root',
        'password' => bcrypt('root'),
        'name' => 'root',
        'type' => 'root',
    ]))->save();
    $this->comment('"root" created.');
    (new \App\User([
        'username' => 'admin',
        'password' => bcrypt('admin'),
        'name' => 'admin',
        'type' => 'admin',
    ]))->save();
    $this->comment('"admin" created.');
    (new \App\User([
        'username' => 'anonymous',
        'password' => '*',
        'name' => 'anonymous',
        'type' => 'anonymous',
    ]))->save();
    $this->comment('"anonymous" created.');
})->describe('Create "root", "admin" and "anonymous" user.');
