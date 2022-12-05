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
              <h4 class="card-title">Update Password</h4>
              <p class="card-description">
               Update admin password
              </p>
              <form action="{{ route('admin/update-admin-password') }}" name="updateAdminPassword"  id="updateAdminPassword" method="post" class="forms-sample">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="adminType">Admin Type</label>
                  <input class="form-control" id="adminType" name="adminType" value="{{ $admin_password['type'] }}" readonly>
                </div>
                <div class="form-group">
                  <label for="email">Email address</label>
                  <input type="email" class="form-control" id="email" name="email" value="{{ $admin_password['email'] }}" readonly>
                </div>
                <div class="form-group">
                  <label for="current_password">Current Password</label>
                  <input type="current_password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
                  <span id="check_current_password"></span>
                </div>

                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <label for="confirm_password">Confirm Password</label>
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Retype Password">
                </div>
                {{-- <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Remember me
                  </label>
                </div> --}}
                <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light" type="reset">Cancel</button>
              </form>
            </div>
          </div>
        </div>
       
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
   
    <!-- partial -->

@endsection