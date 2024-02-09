<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 4)->create()

        ->each(function ($user){
            $user->address()->save(factory(App\Address::class)->make());
        });//no need to use faker unique()


    }
}
