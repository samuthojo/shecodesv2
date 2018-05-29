<?php

use Illuminate\Database\Seeder;
use App\Activity;
use App\Program;

class ActivityTableSeeder extends Seeder
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

        $program_id = Program::where('name', 'Girls In ICT')->first()->id;

        $default_pictures = [
          public_path('images/prog1.jpg'), public_path('images/prog2.jpg'),
          public_path('images/prog3.jpg'), public_path('images/prog4.jpg'),
        ];

        collect($default_pictures)->each(function($default_picture)
          use($program_id, $faker)
        {

          $activity = Activity::create([
            'program_id' => $program_id,
            'name' => 'Trainers Meetup',
            'date' => $faker->date,
            'location' => 'Arusha, Tanzania',
            'pictures_link' => null,
          ]);

          $activity->copyMedia($default_picture)->toMediaCollection('activity_pictures');

        });

      }
    }
}
