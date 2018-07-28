@extends('cms.layouts.cms')

@section('more')
<script type="text/javascript">
  //Save the activity in the window
  @isset($activity)
  window.item = {!! json_encode($activity) !!}
  @endisset
  //Save the parent models in the window
  window.parents = {!! json_encode($programs) !!}
  //Save the activity fields in the window
  window.fields = {
    name:'', date: '', location: '',
    pictures_link: '', program_id: '',
  }
  //Save the baseUrl in the window
  window.baseUrl = '/api/activities'
</script>
@endsection

@section('breadcrumb')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ $breadcrumb_past_url }}">{{$breadcrumb_past}}</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
      {{$breadcrumb_active}}</li>
  </ol>
</nav>
@endsection

@section('content')  
<div class="row">
        
    <div class="col-12">   
                  
      <form class="position-relative" 
        method="post" @submit.prevent="onSubmit">
                
        @include('cms.loaders.loader')

        <div class="card">
        
          <div class="card-header">
            Activity Form
          </div>
          
          <div class="card-body d-flex justify-content-between flex-wrap">
            
            <div class="col-12">
              
              <div class="form-group">
                <label for="name">Program Name:</label>
                <select name="program_id" class="form-control"
                  v-model="form.program_id" @change="">
                  <option 
                    v-for="parent in parents" :key="parent.id"
                    :value="parent.id">@{{parent.name}}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Activity Name:</label>
                <input type="text" name="name" class="form-control"
                  v-model="form.name" required>
              </div>
              <div class="form-group">
                <label for="form_link">Date:</label>
                <input type="text" name="date" class="form-control"
                  v-model="form.date" data-toggle="datepicker" required>
              </div>
              <div class="form-group">
                <label for="form_link">Location:</label>
                <input type="text" name="location" class="form-control"
                  v-model="form.location" required>
              </div>
              <div class="form-group">
                <label for="video_link">Link To Pictures:</label>
                <input type="text" name="pictures_link" class="form-control"
                  v-model="form.pictures_link">
              </div>
              
            </div>
            
          </div>
                    
          <div class="card-footer">
            <button type="submit" 
              class="btn btn-pill btn-success btn-lg float-right">
              Submit
            </button>
          </div>
          
        </div>
        
      </form>
                      
  </div>
    
</div>

@endsection