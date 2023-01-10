<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\helper;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Models\Vendor;
use App\Models\VendorsBusinessDetail;
use App\Models\VendorsBankDetail;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
    public function login(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->all();
            //    print_data($data);
            //    die();

            // $validated = $request->validate([
            //     'email' => 'required|unique:users,email|max:55',
            //     'password' => 'required'
            // ]);
            $rules = [
                'email' => 'required|unique:users,email|max:55',
                'password' => 'required'
            ];
            $message = [
                'email.required' => 'ਅੰਨੀ ਦੀਆ, ਭਰ ਏਹਨੁ ਵੀ !',
                'password.required' => 'ਅੰਨੀ ਦੀਆ, ਭਰ ਏਹਨੁ ਵੀ !',
            ];
            $this->validate($request, $rules, $message);
            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 1])) {
                return redirect('admin/dashboard')->with('success_message', 'login successfully');
            } else {
                return redirect()->back()->with('error_message', 'Incorrect email or password');
            }
        }

        return view('admin.login');
    }

    public function updateAdminPassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                //match confirm password and new password
                if (($data['confirm_password'] == $data['password'])) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['password'])]);
                    return redirect()->back()->with('success_message', 'Password Updated Successfully');
                } else {
                    return  redirect()->back()->with('error_message', 'Password not match with confirm password  !');
                }

                return redirect()->back()->with('success_message', 'Current Password is correct');
            } else {
                return  redirect()->back()->with('error_message', 'Current Password is incorrect !');
            }
        }

        $admin_password = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update_password')->with(compact('admin_password'));
    }

    //check current admin password 
    public function currentAdminPassword(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    //update admin details 
    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // print_data($data);
            // die();
            $validated = $request->validate(['name' => 'required|regex:/^[\pL\s\-]+$/u', 'mobile' => 'required|numeric']);

            //upload the admin image
            if ($request->hasFile('admin_image')) {
                $img_tmp = $request->file('admin_image');
                if ($img_tmp->isValid()) {
                    //get the extension
                    $img_extension = $img_tmp->getClientOriginalExtension();
                    //generate new imge name 
                    $img_name = rand('111', '9999') . '.' . $img_extension;

                    //get img path 
                    $img_path = 'Admin/images/admin_images/' . $img_name;
                    //upload the image
                    Image::make($img_tmp)->save($img_path);
                }
            } elseif (!empty($data['current_admin_image'])) {
                $img_name = $data['current_admin_image'];
            } else {
                $img_name = "";
            }
            Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['name'], 'mobile' => $data['mobile'], 'image' => $img_name]);
            return redirect()->back()->with('success_message', 'Admin details updated successfully');
        }

        return view('admin.settings.update_details');
    }


    public function updateVendorDetails(Request $request , $slug)
    {

        if ($slug == 'personal') {

            if ($request->isMethod('post')) {
                $data = $request->all();
                     // print_data($data);
              // die();
                $validated = $request->validate([
                    'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
                    'vendor_mobile' => 'required|numeric',
                    'vendor_email' => 'required|email',
                    'vendor_pincode' => 'required',
                    'vendor_address' => 'required',
                    'vendor_city' => 'required',
                    'vendor_state' => 'required',
                    'vendor_country' => 'required',
                    ]);
    
                //upload the admin image
                if ($request->hasFile('vendor_image')) {
                    $img_tmp = $request->file('vendor_image');
                    if ($img_tmp->isValid()) {
                        //get the extension
                        $img_extension = $img_tmp->getClientOriginalExtension();
                        //generate new imge name 
                        $img_name = rand('111', '9999') . '.' . $img_extension;
    
                        //get img path 
                        $img_path = 'Admin/images/admin_images/' . $img_name;
                        //upload the image
                        Image::make($img_tmp)->save($img_path);
                    }
                } elseif (!empty($data['current_vendor_image'])) {
                    $img_name = $data['current_vendor_image'];
                } else {
                    $img_name = "";
                }
                //update in admin table
                Admin::where('id', Auth::guard('admin')->user()->id)->update(['name' => $data['vendor_name'], 'mobile' => $data['vendor_mobile'], 'image' => $img_name]);
              
                //update in vendor table
                Vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                    'name' => $data['vendor_name'], 
                    'email' => $data['vendor_email'], 
                    'mobile' => $data['vendor_mobile'], 
                    'pincode' => $data['vendor_pincode'], 
                    'address' => $data['vendor_address'], 
                    'city' => $data['vendor_city'], 
                    'state' => $data['vendor_state'], 
                    'country' => $data['vendor_country'], 
                    'status' => $data['vendor_status'], 
                    'vendor_image' => $img_name
                ]);
               
                return redirect()->back()->with('success_message', 'vendor details updated successfully');
            }
         $vendorDetails = Vendor::where('id' , Auth::guard('admin')->user()->vendor_id)->first()->toArray();
        //  return view('admin.settings.update_vendor_details')->with(compact('slug' , 'vendorDetails'));

        }
        elseif ($slug == 'business') {
            if ($request->isMethod('post')) {
                $data = $request->all();
                     // print_data($data);
              // die();
                $validated = $request->validate([
                    'shop_name' => 'required',
                    'shop_mobile' => 'required|numeric',
                    'shop_email' => 'required|email',
                    'shop_pincode' => 'required',
                    'shop_address' => 'required',
                    'shop_city' => 'required',
                    'shop_state' => 'required',
                    'shop_country' => 'required',
                    ]);
    
                //upload the admin image
                if ($request->hasFile('address_proof_image')) {
                    $img_tmp = $request->file('address_proof_image');
                    if ($img_tmp->isValid()) {
                        //get the extension
                        $img_extension = $img_tmp->getClientOriginalExtension();
                        //generate new imge name 
                        $img_name = rand('111', '9999') . '.' . $img_extension;
    
                        //get img path 
                        $img_path = 'Admin/images/proofs/' . $img_name;
                        //upload the image
                        Image::make($img_tmp)->save($img_path);
                    }
                } elseif (!empty($data['current_address_proof_image'])) {
                    $img_name = $data['current_address_proof_image'];
                } else {
                    $img_name = "";
                }
               
                //update in vendor Business table
                VendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                    'shop_name' => $data['shop_name'], 
                    'shop_email' => $data['shop_email'], 
                    'shop_mobile' => $data['shop_mobile'], 
                    'shop_pincode' => $data['shop_pincode'], 
                    'shop_address' => $data['shop_address'], 
                    'shop_city' => $data['shop_city'], 
                    'shop_state' => $data['shop_state'], 
                    'shop_country' => $data['shop_country'], 
                    'shop_website' => $data['shop_website'], 
                    'address_proof' => $data['address_proof'], 
                    'business_licence_number' => $data['business_licence_number'], 
                    'gst_number' => $data['gst_number'], 
                    'pan_number' => $data['pan_number'],  
                    'address_proof_image' => $img_name
                ]);
               
                return redirect()->back()->with('success_message', 'Vendor business details updated successfully');
            }
            $vendorDetails = VendorsBusinessDetail::where('vendor_id' , Auth::guard('admin')->user()->vendor_id)->first()->toArray();
            // return view('admin.settings.update_vendor_details')->with(compact('slug' , 'vendorsBusinessDetails'));

        }
         elseif($slug == 'bank'){
            if ($request->isMethod('post')) {
                $data = $request->all();
                $validated = $request->validate([
                    'account_holder_name' => 'required',
                    'bank_name' => 'required',
                    'account_number' => 'required',
                    'bank_ifsc_code' => 'required',
                    ]);
                   
                //update in vendor Business table
                VendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                    'account_holder_name' => $data['account_holder_name'], 
                    'bank_name' => $data['bank_name'], 
                    'account_number' => $data['account_number'], 
                    'bank_ifsc_code' => $data['bank_ifsc_code'], 
                ]);
               
                return redirect()->back()->with('success_message', 'Vendor bank details updated successfully');
            }
            $vendorDetails = VendorsBankDetail::where('vendor_id' , Auth::guard('admin')->user()->vendor_id)->first()->toArray();

        }
        return view('admin.settings.update_vendor_details')->with(compact('slug' , 'vendorDetails'));

    }


    //   view vendors , admins and subadmins 
    public function viewAdmins($type=null)
    {
        //  $admins = Admin::get()->toArray();
        //  dd($admins);
        $admins = Admin::query();
       // dd($admins);
        if (!empty($type)) {
            $admins = $admins->where('type' ,$type);
            //dd($admins);
            $title = ucfirst($type);
        }
        else{
            $title = "All Admins/Subadmins/Vendors";
        }
        $admins = $admins->get()->toArray();
      // dd($admins);
       return view('admin.admins.admins')->with(compact('admins' , 'title'));

    }

    public function viewVendorDetails($id){
       
        $vendorDetails  = Admin::with('vendor_personal','vendor_business','vendor_bank')->where('id' , $id)->first();
        $vendorDetails = json_decode(json_encode($vendorDetails) , true);
       //dd($vendorDetails);
       return  view('admin.admins.view_vendor_detail' , compact('vendorDetails'));
  
    }

    public  function updateAdminStatus(Request $request)
    {
       if ($request->ajax()) {
        $data = $request->all();
        // echo "<pre>" ;
        // print_r($data);

        if ($data['status'] == 'Active') {
            $status = 0;
        }else{
            $status = 1;
        }
        Admin::where('id' , $data['admin_id'])->update(['status' => $status]);
        return response()->json(['status' => $status , 'admin_id' => $data['admin_id']]);
       
       }
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
