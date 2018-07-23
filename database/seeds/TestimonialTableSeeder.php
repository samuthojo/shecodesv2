<?php

use Illuminate\Database\Seeder;
use App\Testimonial;

class TestimonialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(app()->isLocal())
        {
          $faker = Faker\Factory::create();

          for($i = 0; $i < 4; $i++)
          {
            Testimonial::create([
              'name' => $faker->name . (($i % 2 == 0) ? ', Parent' : ', Student'),
              'description' => $faker->paragraph(4, false),
            ]);
          }
        }
    }
}
