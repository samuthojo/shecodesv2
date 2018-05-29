<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('cms.testimonials');
    }

    public function testimonials()
    {
        return Testimonial::where('archived', false)->get();
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
      return Testimonial::create($request->all());
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'name' => 'required|string|unique:testimonials,name,'. $id,
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
        'name.unique' => 'A testimonial with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      return Testimonial::updateOrCreate(compact('id'), $request->all());
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return boolean
     */
    public function archive(Testimonial $testimonial)
    {
      $testimonial->archived = true;
      return $testimonial->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return boolean
     */
    public function destroy(Testimonial $testimonial)
    {
        return $testimonial->delete();
    }
}
