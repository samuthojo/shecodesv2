<?php

use Illuminate\Database\Seeder;
use App\Course;
use App\Program;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if (app()->isLocal()) {

        $faker = Faker\Factory::create();

        $course_names = [
          'Mobile Apps Development', 'Scratch Apps Development',
          'Website Development',
        ];

        $program_id = Program::where('name', 'Girls In ICT')->first()->id;

        $video_ids = [
          'YPYWcq1rjFw', '75CTng0ryTM', '4Wlz5qZa9-M',
        ];

        foreach ($course_names as $index => $course_name) {
          Course::create([
            'program_id' => $program_id,
            'name' => $course_name,
            'description' => $faker->paragraph(8, false),
            'video_id' => $video_ids[$index],
          ]);
        }

      }
    }
}
