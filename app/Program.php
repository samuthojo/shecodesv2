<?php

namespace App;

use App\ShecodesModel;
use App\Course;
use App\Activity;
use App\Partner;

class Program extends ShecodesModel
{
    protected $fillable = [
      'name', 'description', 'curriculum_description',
      'video_link', 'form_link',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'archived',
    ];

    protected $cascadeDeletes = [
      'courses', 'activities', 'partners',
    ];

    public function courses()
    {
      return $this->hasMany(Course::class);
    }

    public function activities()
    {
      return $this->hasMany(Activity::class);
    }

    public function partners()
    {
      return $this->hasMany(Partner::class);
    }
}
