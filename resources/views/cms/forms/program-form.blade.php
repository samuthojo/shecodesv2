@extends('cms.layouts.cms')

@section('more')
<script type="text/javascript">
  //Save the program in the window
  @isset($program)
  window.item = {!! json_encode($program) !!}
  @else 
  window.item = null
  @endisset
  //Save the program fields in the window
  window.fields = {
    name:'', description: '', curriculum_description: '',
    form_link: '', video_link: '', picture: '',
  }
  //Save the baseUrl in the window
  window.baseUrl = '/api/programs'
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
            Program Form
          </div>
          
          <div class="card-body d-flex justify-content-between flex-wrap">
            
            <div class="col-md-8">
              
              <div class="form-group">
                <label for="name">Program Name:</label>
                <input type="text" name="name" class="form-control"
                  v-model="form.name" required>
              </div>
              <div class="form-group">
                <label for="name">Program Description:</label>
                <textarea name="description" rows="5" 
                  class="form-control" v-model="form.description"
                  required></textarea>
              </div>
              <div class="form-group">
                <label for="name">Curriculum Description:</label>
                <textarea name="curriculum_description" rows="5" 
                  class="form-control" 
                  v-model="form.curriculum_description"
                  required></textarea>
              </div>
              <div class="form-group">
                <label for="form_link">Form Link:</label>
                <input type="text" name="form_link" class="form-control"
                  v-model="form.form_link" required>
              </div>
              <div class="form-group">
                <label for="video_link">Video Link:</label>
                <input type="text" name="video_link" class="form-control"
                  v-model="form.video_link" required>
              </div>
              
            </div>
            
            <div class="col-md-4">
              
              <div class="form-group text-center">
                <label for="video_link">Program Picture:</label>
                <div class="picture-container">
                  <img 
                    v-show="showPicture"
                    :src="form.picture" alt="Program Picture"
                    class="picture img-thumbnail">
                  <i v-show="showIcon" class="fa fa-5x fa-file-photo-o"></i>
                  <div class="picture-placeholder d-flex align-items-center justify-content-center"
                    v-if="showPlaceHolder">@{{file.name}}</div>
                </div>
                <button type="button" 
                  class="btn btn-pill btn-outline-success mt-2"
                  @click="onUpload()">
                  <i class="fa fa-upload"></i>
                  <span v-show="!showPicture">Upload</span>
                  <span v-show="showPicture">Change</span>
                </button>
                <input type="file" name="picture" id="file-input" 
                  class="d-none" @change="onFileUploaded">
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