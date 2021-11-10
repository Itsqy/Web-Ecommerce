<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "user";
        $user->email = "admin@gmail.com";
        $user->username = "Admin1";
        $user->password = Hash::make('1234');
        $user->role = "Admin";
        $user->save();
    }
}
