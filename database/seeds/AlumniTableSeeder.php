<?php

use Illuminate\Database\Seeder;
use App\Alumni;

class AlumniTableSeeder extends Seeder
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

        $alumnis = [
          [
            'name' => 'Rhoda Mwombela',
            'description' => 'Rhoda first got involved with shecodes late ' .
                             'June 2015, she is now the lead Digital ' .
                             'Marketting specialist at IPF Softwares. ' .
                             'She is passionate about fusing modelling, ' .
                             'hip hop and code on a daily basis and this ' .
                             'makes us really proud. Go Rhoda!',
            'year_finished' => 2015,
          ],
          [
            'name' => 'Saida Ali',
            'description' => 'Saida Ali is a student as the University ' .
                             'of Dar Es Salaam majoring in Computer Engineering, '.
                             'she writes beautiful Java Code and has really ' .
                             'surpassed her mentor which has to be said is a '.
                             'pretty darn huge accomplishment since he is like ' .
                             'a total geek.',
            'year_finished' => 2016,
          ],
          [
            'name' => 'Bebe Anthony',
            'description' => 'Bebe graduated from Mzumbe university in 2015 ' .
                             'and is currently working as a systems analyst ' .
                             'at 5 seconds tanzania, on her free time she ' .
                             'contributes to the open source project emoji ' .
                             'translate that vows to make emojis rule the world.',
            'year_finished' => 2017,
          ],
        ];

        $default_pictures = [
          public_path('images/alumni1.jpg'), public_path('images/alumni2.jpg'),
          public_path('images/alumni3.jpg'),
        ];

        foreach($alumnis as $key=>$value)
        {
          $alumni = Alumni::create($value);
          $alumni->copyMedia($default_pictures[$key])
                 ->toMediaCollection('alumni_pictures');
        }
      }
    }
}
