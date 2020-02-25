<?php

require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function ($table) {

    $table->increments('id');

    $table->string('name');

    $table->string('email')->unique();

    $table->string('password');

    $table->rememberToken();

    $table->timestamps();

});


Capsule::schema()->create('tasks', function ($table) {

    $table->increments('id');

    $table->string('name');

    $table->string('email');

    $table->longtext('content');

    $table->char('status', 1)->default(0);

    $table->char('edited', 1)->default(0);

    $table->timestamps();

});
