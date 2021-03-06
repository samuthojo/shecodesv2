<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home.index');
});

Route::get('/about', function () {
    $months = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "Novemeber", "December");
    $active_months = array(2, 5, 6, 10, 11);
    $names = ["Rhoda Mwombela", "Saida Ali", "Bebe Anthony"];
    $descriptions = [
        "Rhoda first got involved with shecodes late June 2015, she is now the lead Digital Marketting specialist at IPF Softwares. She is passionate about fusing modelling, hip hop and code on a daily basis and this makes us really proud. Go Rhoda!",
        "Saida Ali is a student as the University of Dar Es Salaam majoring in Computer Engineering, she writes beautiful Java Code and has really surpassed her mentor which has to be said is a pretty darn huge accomplishment since he is like a total geek.",
        "Bebe graduated from Mzumbe university in 2015 and is currently working as a systems analyst at 5 seconds tanzania, on her free time she contributes to the open source project emoji translate that vows to make emojis rule the world."
    ];

    return view('about.index', compact("months", "active_months", "names", "descriptions"));
});

Route::get('/programs', function () {
    return view('programs.index');
});

Route::get('/programs/{slug}', function () {
    return redirect('programs');
});

Route::get('/team', function () {
    return view('team.index');
});

Route::get('/contacts', function () {
    return view('contacts.index');
});

Auth::routes();

Route::view('/admin/login', 'cms.login')->name('admin_login');

Route::middleware('auth')->prefix('/admin')->group(function() {
// Route::prefix('/admin')->group(function() {
  Route::get('/', 'DashboardController@index')->name('home');

  Route::resources([
    'programs' => 'ProgramController',
    'courses' => 'CourseController',
    'alumnis' => 'AlumniController',
    'staff' => 'StaffController',
    'partners' => 'PartnerController',
    'activities' => 'ActivityController',
    'testimonials' => 'TestimonialController',
  ]);
  
  Route::view('/change_password', 'cms.change_password')
       ->name('change_password');
});

Route::prefix('/api')->group(function() {
  
  Route::get('/programs', 'ProgramController@programs');
  Route::post('/programs', 'ProgramController@store');
  Route::patch('/programs/{program}', 'ProgramController@update');
  Route::patch('/programs/{program}/picture', 'ProgramController@updatePicture');
  Route::delete('/programs/{program}', 'ProgramController@destroy');

  Route::get('/courses', 'CourseController@courses');
  Route::post('/courses', 'CourseController@store');
  Route::patch('/courses/{course}', 'CourseController@update');
  Route::delete('/courses/{course}', 'CourseController@destroy');

  Route::get('/staff', 'StaffController@staff');
  Route::post('/staff', 'StaffController@store');
  Route::patch('/staff/{staff}', 'StaffController@update');
  Route::patch('/staff/{staff}/picture', 'StaffController@updatePicture');
  Route::delete('/staff/{staff}', 'StaffController@destroy');

  Route::get('/alumnis', 'AlumniController@alumni');
  Route::post('/alumnis', 'AlumniController@store');
  Route::patch('/alumnis/{alumni}', 'AlumniController@update');
  Route::patch('/alumnis/{alumni}/picture', 'AlumniController@updatePicture');
  Route::delete('/alumnis/{alumni}', 'AlumniController@destroy');

  Route::get('/partners', 'PartnerController@partners');
  Route::post('/partners', 'PartnerController@store');
  Route::patch('/partners/{partner}', 'PartnerController@update');
  Route::patch('/partners/{partner}/picture', 'PartnerController@updatePicture');
  Route::delete('/partners/{partner}', 'PartnerController@destroy');

  Route::get('/testimonials', 'TestimonialController@testimonials');
  Route::post('/testimonials', 'TestimonialController@store');
  Route::patch('/testimonials/{testimonial}', 'TestimonialController@update');
  Route::delete('/testimonials/{testimonial}', 'TestimonialController@destroy');

  Route::get('/activities', 'ActivityController@activities');
  Route::post('/activities', 'ActivityController@store');
  Route::patch('/activities/{activity}', 'ActivityController@update');
  Route::delete('/activities/{activity}', 'ActivityController@destroy');
});
