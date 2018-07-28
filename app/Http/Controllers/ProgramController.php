<?php

namespace App\Http\Controllers;

use App\Program;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('cms.programs', [
          'programs' => $this->programs(),
        ]);
    }

    /**
     * Return the programs as json.
     *
     * @return \Illuminate\Database\Eloquent\Collection  $programs
     */
    public function programs()
    {
      return Program::all()
                    ->map(function ($program) {
                      return $this->attachPicture($program);
                    });
    }
    
    /**
     * Display the form to add resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('cms.forms.program-form', [
        'breadcrumb_active' => 'Create New Program',
        'breadcrumb_past' => 'Programs',
        'breadcrumb_past_url' => route('programs.index'), 
      ]);
    }
    
    public function edit(Program $program) {
      $program = $this->attachPicture($program);
      
      return view('cms.forms.program-form', [
      'breadcrumb_active' => 'Update Program',
      'breadcrumb_past' => 'Programs',
      'breadcrumb_past_url' => route('programs.index'), 
      'program' => $program,
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
      $program = Program::create($request->all());
  		if ($program && $request->hasFile('picture')) {
  			$this->updatePicture($request, $program);
  		}
      return redirect()->route('programs.create')
                       ->with('message', 'Program created successfully');
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'name' => 'required|string|unique:programs,name,'. $id,
        'description' => 'required',
        'curriculum_description' => 'required',
        'video_link' => 'required',
        'form_link' => 'required',
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
        'name.unique' => 'A program with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      $program = Program::updateOrCreate(compact('id'), $request->all());
      return $this->attachPicture($program);
    }
    
    public function updatePicture(Request $request, Program $program)
    {
      $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
      $program->clearMediaCollection('program_pictures');
      $extension = $request->file('picture')->getClientOriginalExtension();
      $fileName = uniqid() . $extension;
      $program->addMediaFromRequest('picture')
              ->usingFileName($fileName)->toMediaCollection('program_pictures');
      return $this->attachPicture($program)->picture;
    }
    
    /**
     * Attach Picture to Program.
     *
     * @return \App\Program  $program
     */
    private function attachPicture($program) {
  
      if($program->hasMedia('program_pictures')) {
        $program->picture = $program->getFirstMediaUrl('program_pictures');
      } else {
        $program->picture = asset('images/programsbanner.png');
      }
      
      return $program;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Program  $program
     * @return boolean
     */
    public function destroy(Program $program)
    {
      $id = $program->id;
      $program->delete();
      
      return $id;
    }
}
