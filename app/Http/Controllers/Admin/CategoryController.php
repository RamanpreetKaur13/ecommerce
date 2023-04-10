<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

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

    public function addEditCategory(Request  $request , $id=null)
    
    {
        Session::put('page' , 'categories');

        if ($id=="") {
           $title = "Add Category";
           $category = new Category;
           $message = "Category added successfully";
        } else {
            $title = "Edit  Category";
           $category = Category::find($id);
           $message = "Category updated successfully";
        }

        //Add Category 
        if ($request->isMethod('post')) {
            if ($request->hasFile('category_image')) {
                $img_tmp = $request->file('category_image');
                if ($img_tmp->isValid()) {
                    //get the extension
                    $img_extension = $img_tmp->getClientOriginalExtension();
                    $img_name = rand('111', '9999') . '.' . $img_extension;
                        //get img path 
                        $img_path = 'Admin/images/category/' . $img_name;
                        //upload the image
                        Image::make($img_tmp)->save($img_path);
                        $category->category_image = $img_name;
                }
            } 
            $category->section_id = $request->section;
            $category->parent_id = $request->parent_id;
            $category->category_name = $request->category_name;
            $category->url = $request->url;
            $category->category_discount = $request->category_discount;
            $category->description = $request->description;
            $category->meta_title = $request->meta_title;
            $category->meta_description = $request->meta_description; 
            $category->meta_keyword = $request->meta_keyword;
            $category->status = $request->status;
           
            $category->save();
            return redirect('admin/categories')->with('success' , 'Category added successfully');
        }
        //get section 
        $sections = Section::where('status' , 1)->get();
        return view('admin.categories.create' , compact('title' , 'category' , 'sections'));
        
    }
}
