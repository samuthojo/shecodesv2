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
        return view('cms.alumni');
    }

    public function alumni()
    {
        return Alumni::where('archived', false)
                    ->get()->map(function ($alumni) {
                        $alumni->picture_url = $alumni->getFirstMediaUrl('alumni_pictures');
                        return $alumni;
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
        $alumni =  Alumni::create($request->all());
        if ($alumni && $request->hasFile('picture')) {
            //clear existing
            $alumni->clearMediaCollection('alumni_pictures');
            //attach new
            $alumni->addMediaFromRequest('picture')
              ->toMediaCollection('alumni_pictures');
        }
        return $alumni;
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null)
    {
        return [
        'name' => 'required|string|unique:alumni,name,'. $id,
        'position' => 'required',
        'is_director' => 'required|boolean',
        'description' => 'nullable|string',
        'picture' => 'nullable|file|image|max:2048',
      ];
    }

    /**
     * Get the validation messages
     *
     * @return array
     */
    private function messages()
    {
        return [
        'name.unique' => 'A alumni with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, $this->rules($id), $this->messages());
        return Alumni::updateOrCreate(compact('id'), $request->all());
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Alumni  $alumni
     * @return boolean
     */
    public function archive(Alumni $alumni)
    {
        $alumni->archived = true;
        return $alumni->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumni  $alumni
     * @return boolean
     */
    public function destroy(Alumni $alumni)
    {
        return $alumni->delete();
    }
}
