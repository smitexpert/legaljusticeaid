<?php

use App\PracticeArea;
use Illuminate\Database\Seeder;

class PracticeAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PracticeArea::class, 20)->create();
    }
}
