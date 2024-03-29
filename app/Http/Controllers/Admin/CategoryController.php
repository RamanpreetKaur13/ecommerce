<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        Session::put('page' , 'categories');
        $categories = Category::with(['section' , 'parentCategory'])->get();
     
        return view('admin.categories.index' , compact('categories'));
    }

    public  function updateCategoryStatus(Request $request)
    {
       if ($request->ajax()) {
        $data = $request->all();
        if ($data['status'] == 'Active') {
            $status = 0;
        }else{
            $status = 1;
        }
        Category::where('id' , $data['category_id'])->update(['status' => $status]);
        return response()->json(['status' => $status , 'category_id' => $data['category_id']]);
       
       }
    }
}
