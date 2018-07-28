@extends('cms.layouts.cms')

@section('more')
<script type="text/javascript">
  //Save the course in the window
  @isset($course)
  window.item = {!! json_encode($course) !!}
  @endisset
  //Save the parent models in the window
  window.parents = {!! json_encode($programs) !!}
  //Save the course fields in the window
  window.fields = {
    name:'', description: '', video_id: '',
    program_id: '', 
  }
  //Save the baseUrl in the window
  window.baseUrl = '/api/courses'
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
            Course Form
          </div>
          
          <div class="card-body d-flex justify-content-between flex-wrap">
            
            <div class="col-12">
              
              <div class="form-group">
                <label for="name">Program Name:</label>
                <select name="program_id" class="form-control"
                  v-model="form.program_id" required>
                  <option 
                    v-for="parent in parents" :key="parent.id" 
                    :value="parent.id">@{{parent.name}}</option>
                </select>
              </div>
              <div class="form-group">
                <label for="name">Course Name:</label>
                <input type="text" name="name" class="form-control"
                  v-model="form.name" required>
              </div>
              <div class="form-group">
                <label for="name">Course Description:</label>
                <textarea name="description" rows="5" 
                  class="form-control" v-model="form.description"
                  required></textarea>
              </div>
              <div class="form-group">
                <label for="video_link">Video ID:</label>
                <input type="text" name="video_id" class="form-control"
                  v-model="form.video_id" required>
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