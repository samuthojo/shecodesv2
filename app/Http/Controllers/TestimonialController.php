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
        
        return view('cms.testimonials', [
          'testimonials' => $this->testimonials(),
        ]);
    }

    /**
     * Return the testimonials as json.
     *
     * @return \Illuminate\Database\Eloquent\Collection  $testimonials
     */
    public function testimonials()
    {
      return Testimonial::all()
                    ->map(function ($testimonial) {
                      return $testimonial;
                      // return $this->attachPicture($testimonial);
                    });
    }
    
    /**
     * Display the form to add resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('cms.forms.testimonial-form', [
        'breadcrumb_active' => 'Create New Testimonial',
        'breadcrumb_past' => 'Testimonials',
        'breadcrumb_past_url' => route('testimonials.index'), 
      ]);
    }
    
    public function edit(Testimonial $testimonial) {
      // $testimonial = $this->attachPicture($testimonial);
      
      return view('cms.forms.testimonial-form', [
      'breadcrumb_active' => 'Update Testimonial',
      'breadcrumb_past' => 'Testimonials',
      'breadcrumb_past_url' => route('testimonials.index'), 
      'testimonial' => $testimonial,
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
      $testimonial = Testimonial::create($request->all());
  		// if ($testimonial && $request->hasFile('picture')) {
  		// 	$this->updatePicture($request, $testimonial);
  		// }
      return redirect()->route('testimonials.create')
                       ->with('message', 'Testimonial created successfully');
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'name' => 'required',
        // 'name' => 'required|string|unique:testimonials,name,'. $id,
        'description' => 'required',
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
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      $testimonial = Testimonial::updateOrCreate(compact('id'), $request->all());
      return $testimonial;
      // return $this->attachPicture($testimonial);
    }
    
    // public function updatePicture(Request $request, Testimonial $testimonial)
    // {
    //   $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
    //   $testimonial->clearMediaCollection('program_pictures');
    //   $extension = $request->file('picture')->getClientOriginalExtension();
    //   $fileName = uniqid() . $extension;
    //   $testimonial->addMediaFromRequest('picture')
    //           ->usingFileName($fileName)->toMediaCollection('program_pictures');
    //   return $this->attachPicture($testimonial)->picture;
    // }
    
    /**
     * Attach Picture to Testimonial.
     *
     * @return \App\Testimonial  $testimonial
     */
    // private function attachPicture($testimonial) {
    // 
    //   if($testimonial->hasMedia('program_pictures')) {
    //     $testimonial->picture = $testimonial->getFirstMediaUrl('program_pictures');
    //   } else {
    //     $testimonial->picture = asset('images/programsbanner.png');
    //   }
    //   
    //   return $testimonial;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return boolean
     */
    public function destroy(Testimonial $testimonial)
    {
      $id = $testimonial->id;
      $testimonial->delete();
      
      return $id;
    }
}
