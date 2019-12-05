<?php

use App\Lawyer;
use Illuminate\Database\Seeder;

class LawyerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Lawyer::class, 90)->create();
    }
}
