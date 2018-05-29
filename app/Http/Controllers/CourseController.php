<?php

namespace App\Http\Controllers;

use App\Course;
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
      return view('cms.courses');
    }

    public function courses()
    {
        return Course::where('archived', false)->get();
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
      return Course::create($request->all());
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'program_id' => 'required|integer',
        'name' => 'required|string|unique:courses,name,'. $id,
        'description' => 'required',
        'video_id' => 'required',
      ];
    }

    /**
     * Get the validation messages
     *
     * @return array
     */
    private function messages() {
      return [
        'program_id.required' => 'Please select a program',
        'name.unique' => 'A course with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      return Course::updateOrCreate(compact('id'), $request->all());
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Course  $course
     * @return boolean
     */
    public function archive(Course $course)
    {
      $course->archived = true;
      return $course->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return boolean
     */
    public function destroy(Course $course)
    {
        return $course->delete();
    }
}
