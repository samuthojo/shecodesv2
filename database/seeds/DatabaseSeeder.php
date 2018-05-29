<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(TestimonialTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        $this->call(ProgramTableSeeder::class);
        $this->call(CourseTableSeeder::class);
        $this->call(ActivityTableSeeder::class);
        $this->call(AlumniTableSeeder::class);
        $this->call(PartnerTableSeeder::class);
    }
}
