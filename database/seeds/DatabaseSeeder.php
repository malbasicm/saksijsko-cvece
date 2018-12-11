<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*for($i = 0; $i < 5; $i++)
            DB::table('users')->insert([
                'username' => str_random(5).' '.str_random(5),
                'email' => str_random(10).'@gmail.com',
                'password' => Hash::make('test'),
                'picture' => str_random(10).'.jpg'
            ]);*/
        // Artikli
        DB::table('articles')->insert([
            'id' => 1,
            'name' => 'Ruze',
            'description' => 'Ruze su crvene, uglavnom',
            'price' => 120
        ]);
    }
}
