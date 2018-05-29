<?php

namespace App;

use App\ShecodesModel;
use App\Program;

class Course extends ShecodesModel
{
    protected $fillable = [
      'name', 'description', 'video_id',
      'program_id',
    ];

    public function program()
    {
      return $this->belongsTo(Program::class);
    }
}
