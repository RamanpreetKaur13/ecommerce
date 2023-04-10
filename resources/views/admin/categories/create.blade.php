@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card m-auto">
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
          <h4 class="card-title">{{ $title }}</h4>
          {{-- <p class="card-description">
            Update Personal Details
          </p> --}}
          <form @if (empty($category->id))action="{{ url('admin/category/create') }}"
          @else
          action="{{ url('admin/category/create/'.$category->id) }}"
          @endif  name="categoryForm" id="categoryForm"
            method="post" class="forms-sample" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="section">Section</label>
                      <select class="form-control" name="section" id="section">
                        @foreach ($sections as $section)
                            <option  value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                      </select>
                    @error('section')<span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="form-group col-md-6">
                  <label for="parent_id">Select Category Level</label>
                    <select class="form-control" name="parent_id" id="parent_id">
                          <option  value="0">Main Category</option>
                    </select>
                  @error('parent_id')<span class="text-danger">{{ $message }}</span> @enderror
              </div>

              
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="category_name">Name</label>
                <input class="form-control" id="category_name" name="category_name" placeholder="Name" type="text"
                @if (empty($category->category_name)) value="{{ old('category_name') }}" @else value="{{ $category->category_name }}" @endif>
              </div>

              <div class="form-group col-md-6">
                <label for="url">URL</label>
                <input type="text" class="form-control" id="url" name="url" placeholder="URL"
                @if (empty($category->url)) value="{{ old('url') }}" @else value="{{ $category->url }}" @endif>
                @error('url')<span class="text-danger">{{ $message }}</span> @enderror
              </div>
              
            </div>

            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="category_discount">Category Discount</label>
                <input type="number" class="form-control" id="category_discount" name="category_discount"
                  placeholder="Category Discount"
                  @if (empty($category->category_discount)) value="{{ old('category_discount') }}" @else value="{{ $category->category_discount }}" @endif>
                @error('category_discount')<span class="text-danger">{{ $message }}</span> @enderror

              </div>

              <div class="form-group col-md-6">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Category Discription" 
                  cols="30" rows="5">@if (empty($category->description)) {{ old('description') }} @else {{ $category->description }} @endif
                </textarea>
                @error('description')<span class="text-danger">{{ $message }}</span> @enderror
              </div>

              

              
            </div>
            <div class="form-group">
              <label for="category_image">Category Image</label>
              <input type="file" class="form-control" id="category_image" name="category_image" placeholder="Mobile"
              >
              @error('category_image')<span class="text-danger">{{ $message }}</span> @enderror
<br>
               @if (!empty($category->category_image))
             <img src="{{ asset('Admin/images/category/'.$category->category_image) }}" alt="" height="120px" width="200px">
              @endif
              <input type="hidden" name="current_vendor_image">
              
            </div>
            
            <br>
            <hr>
            <h4>Meta Content</h4>
            <br>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="meta_title">Meta Title</label>
                <input type="meta_title" class="form-control" id="meta_title" name="meta_title"
                  placeholder="State"
                  @if (empty($category->meta_title)) value="{{ old('meta_title') }}" @else value="{{ $category->meta_title }}" @endif>
                @error('meta_title')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-6">
                <label for="meta_keyword">Meta Keyword</label>
                <input type="meta_keyword" class="form-control" id="meta_keyword" name="meta_keyword"
                  placeholder="State" 
                  @if (empty($category->meta_keyword)) value="{{ old('meta_keyword') }}" @else value="{{ $category->meta_keyword }}" @endif>
                @error('meta_keyword')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="meta_description">Meta Description</label>
                <textarea class="form-control" id="meta_description" name="meta_description" placeholder="Category Discription" value=""
                  cols="30" rows="5">@if (empty($category->meta_description)) {{ old('meta_description') }} @else {{ $category->meta_description }} @endif</textarea>
                @error('meta_description')<span class="text-danger">{{ $message }}</span> @enderror
              </div>

              {{-- <div class="form-group col-md-4">
                <label for="vendor_country">Country</label>
                  <select class="form-control" name="vendor_country" id="vendor_country">
                    @foreach ($countries as $country)
                        <option value="{{ $country['country_name'] }}" @if ($country['country_name'] == $vendorDetails['country']) selected @endif>{{ $country['country_name'] }}</option>
                    @endforeach
                  </select>
                @error('vendor_country')<span class="text-danger">{{ $message }}</span> @enderror
              </div> --}}

            <div class="form-group col-md-6">
              <label for="status">Status</label>
                      <select class="form-control" name="status" id="status">
                            <option  value="0"{{ $category->status == 0 ? 'selected' : '' }}>Active</option>
                            <option  value="1"{{ $category->status == 1 ? 'selected' : '' }}>Inactive</option>
                      </select>
                      @error('status')<span class="text-danger">{{ $message }}</span> @enderror
            </div>
            </div>

            {{-- <div class="form-group">
              <label for="confirm_password">Confirm Password</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                placeholder="Retype Password">
            </div> --}}
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


@endsection