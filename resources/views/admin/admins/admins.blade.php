@extends('admin.layout.layout')
@section('content')
   
<div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">{{ $title }}</h4>
            <p class="card-description">
              Add class <code>.table-bordered</code>
            </p>
            <div class="table-responsive pt-3">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Image</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                   
                  @foreach ($admins as $admin)
                  <tr>
                    <td>{{ $admin['id'] }}</td>
                    <td>{{ $admin['name'] }}</td>
                    <td>{{ $admin['email'] }}</td>
                    <td>{{ $admin['mobile'] }}</td>
                    <td><img src="{{ asset('Admin/images/admin_images/'.$admin['image']) }}" alt="" srcset=""></td>
                    <td>{{ $admin['type'] }}</td>
                    <td>@if ($admin['status'] == 1)
                      <span style="font-size: 30px" class="pl-3">
                        <a href="javascript:void(0);" id="admin-{{ $admin['id'] }}" admin_id = {{ $admin['id'] }}  class="updateAdminStatus text-success">
                          <i class="mdi mdi-toggle-switch" status="Active"></i>
                        </a>
                      </span>
                    @else
                    <span style="font-size: 30px"  class="pl-3">
                      <a href="javascript:void(0);" id="admin-{{ $admin['id'] }}" admin_id = {{ $admin['id'] }} class="updateAdminStatus text-danger">
                        <i class="mdi mdi-toggle-switch-off"  status="Inactive" ></i>
                      </a>
                    </span>
                    @endif
                    @if ($admin['type'] == 'vendors')
                    <td><span style="font-size: 22px"  class="pl-3 text-primary"><a href="{{ url('admin/view-vendor-details/'.$admin['id']) }}">
                    <i class="mdi mdi-eye"></i></a></span></td>
                    @else
                    <td></td>
                    @endif
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