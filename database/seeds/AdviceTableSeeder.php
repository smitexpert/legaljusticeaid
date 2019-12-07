<?php

use App\Advice;
use Illuminate\Database\Seeder;

class AdviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Advice::class, 50)->create();
    }
}
