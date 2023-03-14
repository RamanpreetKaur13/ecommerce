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
              
              </p>
              <form @if(empty($section->id)) action="{{ url('admin/add-edit-section') }}"  @else action="{{ url('admin/add-edit-section/'.$section->id) }}"  @endif name="add_edit_section"  id="add_edit_section" method="post" class="forms-sample" enctype="multipart/form-data">
                {{ csrf_field() }}
               
                <div class="form-group">
                  <label for="name">Section Name</label>
                  <input type="text" class="form-control" id="name" name="name" @if(empty($section->id)) value="{{ old('name') }}" @else  value="{{ $section->name }}" @endif >
                  @error('name')<span class="text-danger">{{ $message }}</span> @enderror
                </div>
                {{-- <div class="form-group">
                  <label for="status">Status</label>
                  <input type="name" class="form-control" id="status" name="status" placeholder="Active or Inactive" @if(empty($section->id)) value="{{ old('status') }}" @else  value="{{ ($section->status  == 1 ) ? 'Active' : 'Inactive'}}" @endif>
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
  

@endsection