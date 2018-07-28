@extends('cms.layouts.cms')

@section('more')
<script type="text/javascript">
  //Save the testimonial in the window
  @isset($testimonial)
  window.item = {!! json_encode($testimonial) !!}
  @endisset
  //Save the testimonial fields in the window
  window.fields = {
    name:'', description: '',
  }
  //Save the baseUrl in the window
  window.baseUrl = '/api/testimonials'
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
            Testimonial Form
          </div>
          
          <div class="card-body d-flex justify-content-between flex-wrap">
            
            <div class="col-12">
              
              <div class="form-group">
                <label for="name">Testifier:</label>
                <input type="text" name="name" class="form-control"
                  v-model="form.name" required>
              </div>
              <div class="form-group">
                <label for="name">Testimony:</label>
                <textarea name="description" rows="3" 
                  class="form-control" v-model="form.description"
                  required></textarea>
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