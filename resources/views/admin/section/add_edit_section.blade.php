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
              <h4 class="card-title">@if(empty($section->id)){{ $title }}@else {{ $title }} @endif</h4>
              <p class="card-description">
               Update admin details
              </p>
              <form action="" name="updateAdminDetails"  id="updateAdminDetails" method="post" class="forms-sample" enctype="multipart/form-data">
                {{ csrf_field() }}
               
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