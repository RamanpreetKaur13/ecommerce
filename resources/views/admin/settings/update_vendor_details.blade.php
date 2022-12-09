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

        @if ($slug == 'personal')
        <div class="card-body">
          <h4 class="card-title">Update Vendor Details</h4>
          <p class="card-description">
            Update Personal Details
          </p>
          <form action="{{ url('admin/update-details/personal') }}" name="updateVendorDetails" id="updateVendorDetails"
            method="post" class="forms-sample" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="vendor_name">Name</label>
                <input class="form-control" id="vendor_name" name="vendor_name" placeholder="Name"
                  value="{{ $vendorDetails['name'] }}">
              </div>
              <div class="form-group col-md-6">
                <label for="vendor_email">Email address</label>
                <input type="email" class="form-control" id="vendor_email" name="vendor_email"
                  value="{{ $vendorDetails['email'] }}" placeholder="Email address">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="vendor_mobile">Mobile</label>
                <input type="text" class="form-control" id="vendor_mobile" name="vendor_mobile" placeholder="Mobile"
                  value="{{ $vendorDetails['mobile'] }}">
                @error('vendor_mobile')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-6">
                <label for="vendor_pincode">Pincode</label>
                <input type="vendor_pincode" class="form-control" id="vendor_pincode" name="vendor_pincode"
                  placeholder="Pincode" value="{{ $vendorDetails['pincode'] }}">
                @error('vendor_pincode')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
            </div>

            <div class="form-group">
              <label for="vendor_address">Address</label>
              <textarea class="form-control" id="vendor_address" name="vendor_address" placeholder="Address" value=""
                cols="30" rows="5">{{ $vendorDetails['address'] }}</textarea>

              @error('vendor_address')<span class="text-danger">{{ $message }}</span> @enderror

            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="vendor_city">City</label>
                <input type="vendor_city" class="form-control" id="vendor_city" name="vendor_city" placeholder="City"
                  value="{{ $vendorDetails['city'] }}">
                @error('vendor_city')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-4">
                <label for="vendor_state">State</label>
                <input type="vendor_state" class="form-control" id="vendor_state" name="vendor_state"
                  placeholder="State" value="{{ $vendorDetails['state'] }}">
                @error('vendor_state')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-4">
                <label for="vendor_country">Country</label>
                <input type="vendor_country" class="form-control" id="vendor_country" name="vendor_country"
                  placeholder="Country" value="{{ $vendorDetails['country'] }}">
                @error('vendor_country')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
            </div>


            <div class="form-group">
              <label for="vendor_status">Status</label>
              <input type="vendor_status" class="form-control" id="vendor_status" name="vendor_status"
                placeholder="Status" value="{{ $vendorDetails['status'] }}">
              @error('vendor_status')<span class="text-danger">{{ $message }}</span> @enderror

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
            <div class="form-group">
              <label for="vendor_image">Image</label>
              <input type="file" class="form-control" id="vendor_image" name="vendor_image">
              @error('vendor_image')<span class="text-danger">{{ $message }}</span> @enderror

              @if (!empty(Auth::guard('admin')->user()->image))
              <a target="_blank"
                href="{{ url('Admin/images/vendor_images/'.Auth::guard('admin')->user()->image) }}">View Image</a>
              @endif
              <input type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}">
            </div>
            <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light" type="reset">Cancel</button>
          </form>
        </div>

        @elseif ($slug == 'business')
        <div class="card-body">
          <h4 class="card-title">Update Vendor Details</h4>
          <p class="card-description">
            Update Business Details
          </p>
          <form action="{{ url('admin/update-details/business') }}" name="updateVendorBusinessDetails"
            id="updateVendorBusinessDetails" method="post" class="forms-sample" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="shop_name" class="font-weight-bold text-dark">Shop Name</label>
                <input class="form-control" id="shop_name" name="shop_name" placeholder="Shop Name"
                  value="{{ $vendorDetails['shop_name'] }}">
              </div>
              <div class="form-group col-md-6">
                <label for="shop_email" class="font-weight-bold text-dark">Shop Email</label>
                <input type="email" class="form-control" id="shop_email" name="shop_email"
                  value="{{ $vendorDetails['shop_email'] }}" placeholder="Email address">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="shop_mobile" class="font-weight-bold text-dark">Shop Mobile</label>
                <input type="text" class="form-control" id="shop_mobile" name="shop_mobile" placeholder="Shop Mobile"
                  value="{{ $vendorDetails['shop_mobile'] }}">
                @error('shop_mobile')<span class="text-danger">{{ $message }}</span> @enderror

              </div>

              <div class="form-group col-md-6">
                <label for="shop_website" class="font-weight-bold text-dark">Shop Website</label>
                <input type="shop_website" class="form-control" id="shop_website" name="shop_website"
                  placeholder="Shop Website" value="{{ $vendorDetails['shop_website'] }}">
                @error('shop_website')<span class="text-danger">{{ $message }}</span> @enderror

              </div>

            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="shop_address" class="font-weight-bold text-dark">Shop Address</label>
                <textarea class="form-control" id="shop_address" name="shop_address" placeholder="Shop Address" value=""
                  cols="30" rows="5">{{ $vendorDetails['shop_address'] }}</textarea>
                @error('shop_address')<span class="text-danger">{{ $message }}</span> @enderror

              </div>

              <div class="form-group col-md-6">
                <label for="shop_pincode" class="font-weight-bold text-dark">Shop Pincode</label>
                <input type="shop_pincode" class="form-control" id="shop_pincode" name="shop_pincode"
                  placeholder="Shop Pincode" value="{{ $vendorDetails['shop_pincode'] }}">
                @error('shop_pincode')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="shop_city" class="font-weight-bold text-dark">Shop City</label>
                <input type="shop_city" class="form-control" id="shop_city" name="shop_city" placeholder="Shop City"
                  value="{{ $vendorDetails['shop_city'] }}">
                @error('shop_city')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-4">
                <label for="shop_state" class="font-weight-bold text-dark">Shop State</label>
                <input type="shop_state" class="form-control" id="shop_state" name="shop_state" placeholder="Shop State"
                  value="{{ $vendorDetails['shop_state'] }}">
                @error('shop_state')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-4">
                <label for="shop_country" class="font-weight-bold text-dark">Country</label>
                <input type="shop_country" class="form-control" id="shop_country" name="shop_country"
                  placeholder="Shop Country" value="{{ $vendorDetails['shop_country'] }}">
                @error('shop_country')<span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            {{-- <div class="form-group">
              <label for="shop_website">Shop Website</label>
              <input type="shop_website" class="form-control" id="shop_website" name="shop_website"
                placeholder="Shop Website" value="{{ $vendorDetails['shop_website'] }}">
              @error('shop_website')<span class="text-danger">{{ $message }}</span> @enderror

            </div> --}}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="address_proof" class="font-weight-bold text-dark">Address Proof</label>
                <select class="form-control" name="address_proof" id="address_proof">
                  <option value="passport" @if($vendorDetails['address_proof']=='passport' ) selected @endif>
                    Passport</option>
                  <option value="voting_card" @if($vendorDetails['address_proof']=='voting_card' ) selected
                    @endif>Voting Card</option>
                  <option value="aadhar_card" @if($vendorDetails['address_proof']=='aadhar_card' ) selected
                    @endif>Aadhar Card</option>
                  <option value="pan" @if($vendorDetails['address_proof']=='pan' ) selected @endif>PAN</option>
                  <option value="driving_license" @if($vendorDetails['address_proof']=='driving_license' )
                    selected @endif>Driving License</option>

                </select>
                {{-- <input type="address_proof" class="form-control" id="address_proof" name="address_proof"
                  placeholder="Address Proof" value="{{ $vendorDetails['address_proof'] }}"> --}}
                @error('address_proof')<span class="text-danger">{{ $message }}</span> @enderror

              </div>

              <div class="form-group col-md-6">
                <label for="address_proof_image" class="font-weight-bold text-dark">Address Proof Image</label>
                <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
                @error('address_proof_image')<span class="text-danger">{{ $message }}</span> @enderror

                @if (!empty($vendorDetails['address_proof_image']))
                <a target="_blank"
                  href="{{ url('Admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">View Image</a>
                @endif
                <input type="hidden" name="current_address_proof_image"
                  value="{{ $vendorDetails['address_proof_image'] }}">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="business_licence_number" class="font-weight-bold text-dark">Business Licence Number</label>
                <input type="business_licence_number" class="form-control" id="business_licence_number"
                  name="business_licence_number" placeholder="Business Licence Number"
                  value="{{ $vendorDetails['business_licence_number'] }}">
                @error('business_licence_number')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-4">
                <label for="gst_number" class="font-weight-bold text-dark">GST Number</label>
                <input type="gst_number" class="form-control" id="gst_number" name="gst_number" placeholder="GST Number"
                  value="{{ $vendorDetails['gst_number'] }}">
                @error('gst_number')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-4">
                <label for="pan_number" class="font-weight-bold text-dark">PAN Number</label>
                <input type="pan_number" class="form-control" id="pan_number" name="pan_number" placeholder="PAN Number"
                  value="{{ $vendorDetails['pan_number'] }}">
                @error('pan_number')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
            </div>
            {{-- <div class="form-group">
              <label for="address_proof_image">Address Proof Image</label>
              <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
              @error('address_proof_image')<span class="text-danger">{{ $message }}</span> @enderror

              @if (!empty(Auth::guard('admin')->user()->image))
              <a target="_blank"
                href="{{ url('Admin/images/vendor_images/'.Auth::guard('admin')->user()->image) }}">View Image</a>
              @endif
              <input type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}">
            </div> --}}
            <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light" type="reset">Cancel</button>
          </form>
        </div>
        @elseif ($slug == 'bank')
        <div class="card-body">
          <h4 class="card-title">Update Vendor Details</h4>
          <p class="card-description">
            Update Bank Details
          </p>
          <form action="{{ url('admin/update-details/bank') }}" name="updateVendorBankDetails" id="updateVendorBankDetails"
            method="post" class="forms-sample" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="account_holder_name">Account holder's name</label>
                <input  type="text" class="form-control" id="account_holder_name" name="account_holder_name" placeholder="Account holder's name"
                  value="{{ $vendorDetails['account_holder_name'] }}">
                  @error('account_holder_name')<span class="text-danger">{{ $message }}</span> @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="bank_name">Bank Name</label>
                <input type="text" class="form-control" id="bank_name" name="bank_name"
                  value="{{ $vendorDetails['bank_name'] }}" placeholder="Bank name">
                  @error('bank_name')<span class="text-danger">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="account_number">Account number</label>
                <input type="text" class="form-control" id="account_number" name="account_number" placeholder="Account number"
                  value="{{ $vendorDetails['account_number'] }}">
                @error('account_number')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
              <div class="form-group col-md-6">
                <label for="vendor_pincode">Bank IFSC code</label>
                <input type="text" class="form-control" id="bank_ifsc_code" name="bank_ifsc_code"
                  placeholder="Bank IFSC code" value="{{ $vendorDetails['bank_ifsc_code'] }}">
                @error('bank_ifsc_code')<span class="text-danger">{{ $message }}</span> @enderror

              </div>
            </div>
           
            <button type="submit" name="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light" type="reset">Cancel</button>
          </form>
        </div>
        @endif

      </div>
    </div>

  </div>

</div>
<!-- content-wrapper ends -->


@endsection