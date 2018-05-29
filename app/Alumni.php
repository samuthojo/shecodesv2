<?php

namespace App;

use App\ShecodesModel;

class Alumni extends ShecodesModel
{
  protected $fillable = [
    'name', 'description', 'year_finished',
  ];
}
