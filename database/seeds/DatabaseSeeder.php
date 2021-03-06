<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserRolesSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SiteTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PostCategorySeeder::class);
        $this->call(LawyerTableSeeder::class);
        $this->call(CourtTableSeeder::class);
        $this->call(SpecializationTableSeeder::class);
        $this->call(PracticeAreaTableSeeder::class);
        $this->call(AdviceTableSeeder::class);
        // $this->call(AdviceCategorySeeder::class);
    }
}
