<?php

use App\AdviceCategory;
use Illuminate\Database\Seeder;

class AdviceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(AdviceCategory::class, 50)->create();
    }
}
