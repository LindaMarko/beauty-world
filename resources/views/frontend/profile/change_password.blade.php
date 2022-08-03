@extends('frontend.main_master')
@section('content')
@php
  $user = DB::table('users')->where('id', Auth::user()->id)->first();
@endphp

<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2"><br><br>
                <img class="card-img-top" src="{{(!empty($user->profile_photo_path))
                ? url('upload/user_images/'.$user->profile_photo_path)
                : url('upload/no_image.jpg')}}" style="border-radius: 50%" height="100%" width="100%"><br><br>
                <ul class="list-group list-group-flush">
                    <a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul>
            </div><!--end col md2-->

            <div class="col-md-2">

            </div><!--end col md2-->

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center">
                      <strong>Change Password</strong></h3><br><br>
                    <div class="card-body">
                      <form method="POST" action="{{route('user.password.update')}}">
                        @csrf

                        <div class="form-group">
                          <h5>Current Password <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="password" id="current_password" name="oldpassword" class="form-control" required >
                          </div>
                        </div>

                        <div class="form-group">
                          <h5>New Password <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="password" id="password" name="password" class="form-control" required >
                          </div>
                        </div>

                        <div class="form-group">
                          <h5>Confirm New Password <span class="text-danger">*</span></h5>
                          <div class="controls">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required >
                          </div>
                        </div>
                      </div><br><br>
                      <div class="form-group">
                        <button type="submit" class="btn btn-danger">Update</button>
                      </div><br><br>
                      </form>
                    </div>
                </div>
            </div><!--end col md8-->

        </div><!--end row-->
    </div>
</div>

@endsection