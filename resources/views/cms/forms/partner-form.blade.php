@extends('cms.layouts.cms')

@section('more')
<script type="text/javascript">
  //Save the partner in the window
  @isset($partner)
  window.item = {!! json_encode($partner) !!}
  @endisset
  //Save the parent models in the window
  window.parents = {!! json_encode($programs) !!}
  //Save the partner fields in the window
  window.fields = {
    name:'', link: '', program_id: '',
    picture: '',
  }
  //Save the baseUrl in the window
  window.baseUrl = '/api/partners'
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
            Partner Form
          </div>
          
          <div class="card-body d-flex justify-content-between flex-wrap">
            
            <div class="col-md-8">
              
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
                <label for="name">Partner Name:</label>
                <input type="text" name="name" class="form-control"
                  v-model="form.name" required>
              </div>
              <div class="form-group">
                <label for="form_link">Partner Link:</label>
                <input type="text" name="link" class="form-control"
                  v-model="form.link">
              </div>
              
            </div>
            
            <div class="col-md-4">
              
              <div class="form-group text-center">
                <label for="video_link">Partner Picture:</label>
                <div class="picture-container">
                  <img 
                    v-show="showPicture"
                    :src="form.picture" alt="Partner Picture"
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