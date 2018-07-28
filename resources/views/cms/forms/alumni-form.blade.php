@extends('cms.layouts.cms')

@section('more')
<script type="text/javascript">
  //Save the alumni in the window
  @isset($alumni)
  window.item = {!! json_encode($alumni) !!}
  @endisset
  //Save the alumni fields in the window
  window.fields = {
    name:'', description: '', year_finished: '',
  }
  //Save the baseUrl in the window
  window.baseUrl = '/api/alumni'
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
            Alumni Form
          </div>
          
          <div class="card-body d-flex justify-content-between flex-wrap">
            
            <div class="col-md-8">
              
              <div class="form-group">
                <label for="name">Alumni Name:</label>
                <input type="text" name="name" class="form-control"
                  v-model="form.name" required>
              </div>
              <div class="form-group">
                <label for="name">Alumni Description:</label>
                <textarea name="description" rows="5" 
                  class="form-control" v-model="form.description"
                  required></textarea>
              </div>
              <div class="form-group">
                <label for="form_link">Year Finished:</label>
                <input type="text" name="year_finished" 
                  class="form-control date-picker"
                  :value="form.year_finished" id="year-picker" required>
              </div>
              
            </div>
            
            <div class="col-md-4">
              
              <div class="form-group text-center">
                <label for="video_link">Alumni Picture:</label>
                <div class="picture-container">
                  <img 
                    v-show="showPicture"
                    :src="form.picture" alt="Alumni Picture"
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