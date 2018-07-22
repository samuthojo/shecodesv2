@extends('cms.layouts.cms')

@section('content')

<div class="container">
  
  <div class="row">
            
        <div class="card col-md-4">
          <div class="card-body">
            <h5 class="card-title">Staff</h5>
            <p class="card-text">
              {{ sprintf('%s', number_format($count['staff'])) }}
            </p>
          </div>
        </div>
        
        <div class="card col-md-4 mt-2 mt-md-0">
          <div class="card-body">
            <h5 class="card-title">Programs</h5>
            <p class="card-text">
              {{ sprintf('%s', number_format($count['programs'])) }}
            </p>
          </div>
        </div>
        
        <div class="card col-md-4 mt-2 mt-md-0">
          <div class="card-body">
            <h5 class="card-title">Courses</h5>
            <p class="card-text">
              {{ sprintf('%s', number_format($count['courses'])) }}
            </p>
          </div>
        </div>
                  
  </div>

  <div class="row mt-0 mt-md-2">
        
      <div class="card col-md-4 mt-2 mt-md-0">
        <div class="card-body">
          <h5 class="card-title">Alumni</h5>
          <p class="card-text">
            {{ sprintf('%s', number_format($count['alumni'])) }}
          </p>
        </div>
      </div>
      
      <div class="card col-md-4 mt-2 mt-md-0">
        <div class="card-body">
          <h5 class="card-title">Activities</h5>
          <p class="card-text">
            {{ sprintf('%s', number_format($count['activities'])) }}
          </p>
        </div>
      </div>
      
      <div class="card col-md-4 mt-2 mt-md-0">
        <div class="card-body">
          <h5 class="card-title">Testimonials</h5>
          <p class="card-text">
            {{ sprintf('%s', number_format($count['testimonials'])) }}
          </p>
        </div>
      </div>
      
  </div>

  <div class="row mt-0 mt-md-2">
        
      <div class="card col-md-4 mt-2 mt-md-0">
        <div class="card-body">
          <h5 class="card-title">Partners</h5>
          <p class="card-text">
            {{ sprintf('%s', number_format($count['partners'])) }}
        </p>
      </div>
    </div>
      
  </div>

</div>

@endsection