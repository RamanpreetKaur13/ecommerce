@extends('admin.layout.layout')
@section('content')

<div class="content-wrapper">
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card m-auto">
      <div class="card">
      {{-- personal --}}
        <div class="card-body">
          <div class="d-flex justify-content-between">
           
          <h4 class="card-title">View Vendor Details</h4>
         
         <a href="{{ url('admin/admins') }}"> <button class="btn btn-primary">Back</button></a>
        </div>
          <p class="card-description">
            View Personal Details
          </p>
         
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="vendor_name">Name</label>
                <input class="form-control" value="{{ $vendorDetails['vendor_personal']['name'] }}"  readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="vendor_email">Email address</label>
                <input type="email" class="form-control" id="vendor_email" name="vendor_email"
                  value="{{ $vendorDetails['vendor_personal']['email'] }}" placeholder="Email address" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="vendor_mobile">Mobile</label>
                <input type="text" class="form-control" id="vendor_mobile" name="vendor_mobile" placeholder="Mobile"
                  value="{{ $vendorDetails['vendor_personal']['mobile'] }}" readonly>
                
              </div>
              <div class="form-group col-md-6">
                <label for="vendor_pincode">Pincode</label>
                <input type="vendor_pincode" class="form-control" id="vendor_pincode" name="vendor_pincode"
                  placeholder="Pincode" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" readonly>
               
              </div>
            </div>

            <div class="form-group">
              <label for="vendor_address">Address</label>
              <textarea class="form-control" id="vendor_address" name="vendor_address" placeholder="Address" value=""
                cols="30" rows="5" readonly>{{ $vendorDetails['vendor_personal']['address'] }}</textarea>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="vendor_city">City</label>
                <input type="vendor_city" class="form-control" id="vendor_city" name="vendor_city" placeholder="City"
                  value="{{ $vendorDetails['vendor_personal']['city'] }}" readonly>
               
              </div>
              <div class="form-group col-md-4">
                <label for="vendor_state">State</label>
                <input type="vendor_state" class="form-control" id="vendor_state" name="vendor_state"
                  placeholder="State" value="{{ $vendorDetails['vendor_personal']['state'] }}" readonly>
               
              </div>
              <div class="form-group col-md-4">
                <label for="vendor_country">Country</label>
                <input type="vendor_country" class="form-control" id="vendor_country" name="vendor_country"
                  placeholder="Country" value="{{ $vendorDetails['vendor_personal']['country'] }}" readonly>
               
              </div>
            </div>


            <div class="form-group">
              <label for="vendor_status">Status</label>
              <input type="vendor_status" class="form-control" id="vendor_status" name="vendor_status"
                placeholder="Status" value="{{ $vendorDetails['vendor_personal']['status'] }}" readonly>
              
            </div>
            <div class="form-group">
              <label for="vendor_image">Image</label><br>
              @if (!empty($vendorDetails['image']))
              
              <img src="{{ url('Admin/images/admin_images/'.$vendorDetails['image']) }}" height="200px" width="300px" alt="" srcset="">
             
              @endif
            </div>
        </div>
        <br>

       {{-- bussiness details --}}
        <div class="card-body">
          <hr>
          <br>
          <h4 class="card-title">View Vendor Details</h4>
          <p class="card-description"> View Business Details</p>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="shop_name" class="font-weight-bold text-dark">Shop Name</label>
                <input class="form-control"  value="{{ $vendorDetails['vendor_business']['shop_name'] }}" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="shop_email" class="font-weight-bold text-dark">Shop Email</label>
                <input type="email" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_email'] }}" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="shop_mobile" class="font-weight-bold text-dark">Shop Mobile</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="shop_website" class="font-weight-bold text-dark">Shop Website</label>
                <input type="shop_website" class="form-control"  value="{{ $vendorDetails['vendor_business']['shop_website'] }}" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="shop_address" class="font-weight-bold text-dark">Shop Address</label>
                <textarea class="form-control" cols="30" rows="5" readonly>{{ $vendorDetails['vendor_business']['shop_address'] }}</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="shop_pincode" class="font-weight-bold text-dark">Shop Pincode</label>
                <input type="shop_pincode" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="shop_city" class="font-weight-bold text-dark">Shop City</label>
                <input type="shop_city" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_city'] }}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="shop_state" class="font-weight-bold text-dark">Shop State</label>
                <input type="shop_state" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_state'] }}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="shop_country" class="font-weight-bold text-dark">Country</label>
                <input type="shop_country" class="form-control" value="{{ $vendorDetails['vendor_business']['shop_country'] }}" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="business_licence_number" class="font-weight-bold text-dark">Business Licence Number</label>
                <input type="business_licence_number" class="form-control" value="{{ $vendorDetails['vendor_business']['business_licence_number'] }}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="gst_number" class="font-weight-bold text-dark">GST Number</label>
                <input type="gst_number" class="form-control" value="{{ $vendorDetails['vendor_business']['gst_number'] }}" readonly>
              </div>
              <div class="form-group col-md-4">
                <label for="pan_number" class="font-weight-bold text-dark">PAN Number</label>
                <input type="pan_number" class="form-control" value="{{ $vendorDetails['vendor_business']['pan_number'] }}" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="address_proof" class="font-weight-bold text-dark">Address Proof</label>
                <select class="form-control" readonly>
                  <option value="passport" @if($vendorDetails['vendor_business']['address_proof'] =='passport' ) selected @endif readonly>
                    Passport</option>
                  <option value="voting_card" @if($vendorDetails['vendor_business']['address_proof'] =='voting_card' ) selected
                    @endif>Voting Card</option readonly>
                  <option value="aadhar_card" @if($vendorDetails['vendor_business']['address_proof'] =='aadhar_card' ) selected
                    @endif>Aadhar Card</option readonly>
                  <option value="pan" @if($vendorDetails['vendor_business']['address_proof'] =='pan' ) selected @endif>PAN</option readonly>
                  <option value="driving_license" @if($vendorDetails['vendor_business']['address_proof'] =='driving_license' )
                    selected @endif readonly>Driving License</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="address_proof_image" class="font-weight-bold text-dark">Address Proof Image</label>
                @if (!empty( $vendorDetails['vendor_business']['address_proof_image']))
                <div class="border">
                  
                  <img src="{{ url('Admin/images/proofs/'.$vendorDetails['vendor_business']['address_proof_image']) }}" height="200px" width="200px">
                </div>
                  @endif
              </div>
            </div>
        </div>
      
        {{-- bank details --}}
        <div class="card-body">
          <hr>
          <br>
          <h4 class="card-title">View Vendor Details</h4>
          <p class="card-description"> View Bank Details  </p>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="account_holder_name">Account holder's name</label>
                <input  type="text" class="form-control"  value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="bank_name">Bank Name</label>
                <input type="text" class="form-control"  value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" readonly>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="account_number">Account number</label>
                <input type="text" class="form-control" value="{{ $vendorDetails['vendor_bank']['account_number'] }}" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="bank_ifsc_code">Bank IFSC code</label>
                <input type="text" class="form-control"  value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}" readonly>
              </div>
            </div>
        </div>
      </div>
    </div>

  </div>

</div>
<!-- content-wrapper ends -->


@endsection