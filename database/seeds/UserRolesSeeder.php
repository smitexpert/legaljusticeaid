<?php

use App\UserRole;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create([
            'rule_name' => 'admin'
        ]);

        UserRole::create([
            'rule_name' => 'manager'
        ]);

        UserRole::create([
            'rule_name' => 'author'
        ]);

        UserRole::create([
            'rule_name' => 'moderator'
        ]);

        UserRole::create([
            'id' => '7',
            'rule_name' => 'user'
        ]);
    }
}
