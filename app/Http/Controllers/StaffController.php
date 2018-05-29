<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('cms.staff');
    }

    public function staff()
    {
        return Staff::where('archived', false)
                    ->get()->map(function ($staff) {
                      $staff->picture_url = $staff->getFirstMediaUrl('staff_pictures');
                      return $staff;
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
      $staff =  Staff::create($request->all());
      if ($staff && $request->hasFile('picture')) {
        //clear existing
        $staff->clearMediaCollection('staff_pictures');
        //attach new
        $staff->addMediaFromRequest('picture')
              ->toMediaCollection('staff_pictures');
      }
      return $staff;
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'name' => 'required|string|unique:staff,name,'. $id,
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
    private function messages() {
      return [
        'name.unique' => 'A staff with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Program  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      return Staff::updateOrCreate(compact('id'), $request->all());
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Staff  $staff
     * @return boolean
     */
    public function archive(Staff $staff)
    {
      $staff->archived = true;
      return $staff->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Staff  $staff
     * @return boolean
     */
    public function destroy(Staff $staff)
    {
        return $staff->delete();
    }
}
