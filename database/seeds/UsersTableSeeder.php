<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'yudho91',
            'password' => app('hash')->make('yudho91'),
            'email' => 'yudho91@gmail.com',
        ]);
    }
}
