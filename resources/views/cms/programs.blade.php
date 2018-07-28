@extends('cms.layouts.cms')

@section('more')
<script type="text/javascript">
  //Save a dummy program in the window
  window.item = null
  //Save dummy program fields in the window
  window.fields = null
  //Save the baseUrl in the window
  window.baseUrl = '/api/programs'
</script>
@endsection

@section('content')

@include('cms.modals.confirmation-modal')  
  
<div class="container" id="container">
  
  <div class="row">
    
    <div class="col-12">
      
      <a role="button" 
        class="btn btn-pill btn-success mb-3 float-right"
        href="{{ route('programs.create') }}">
        <span class="btn-text">
          Create Program</span>
      </a>
      
      <div class="table-responsive">
        
        <table class="table table-hover position-relative" id="she-table">
          
          @include('cms.loaders.loader')
          
          <thead>
            <tr>
              <th class="d-none"></th>
              <th>Program</th>
              <th>Actions</th>
            </tr>
          </thead>
          
          <tbody>
            
            @foreach($programs as $program)
              <tr @click="onConfirm({{$program->id}}, $event)">
                <td class="d-none">{{ $program->id }}</td>
                <td>{{ $program->name }}</td>
                <td>
                  <div class="btn-group">
                    <a role="button" class="btn btn-pill btn-warning" 
                      title="view and edit details" 
                      data-toggle="tooltip" 
                      href="{{ route('programs.edit', ['program' => $program->id]) }}">
                      <i class="fa fa-eye"></i>
                    </a>
                    <button type="button" class="btn btn-pill btn-danger" 
                      title="delete" data-toggle="tooltip" value="delete">
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
    
  </div>
  
</div>
  
@endsection