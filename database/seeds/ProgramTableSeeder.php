<?php

use Illuminate\Database\Seeder;
use App\Program;

class ProgramTableSeeder extends Seeder
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

        $program_names = [
          'Girls In ICT', 'Summer Camp', 'Holiday Program',
        ];

        $default_picture = public_path('images/programsbanner.png');

        collect($program_names)->each(function($program_name)
          use($default_picture, $faker)
        {

          $program = Program::create([
            'name' => $program_name,
            'description' => $faker->paragraph(8, false),
            'curriculum_description' => $faker->paragraph(8, false),
            'video_link' => 'https://www.youtube.com/watch?v=4Wlz5qZa9-M',
            'form_link' => 'http://goo.gl/forms/cCa1Ox5ZJj',
          ]);

          $program->copyMedia($default_picture)->toMediaCollection('program_pictures');

        });

      }
    }
}
