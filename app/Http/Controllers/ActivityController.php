<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.activities', [
          'activities' => Activity::with('program')->get(),
        ]);
    }

    /**
     * Return the activities as json.
     *
     * @return \App\Activity  $activities
     */
    public function activities()
    {
      return Activity::where('archived', false)
                     ->get()->map(function ($activity) {

                        $activity->picture_url = asset('images/prog4.jpg');

                        if($activity->hasMedia('activity_pictures')) {
                          $activity->picture_url = $activity->getFirstMediaUrl('activity_pictures');
                        }

                        return $activity;

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
        $activity = Activity::create($request->all());
    		if ($activity && $request->hasFile('picture')) {
    			//clear existing
    			$activity->clearMediaCollection('partner_pictures');
    			//attach new
    			$activity->addMediaFromRequest('picture')
    				      ->toMediaCollection('partner_pictures');
    		}
        return $activity;
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'program_id' => 'required|integer',
        'name' => 'required|string|unique:activities,name,'. $id,
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
        'program_id.required' => 'Please select a program',
        'name.unique' => 'A activity with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Activity  $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      return Activity::updateOrCreate(compact('id'), $request->all());
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Activity  $activity
     * @return boolean
     */
    public function archive(Activity $activity)
    {
      $activity->archived = true;
      return $activity->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return boolean
     */
    public function destroy(Activity $activity)
    {
        return $activity->delete();
    }
}
