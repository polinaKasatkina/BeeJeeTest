<?php
require "../bootstrap.php";

use Illuminate\Database\Seeder;

class CustomSeeder extends Seeder {

    public function run()
    {
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@test.com',
            'password' => sha1('123')
        ]);

        \App\Models\Task::create([
            'name' => 'John',
            'email' => 'johndoe@test.com',
            'content' => 'Go to the store'
        ]);

        \App\Models\Task::create([
            'name' => 'Jane',
            'email' => 'janedoe@test.com',
            'content' => 'Go to work'
        ]);
    }

}

$seeder = new CustomSeeder();
$seeder->run();
