<?php

namespace App;

use App\ShecodesModel;

use App\Program;

class Partner extends ShecodesModel
{
    protected $fillable = [
      'name', 'link', 'program_id',
    ];

    public function program()
    {
      return $this->belongsTo(Program::class);
    }
}
