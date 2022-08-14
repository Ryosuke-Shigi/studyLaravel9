<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //User::factory()->create();
        $user = new User;
        $user->name = "test";
        $user->email = "a@gmail.com";
        $user->password = Hash::make('test');
        $user->save();

    }
}
