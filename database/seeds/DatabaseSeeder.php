<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 3)->create();
        factory(App\Question::class, 10)->create()->each(function($u){
            $u->question()->saveMany(
                factory(App\Question::class, rand(1, 5))->make()
            );
        });
    }
}
