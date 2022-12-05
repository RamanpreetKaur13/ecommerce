@extends('admin.layout.layout')
@section('content')
   
    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card m-auto">
          <div class="card">
            @if (Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ Session::get('success_message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
      
            @if (Session::has('error_message'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ Session::get('error_message') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            <div class="card-body">
              <h4 class="card-title">Update Details</h4>
              <p class="card-description">
               Update admin details
              </p>
              <form action="{{ route('admin/update-admin-details') }}" name="updateAdminDetails"  id="updateAdminDetails" method="post" class="forms-sample" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="adminType">Admin Type</label>
                  <input class="form-control" id="adminType" name="adminType" value="{{ Auth::guard('admin')->user()->type }}" readonly>
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ Auth::guard('admin')->user()->email }}" readonly>
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="name" class="form-control" id="name" name="name" placeholder="Name" value="{{ Auth::guard('admin')->user()->name }}">
                  <span id="check_name"></span>
                  @error('name')<span class="text-danger">{{ $message }}</span> @enderror
                 
                </div>

                <div class="form-group">
                  <label for="mobile">Mobile</label>
                  <input type="mobile" class="form-control" id="mobile" name="mobile" placeholder="mobile" value="{{ Auth::guard('admin')->user()->mobile }}">
                  @error('mobile')<span class="text-danger">{{ $message }}</span> @enderror
                 
                </div>
                {{-- <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Retype Password">
                </div> --}}
                {{-- <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Remember me
                  </label>
                </div> --}}
                <div class="form-group">
                  <label for="admin_image">Image</label>
                  <input type="file" class="form-control" id="admin_image" name="admin_image">
                  @error('admin_image')<span class="text-danger">{{ $message }}</span> @enderror
                
                 @if (!empty(Auth::guard('admin')->user()->image))
                 <a target="_blank" href="{{ url('Admin/images/admin_images/'.Auth::guard('admin')->user()->image) }}">View Image</a>
                 @endif
                 <input type="hidden" name="current_admin_image" value="{{ Auth::guard('admin')->user()->image }}">
                </div>
                <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="reset">Cancel</button>
              </form>
            </div>
          </div>
        </div>
       
      </div>
    </div>
    <!-- content-wrapper ends -->
  

@endsection