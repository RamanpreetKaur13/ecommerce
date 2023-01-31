@extends('admin.layout.layout')
@section('content')
   
<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Sections</h4>
            <p class="card-description">
              Add class <code>.table-bordered</code>
            </p>
            <div class="table-responsive pt-3">
              <table class="table table-bordered table-hover">
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
                    <td><span style="font-size: 20px"  class="pl-3"><a href=""> <i class="mdi mdi-pencil text-primary" ></i></a></span>
                        <span style="font-size: 20px"  class="pl-3"><a href=""> <i class="mdi mdi-delete text-danger" ></i></a></span>
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