<?php

use App\Site;
use Illuminate\Database\Seeder;

class SiteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Site::create([
            'name' => 'Legal Justice Aid',
            'phone' => '01994387497',
            'email' => 'smitexpert@gmail.com',
            'address' => 'Dhaka Uddan, Mohammadpur, Dhaka-1207',
            'description' => 'This site saying for Justice for Legal.'
        ]);
    }
}
