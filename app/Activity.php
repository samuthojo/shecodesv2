<?php

namespace App;

use App\ShecodesModel;
use App\Program;

class Activity extends ShecodesModel
{
    protected $fillable = [
      'name', 'date', 'location', 'pictures_link', 'program_id',
    ];

    public function program()
    {
      return $this->belongsTo(Program::class);
    }
}
