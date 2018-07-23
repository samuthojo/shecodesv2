@extends('cms.layouts.cms')

@section('content')

<div class="container" id="container">
  
  <div class="table-responsive">
    
    <table class="table table-hover" id="she-table">
      
      <thead>
        <tr>
          <th>Course</th>
          <th>Program</th>
          <th>Actions</th>
        </tr>
      </thead>
      
      <tbody>
        @foreach($courses as $course)
        <tr>
          <td>{{ $course->name }}</td>
          <td>{{ $course->program->name }}</td>
          <td>
            <div class="btn-group">
              <button type="button" class="btn btn-dark" 
                data-toggle="tooltip" title="view details">
                <i class="fa fa-eye"></i>
              </button>
              <button type="button" class="btn btn-warning" 
                data-toggle="tooltip" title="edit details">
                <i class="fa fa-pencil"></i>
              </button>
              <button type="button" class="btn btn-danger" 
                data-toggle="tooltip" title="delete">
                <i class="fa fa-trash"></i>
              </button>
            </div>
          </td>
        </tr>
        @endforeach
      </tbody>
      
    </table>
    
  </div>
  
</div>

@endsection