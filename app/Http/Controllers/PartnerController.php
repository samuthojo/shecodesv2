<?php

namespace App\Http\Controllers;

use App\Partner;
use App\Program;
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
          'partners' => $this->partners(),
        ]);
    }

    /**
     * Return the partners as json.
     *
     * @return \Illuminate\Database\Eloquent\Collection  $partners
     */
    public function partners()
    {
      return Partner::all()
                    ->map(function ($partner) {
                      return $this->attachPicture($partner);
                    });
    }
    
    /**
     * Display the form to add resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create() {
      return view('cms.forms.partner-form', [
        'breadcrumb_active' => 'Create New Partner',
        'breadcrumb_past' => 'Partners',
        'breadcrumb_past_url' => route('partners.index'), 
        'programs' => Program::all(),
      ]);
    }
    
    public function edit(Partner $partner) {
      $partner = $this->attachPicture($partner);
      
      return view('cms.forms.partner-form', [
        'breadcrumb_active' => 'Update Partner',
        'breadcrumb_past' => 'Partners',
        'breadcrumb_past_url' => route('partners.index'), 
        'partner' => $partner,
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
      $partner = Partner::create($request->all());
  		if ($partner && $request->hasFile('picture')) {
  			$this->updatePicture($request, $partner);
  		}
      return redirect()->route('partners.create')
                       ->with('message', 'Partner created successfully');
    }

    /**
     * Get the validation rules
     *
     * @return array
     */
    private function rules(string $id = null) {
      return [
        'name' => 'required',
        // 'name' => 'required|string|unique:partners,name,'. $id,
        'program_id' => 'required',
        'link' => 'nullable',
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
      $partner = Partner::updateOrCreate(compact('id'), $request->all());
      return $this->attachPicture($partner);
    }
    
    public function updatePicture(Request $request, Partner $partner)
    {
      $this->validate($request, ['picture' => 'nullable|file|image|max:2048',]);
      $partner->clearMediaCollection('partner_pictures');
      $extension = $request->file('picture')->getClientOriginalExtension();
      $fileName = uniqid() . $extension;
      $partner->addMediaFromRequest('picture')
              ->usingFileName($fileName)->toMediaCollection('partner_pictures');
      return $this->attachPicture($partner)->picture;
    }
    
    /**
     * Attach Picture to Partner.
     *
     * @return \App\Partner  $partner
     */
    private function attachPicture($partner) {
  
      if($partner->hasMedia('partner_pictures')) {
        $partner->picture = $partner->getFirstMediaUrl('partner_pictures');
      } 
      
      return $partner;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Partner  $partner
     * @return boolean
     */
    public function destroy(Partner $partner)
    {
      $id = $partner->id;
      $partner->delete();
      
      return $id;
    }
}
