<?php

namespace App\Http\Controllers;

use App\Course;
use App\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('cms.courses', [
          'courses' => $this->courses(),
        ]);
    }

    /**
     * Return the courses as json.
     *
     * @return \Illuminate\Database\Eloquent\Collection  $courses
     */
    public function courses()
    {
      return Course::all()
                    ->map(function ($course) {
                      return $course;
                      // return $this->attachPicture($course);
                    });
    }
    
    /**
     * Display the form to add resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('cms.forms.course-form', [
        'breadcrumb_active' => 'Create New Course',
        'breadcrumb_past' => 'Courses',
        'breadcrumb_past_url' => route('courses.index'), 
        'programs' => Program::all(),
      ]);
    }
    
    public function edit(Course $course) {
      // $course = $this->attachPicture($course);
      
      return view('cms.forms.course-form', [
        'breadcrumb_active' => 'Update Course',
        'breadcrumb_past' => 'Courses',
        'breadcrumb_past_url' => route('courses.index'), 
        'course' => $course,
        'programs' => Program::all(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, $this->rules(), $this->messages());
      $course = Course::create($request->all());
  		// if ($course && $request->hasFile('picture')) {
  		// 	$this->updatePicture($request, $course);
  		// }
      return redirect()->route('courses.create')
                       ->with('message', 'Course created successfully');
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'name' => 'required|string|unique:courses,name,'. $id,
        'description' => 'required',
        'video_id' => 'required',
        'program_id' => 'required',
        // 'picture' => 'nullable|file|image|max:2048',
      ];
    }

    /**
     * Get the validation messages
     *
     * @return array
     */
    private function messages() {
      return [
        'name.unique' => 'A course with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      $course = Course::updateOrCreate(compact('id'), $request->all());
      return $course;
      // return $this->attachPicture($course);
    }
    
    // public function updatePicture(Request $request, Course $course)
    // {
    //   $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
    //   $course->clearMediaCollection('program_pictures');
    //   $extension = $request->file('picture')->getClientOriginalExtension();
    //   $fileName = uniqid() . $extension;
    //   $course->addMediaFromRequest('picture')
    //           ->usingFileName($fileName)->toMediaCollection('program_pictures');
    //   return $this->attachPicture($course)->picture;
    // }
    
    /**
     * Attach Picture to Course.
     *
     * @return \App\Course  $course
     */
    // private function attachPicture($course) {
    // 
    //   if($course->hasMedia('program_pictures')) {
    //     $course->picture = $course->getFirstMediaUrl('program_pictures');
    //   } else {
    //     $course->picture = asset('images/programsbanner.png');
    //   }
    //   
    //   return $course;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return boolean
     */
    public function destroy(Course $course)
    {
      $id = $course->id;
      $course->delete();
      
      return $id;
    }
}
