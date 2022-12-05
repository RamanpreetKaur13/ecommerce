<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\helper;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
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
                   Admin::where('id' , Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['password'])]);
                   return redirect()->back()->with('success_message' , 'Password Updated Successfully');
                }
                else {
                    return  redirect()->back()->with('error_message' , 'Password not match with confirm password  !');
                }

                return redirect()->back()->with('success_message' , 'Current Password is correct');
            } else {
                return  redirect()->back()->with('error_message' , 'Current Password is incorrect !');
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
        $validated = $request->validate(['name' => 'required|regex:/^[\pL\s\-]+$/u' , 'mobile' => 'required|numeric']);
            
        //upload the admin image
        if ($request->hasFile('admin_image')) {
            $img_tmp = $request->file('admin_image');
            if ($img_tmp->isValid()) {
                //get the extension
                $img_extension = $img_tmp->getClientOriginalExtension();
                //generate new imge name 
                $img_name = rand('111' , '9999').'.'.$img_extension;

                //get img path 
                $img_path = 'Admin/images/admin_images/'.$img_name;
                //upload the image
                Image::make($img_tmp)->save($img_path);

            }
        }elseif (!empty($data['current_admin_image'])) {
            $img_name = $data['current_admin_image'];
        }
        else{
            $img_name = "";
        }
           Admin::where('id' , Auth::guard('admin')->user()->id)->update(['name' => $data['name'] , 'mobile' => $data['mobile'] , 'image' => $img_name]);
           return redirect()->back()->with('success_message' , 'Admin details updated successfully');
        }

     return view('admin.settings.update_details');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}