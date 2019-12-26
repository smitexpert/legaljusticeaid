<?php

use App\User;
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
        User::create([
            'name' => 'Admin User',
            'email' => 'smitexpert@gmail.com',
            'email_verified_at' => now(),
            'user_role' => 1,
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
        ]);
        factory(User::class, 10)->create();
    }
}
