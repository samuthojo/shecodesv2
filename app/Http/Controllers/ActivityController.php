<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Program;
use Illuminate\Http\Request;

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
          'activities' => $this->activities(),
        ]);
    }

    /**
     * Return the activities as json.
     *
     * @return \Illuminate\Database\Eloquent\Collection  $activities
     */
    public function activities()
    {
      return Activity::all()
                    ->map(function ($activity) {
                      return $activity;
                      // return $this->attachPicture($activity);
                    });
    }
    
    /**
     * Display the form to add resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('cms.forms.activity-form', [
        'breadcrumb_active' => 'Create New Activity',
        'breadcrumb_past' => 'Activities',
        'breadcrumb_past_url' => route('activities.index'), 
        'programs' => Program::all(),
      ]);
    }
    
    public function edit(Activity $activity) {
      // $activity = $this->attachPicture($activity);
      
      return view('cms.forms.activity-form', [
        'breadcrumb_active' => 'Update Activity',
        'breadcrumb_past' => 'Activities',
        'breadcrumb_past_url' => route('activities.index'), 
        'activity' => $activity,
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
      $activity = Activity::create($request->all());
  		// if ($activity && $request->hasFile('picture')) {
  		// 	$this->updatePicture($request, $activity);
  		// }
      return redirect()->route('activities.create')
                       ->with('message', 'Activity created successfully');
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        // 'name' => 'required|string|unique:activities,name,'. $id,
        'date' => 'required',
        'location' => 'required',
        'pictures_link' => 'nullable',
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
        'name.unique' => 'An activity with same name exists',
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
      $activity = Activity::updateOrCreate(compact('id'), $request->all());
      return $activity;
      // return $this->attachPicture($activity);
    }
    
    // public function updatePicture(Request $request, Activity $activity)
    // {
    //   $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
    //   $activity->clearMediaCollection('program_pictures');
    //   $extension = $request->file('picture')->getClientOriginalExtension();
    //   $fileName = uniqid() . $extension;
    //   $activity->addMediaFromRequest('picture')
    //           ->usingFileName($fileName)->toMediaCollection('program_pictures');
    //   return $this->attachPicture($activity)->picture;
    // }
    
    /**
     * Attach Picture to Activity.
     *
     * @return \App\Activity  $activity
     */
    // private function attachPicture($activity) {
    // 
    //   if($activity->hasMedia('program_pictures')) {
    //     $activity->picture = $activity->getFirstMediaUrl('program_pictures');
    //   } else {
    //     $activity->picture = asset('images/programsbanner.png');
    //   }
    //   
    //   return $activity;
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Activity  $activity
     * @return boolean
     */
    public function destroy(Activity $activity)
    {
      $id = $activity->id;
      $activity->delete();
      
      return $id;
    }
}
