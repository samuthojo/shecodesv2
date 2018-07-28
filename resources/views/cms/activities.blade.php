@extends('cms.layouts.cms')

@section('more')
<script type="text/javascript">
  //Save a dummy activity in the window
  window.item = null
  //Save dummy activity fields in the window
  window.fields = null
  //Save the baseUrl in the window
  window.baseUrl = '/api/activities'
</script>
@endsection

@section('content')

@include('cms.modals.confirmation-modal')  
  
<div class="container" id="container">
  
  <div class="row">
    
    <div class="col-12">
      
      <a role="button" 
        class="btn btn-pill btn-success mb-3 float-right"
        href="{{ route('activities.create') }}">
        <span class="btn-text">
          Create Activity</span>
      </a>
      
      <div class="table-responsive">
        
        <table class="table table-hover position-relative" id="she-table">
          
          @include('cms.loaders.loader')
          
          <thead>
            <tr>
              <th class="d-none"></th>
              <th>Activity</th>
              <th>Program</th>
              <th>Location</th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          
          <tbody>
            
            @foreach($activities as $activity)
              <tr @click="onConfirm({{$activity->id}}, $event)">
                <td class="d-none">{{ $activity->id }}</td>
                <td>{{ $activity->name }}</td>
                <td>{{ $activity->program->name }}</td>
                <td>{{ $activity->location }}</td>
                <td>{{ activity_date($activity->date) }}</td>
                <td>
                  <div class="btn-group">
                    <a role="button" class="btn btn-pill btn-warning" 
                      title="view and edit details" 
                      data-toggle="tooltip" 
                      href="{{ route('activities.edit', ['activity' => $activity->id]) }}">
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