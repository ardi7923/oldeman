<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id'       => 1,
            'name'     => "Admin",
            'username' => "admin",
            'password' => "$2y$10$5pPbiWUJSxvXDvlEiUZaQek8fIjb4YsR4aGABKYW5GrU.wnEQCIOK"
        ]);
    }
}
