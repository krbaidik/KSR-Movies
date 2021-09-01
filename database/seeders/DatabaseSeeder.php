<?php

namespace Database\Seeders;
use App\Models\User;

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
        User::create([
            'name' => 'Khubi Ram Baidik',
            'contact' => '9868638416',
            'address' => 'pyuthan',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);
    }
}
