@extends('admin.layout.layout')
@section('content')
   
<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          @if (Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ Session::get('success_message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
          <div class="card-body">
            <div class="d-flex justify-content-between">
            <h4 class="card-title">Categories</h4>
            <a href="{{ url('admin/category/create') }}"><button class="btn btn-primary">Add Category</button></a>
          </div>
          <p class="card-description">
            Add class <code>.table-bordered</code>
          </p>
            <div class="table-responsive pt-3">
              <table class="table table-bordered table-hover" id="category_table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Parent Category</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                   
                  @foreach ($categories as $category)
                  @if (isset($category['parentCategory']['category_name'])&& !empty($category['parentCategory']['category_name']))
                    <?php   $parentCategory = $category['parentCategory']['category_name']; ?>
                  @else
                      <?php $parentCategory = "Root" ?>
                  @endif
                  <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['category_name'] }}</td>
                    <td>{{ $parentCategory}}</td>
                    <td>{{ $category['section']['name'] }}</td>
                    <td>@if ($category['status'] == 1)
                      <span style="font-size: 30px" class="pl-3">
                        <a href="javascript:void(0);" id="category-{{ $category['id'] }}" category_id = {{ $category['id'] }}  class="updateCategoryStatus">
                          <i class="mdi mdi-toggle-switch text-success" status="Active"></i>
                        </a>
                      </span>
                    @else
                    <span style="font-size: 30px"  class="pl-3">
                      <a href="javascript:void(0);" id="category-{{ $category['id'] }}" category_id = {{ $category['id'] }} class="updateCategoryStatus">
                        <i class="mdi mdi-toggle-switch-off text-danger"  status="Inactive" ></i>
                      </a>
                    </span>
                    @endif
                    <td><span style="font-size: 20px"  class="pl-3"><a href="{{ url('admin/category/create/'.$category['id'])  }}"> <i class="mdi mdi-pencil text-primary" ></i></a></span>
                        {{-- <span style="font-size: 20px"  class="pl-3"><a title="category" class="ConfirmDelete" href="{{ url('admin/delete-category/'.$category['id'] ) }}"> <i class="mdi mdi-delete text-danger" ></i></a></span> --}}
                        <span style="font-size: 20px"  class="pl-3"><a module="category" module_id="{{ $category['id'] }}" class="ConfirmDelete" href="javascript:void(0);"> <i class="mdi mdi-delete text-danger" ></i></a></span>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
    <!-- content-wrapper ends -->
  

@endsection