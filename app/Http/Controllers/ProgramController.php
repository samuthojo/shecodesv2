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
        return view('cms.programs');
    }

    /**
     * Return the programs as json.
     *
     * @return \App\Program  $programs
     */
    public function programs()
    {
      return Program::where('archived', false)
                    ->with(['courses', 'activities'])
                    ->get()->map(function ($program) {

                        $program->picture_url = asset('images/programsbanner.png');

                        if($program->hasMedia('program_pictures')) {
                          $program->picture_url = $program->getFirstMediaUrl('program_pictures');
                        }

                        return $program;

                    });
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
    			//clear existing
    			$program->clearMediaCollection('program_pictures');
    			//attach new
    			$program->addMediaFromRequest('picture')
    				      ->toMediaCollection('program_pictures');
    		}
        return $program;
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
      return Program::updateOrCreate(compact('id'), $request->all());
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Program  $program
     * @return boolean
     */
    public function archive(Program $program)
    {
      $program->archived = true;
      $program->save();
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
        return $program->delete();
    }
}
