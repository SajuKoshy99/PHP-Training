<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*User::create([
            'name' => 'Saju',
            'email' => 'sajukurian15@gmail.com',
            'date_of_birth' =>'1999-12-15',
        ]);*/
        User::factory(1000)->create();

       
    }
}
