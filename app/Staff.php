<?php

namespace App;

use App\ShecodesModel;

class Staff extends ShecodesModel
{
  protected $fillable = [
    'name', 'position', 'is_director',
    'description',
  ];
}
