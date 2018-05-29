<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name' => config('administrator.name'),
        'username' => config('administrator.username'),
        'password' => bcrypt(config('administrator.password')),
        'email' => config('administrator.email'),
      ]);

      //To add another admin from ipf who will be maintaining shecodes website
      User::create([
        'name' => config('administrator.name'),
        'username' => config('administrator.maintenance_username'),
        'password' => bcrypt(config('administrator.maintenance_password')),
        'email' => config('administrator.maintenance_email'),
      ]);
    }
}
