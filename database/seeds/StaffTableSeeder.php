<?php

use Illuminate\Database\Seeder;
use App\Staff;

class StaffTableSeeder extends Seeder
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

        $staff = [
          [
            'name' => 'Simon Mutabazi',
            'position' => 'Project Manager',
            'description' => $faker->paragraph(3, false),
          ],
          [
            'name' => 'Rehema Mtandika',
            'position' => 'Hub Manager',
            'description' => $faker->paragraph(3, false),
          ],
          [
            'name' => 'Doreen Bateyunga',
            'position' => 'Logistics Lead',
            'description' => $faker->paragraph(3, false),
          ],
          [
            'name' => 'Mujuni Baitan',
            'position' => 'Logistics',
            'description' => $faker->paragraph(3, false),
          ],
          [
            'name' => 'Ebenhard Oswald',
            'position' => 'Logistics',
            'description' => $faker->paragraph(3, false),
          ],
          [
            'name' => 'Leroy Sanyi',
            'position' => 'Logistics',
            'description' => $faker->paragraph(3, false),
          ],
          [
            'name' => 'Godfrey Nyombi',
            'position' => 'Co-Founder',
            'is_director' => true,
            'description' => "He holds a Master's degree of " .
                             "Medical Science in Health Informatics " .
                             "from Karolinska Institute Sweden, focused " .
                             "on effective implementation of Healthcare " .
                             "Technologies in the developing countries",
          ],
          [
            'name' => 'Rose Funja',
            'position' => 'Co-Founder',
            'is_director' => true,
            'description' => "Rose Funja is an expert in Communication " .
                             "and Information systems, with 5 years " .
                             "experience of working in International " .
                             "Telecommunication projects. She is the director " .
                             "of ICT at the University of Bagamoyo and runs " .
                             "a technology company Agrinfo which focuses on " .
                             "leveraging ICT in Agriculture",
          ],
          [
            'name' => 'Jumanne Mtambalike',
            'position' => 'Project Manager',
            'is_director' => true,
            'description' => "Jumanne Mtambalike is an expert on African " .
                             "Innovations, business development and " .
                             "technology entrepreneurship. He is a tech " .
                             "enthusiast, blogger, coach, mentor and community " .
                             "reformer",
          ],
        ];

        $default_pictures = [
          public_path('images/simon.jpg'), public_path('images/rehema.jpg'),
          public_path('images/doreen2.jpg'), public_path('images/mujuni.jpg'),
          public_path('images/eben.png'), public_path('images/leroy.jpg'),
          public_path('images/director1.jpg'), public_path('images/director2.jpg'),
          public_path('images/director3.jpg'),
        ];

        foreach($staff as $key=>$value)
        {
          $staff = Staff::create($value);

          $staff->copyMedia($default_pictures[$key])
                ->toMediaCollection('staff_pictures');
        }
      }

    }
}
