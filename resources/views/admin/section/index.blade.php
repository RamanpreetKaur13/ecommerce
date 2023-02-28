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
            <h4 class="card-title">Sections</h4>
            <a href="{{ url('admin/add-edit-section') }}"><button class="btn btn-primary">Add Section</button></a>
          </div>
          <p class="card-description">
            Add class <code>.table-bordered</code>
          </p>
            <div class="table-responsive pt-3">
              <table class="table table-bordered table-hover" id="sections_table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                   
                  @foreach ($sections as $section)
                  <tr>
                    <td>{{ $section['id'] }}</td>
                    <td>{{ $section['name'] }}</td>
                    <td>@if ($section['status'] == 1)
                      <span style="font-size: 30px" class="pl-3">
                        <a href="javascript:void(0);" id="section-{{ $section['id'] }}" section_id = {{ $section['id'] }}  class="updateSectionStatus">
                          <i class="mdi mdi-toggle-switch text-success" status="Active"></i>
                        </a>
                      </span>
                    @else
                    <span style="font-size: 30px"  class="pl-3">
                      <a href="javascript:void(0);" id="section-{{ $section['id'] }}" section_id = {{ $section['id'] }} class="updateSectionStatus">
                        <i class="mdi mdi-toggle-switch-off text-danger"  status="Inactive" ></i>
                      </a>
                    </span>
                    @endif
                    <td><span style="font-size: 20px"  class="pl-3"><a href="{{ url('admin/add-edit-section/'.$section['id'])  }}"> <i class="mdi mdi-pencil text-primary" ></i></a></span>
                        {{-- <span style="font-size: 20px"  class="pl-3"><a title="Section" class="ConfirmDelete" href="{{ url('admin/delete-section/'.$section['id'] ) }}"> <i class="mdi mdi-delete text-danger" ></i></a></span> --}}
                        <span style="font-size: 20px"  class="pl-3"><a module="section" module_id="{{ $section['id'] }}" class="ConfirmDelete" href="javascript:void(0);"> <i class="mdi mdi-delete text-danger" ></i></a></span>
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