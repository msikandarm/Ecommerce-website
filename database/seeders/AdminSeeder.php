<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::create([
        'name' => 'ali raza',
        'email' => 'aliraza@gmail.com',
        'password' => bcrypt('12345678'),
        'role' => '1',

        ]);


    }
}
