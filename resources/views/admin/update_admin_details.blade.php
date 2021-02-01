@extends('layouts.admin_layout.admin_layout')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Update Admin Info</h1>
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
              <form role="form" action="{{ route('admin.update_admin_details') }}"  method="post">
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
                    <label for="admin_name">Name</label>
                    <input type="text" class="form-control @error('admin_name') is-invalid @enderror" id="admin_name" name="admin_name" placeholder="Enter Name" value="{{ Auth::guard('admin')->user()->name }}">

                    @error('admin_name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>



                  <div class="form-group">
                    <label for="admin_mobile">Mobile No</label>
                    <input type="text" class="form-control @error('admin_mobile') is-invalid @enderror" id="admin_mobile" name="admin_mobile" placeholder="Enter Mobile Number" value="{{ Auth::guard('admin')->user()->mobile }}">

                    @error('admin_mobile')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label for="admin_name">Image</label>
                    <div class="input-group mb-3">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                        <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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

