<?php

namespace App\Http\Controllers;

use App\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cms.partners', [
          'partners' => Partner::all(),
        ]);
    }

    /**
     * Return the partners as json.
     *
     * @return \App\Partner  $partners
     */
    public function partners()
    {
      return Partner::where('archived', false)
                    ->get()->map(function ($partner) {
                      $partner->picture_url = $partner->getFirstMediaUrl('partner_pictures');
                      return $partner;
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
        $partner = Partner::create($request->all());
    		if ($partner && $request->hasFile('picture')) {
    			//clear existing
    			$partner->clearMediaCollection('partner_pictures');
    			//attach new
    			$partner->addMediaFromRequest('picture')
    				      ->toMediaCollection('partner_pictures');
    		}
        return $partner;
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'program_id' => 'required|integer',
        'name' => 'required|string|unique:partners,name,'. $id,
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
        'name.unique' => 'A partner with same name exists',
      ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, $this->rules($id), $this->messages());
      return Partner::updateOrCreate(compact('id'), $request->all());
    }

    /**
     * Archive the specified resource.
     *
     * @param  \App\Partner  $partner
     * @return boolean
     */
    public function archive(Partner $partner)
    {
      $partner->archived = true;
      return $partner->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return boolean
     */
    public function destroy(Partner $partner)
    {
        return $partner->delete();
    }
}
