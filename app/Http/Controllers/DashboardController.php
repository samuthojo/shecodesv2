<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
  public function index() {
    $count = [
      'staff' => DB::table('staff')->count(),
      'programs' => DB::table('programs')->count(),
      'courses' => DB::table('courses')->count(),
      'alumni' => DB::table('alumnis')->count(),
      'activities' => DB::table('activities')->count(),
      'testimonials' => DB::table('testimonials')->count(),
      'partners' => DB::table('partners')->count(),
    ];
    return view('cms.dashboard', compact('count'));
  }
}
