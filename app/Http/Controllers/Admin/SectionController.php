<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Session;

class SectionController extends Controller
{

    public function index()
    {
        Session::put('page' , 'sections');
        $sections = Section::where('status' ,1)->get();
        return view('admin.section.index' , compact('sections'));
    }

    public  function updateSectionStatus(Request $request)
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
        Section::where('id' , $data['section_id'])->update(['status' => $status]);
        return response()->json(['status' => $status , 'section_id' => $data['section_id']]);
       
       }
    }

    public function addEditSection(Request $request , $id=null)
    {
        Session::put('page' , 'sections');
        if ($id=="") {
            $title = "Add Section";
            $section = new Section;
            $message = "Section added successfully";
        } else {
            $title = "Edit Section";
            $section = Section::find($id);
            $message = "Section updated successfully";
        }
        if ($request->isMethod('post')) {
            $data = $request->all();
         //   dd($data);
          $rules = [
            'name' => 'required|regex:/^[a-zA-Z]+$/u'
          ];
          $customMessages = [
            'name.required' => 'Section field is required',
            'name.regex' => 'Please enter valid section name (only letters are allowed)'
          ];
          $this->validate($request , $rules , $customMessages);
          $section->name = $data['name'];
          $section->status = 1;
          $section->save();
          return redirect('admin/sections')->with('success_message' , $message);
        }
        
        return view('admin.section.add_edit_section')->with(compact('title' ,'section'));
    }
    public function deleteSection($id){
        Section::where('id' ,$id)->delete();
        return redirect()->back()->with('success_message' , 'Section Deleted successfully');

    }
}
