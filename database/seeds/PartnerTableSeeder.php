<?php

use Illuminate\Database\Seeder;
use App\Program;
use App\Partner;

class PartnerTableSeeder extends Seeder
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

          $program_id = Program::where('name', 'Girls In ICT')->first()->id;

          $partners = [
            [
              'program_id' => $program_id,
              'name' => 'Buni',
              'link' => 'http://buni.or.tz/',
            ],
            [
              'program_id' => $program_id,
              'name' => 'Danish Red Cross',
              'link' => null,
            ],
            [
              'program_id' => $program_id,
              'name' => 'World Bank',
              'link' => 'http://www.worldbank.org/en/country/tanzania',
            ],
            [
              'program_id' => $program_id,
              'name' => 'Sahara Sparks',
              'link' => 'http://www.saharasparks.com/',
            ],
            [
              'program_id' => $program_id,
              'name' => 'Tanzania Bora',
              'link' => 'http://www.tanzaniabora.org/',
            ],
          ];

          $default_pictures = [
            public_path('images/buni.png'), public_path('images/redcross.jpg'),
            public_path('images/wolrdbank.png'), public_path('images/saharalogo.png'),
            public_path('images/tbi.png'),
          ];

          foreach($partners as $key=>$value)
          {
            $partner = Partner::create($value);

            $partner->copyMedia($default_pictures[$key])
                    ->toMediaCollection('partner_pictures');
          }

        }
    }
}
