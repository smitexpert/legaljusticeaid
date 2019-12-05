<?php

use App\Court;
use Illuminate\Database\Seeder;

class CourtTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Court::class, 5)->create();
    }
}
