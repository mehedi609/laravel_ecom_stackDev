@extends('layouts.admin_layout.admin_layout')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 mt-2 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Change Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.update_current_password') }}"  method="post" name="update_password_form" id="update_password_form">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" readonly value="{{ Auth::guard('admin')->user()->email }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Type</label>
                    <input type="email" class="form-control" readonly value="{{ Auth::guard('admin')->user()->type }}">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter Current Password">
                    <span class="invalid-feedback" role="alert" id="current_password_error"></span>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">New Password</label>
                    <input type="password" class="form-control" id="new_password" name="password" placeholder="Enter New Password">
                  </div>
                  @error('password')
                    {!! Toastr::warning('', $errors->first('password')) !!}
                  @enderror


                  <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Enter Confirm Password">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" id="change_password_submit">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection

