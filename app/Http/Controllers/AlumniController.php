<?php

namespace App\Http\Controllers;

use App\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('cms.alumni', [
          'alumni' => $this->alumni(),
        ]);
    }

    /**
     * Return the alumni as json.
     *
     * @return \Illuminate\Database\Eloquent\Collection  $alumni
     */
    public function alumni()
    {
      return Alumni::all()
                    ->map(function ($alumni) {
                      return $this->attachPicture($alumni);
                    });
    }
    
    /**
     * Display the form to add resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('cms.forms.alumni-form', [
        'breadcrumb_active' => 'Create New Alumni',
        'breadcrumb_past' => 'Alumni',
        'breadcrumb_past_url' => route('alumni.index'), 
      ]);
    }
    
    public function edit($id) {
      
      $alumni = Alumni::find($id);
            
      $alumni = $this->attachPicture($alumni);
      
      return view('cms.forms.alumni-form', [
        'breadcrumb_active' => 'Update Alumni',
        'breadcrumb_past' => 'Alumni',
        'breadcrumb_past_url' => route('alumni.index'), 
        'alumni' => $alumni,
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
      $alumni = Alumni::create($request->all());
  		if ($alumni && $request->hasFile('picture')) {
  			$this->updatePicture($request, $alumni);
  		}
      return redirect()->route('alumni.create')
                       ->with('message', 'Alumni created successfully');
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'name' => 'required|string|unique:alumni,name,'. $id,
        'description' => 'required',
        'year_finished' => 'required',
        'picture' => 'nullable|file|image|max:2048',
      ];
    }

    /**
     * Get the validation messages
     *
     * @return array
     */
    private function messages() {
      return [
        'name.unique' => 'A alumni with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      $alumni = Alumni::updateOrCreate(compact('id'), $request->all());
      return $this->attachPicture($alumni);
    }
    
    public function updatePicture(Request $request, Alumni $alumni)
    {
      $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
      $alumni->clearMediaCollection('alumni_pictures');
      $extension = $request->file('picture')->getClientOriginalExtension();
      $fileName = uniqid() . $extension;
      $alumni->addMediaFromRequest('picture')
              ->usingFileName($fileName)->toMediaCollection('alumni_pictures');
      return $this->attachPicture($alumni)->picture;
    }
    
    /**
     * Attach Picture to Alumni.
     *
     * @return \App\Alumni  $alumni
     */
    private function attachPicture($alumni) {
  
      if($alumni->hasMedia('alumni_pictures')) {
        $alumni->picture = $alumni->getFirstMediaUrl('alumni_pictures');
      } 
      
      return $alumni;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumni  $alumni
     * @return boolean
     */
    public function destroy(Alumni $alumni)
    {
      $id = $alumni->id;
      $alumni->delete();
      
      return $id;
    }
}
