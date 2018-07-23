@extends('cms.layouts.cms')

@section('more')
  <style>
    #error-alert {
      display: inline-block;
    }
  </style>
@endsection

@section('content')

<div class="card">
  <h4 class="card-header">Change Password: </h4>
  <div class="card-body">
    
    @if(request()->session()->has('message'))
      <div id="alert-success" class="alert alert-success alert-dismissible fade show"
        role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        {{ request()->session()->pull('message') }}
      </div>
    @endif

    @if ($errors->any())
      <div class="alert alert-danger" style="display: inline-block;">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <form name="reset_password_form" id="reset_password_form"
      method="post" action="{{route('password.request')}}">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="current_password">Current Password:</option>
        <input type="password" id="current_password"
          name="current_password" class="form-control"
          placeholder="current password"
          value="{{ old('current_password') }}" autofocus>
      </div>

      <div class="form-group">
        <label for="new_password">New Password:</option>
        <input type="password" id="new_password" name="password"
          class="form-control" placeholder="new password">
      </div>

      <div class="form-group">
        <label for="password_confirmation">Confirm Password:</option>
        <input type="password" id="password_confirmation" name="password_confirmation"
          class="form-control" placeholder="confirm password">
      </div>

      <div class="form-group">
        <button class="btn btn-success" type="submit">
          Submit
        </button>
        @include('cms.inline_loader')
      </div>

    </form>

  </div>
</div>
<script>
  $(function() {
    $(":password").keydown(function() {
      $(".alert-danger").fadeOut(0);
    });
  });
</script>
@endsection
