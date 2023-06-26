<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Department;
use Brian2694\Toastr\Facades\Toastr;

class DepartmentController extends Controller
{
    /** index page department */
    public function indexDepartment()
    {
        return view('department.add-department');
    }
    
    /** edit record */
    public function editDepartment($id)
    {
        $dEdit = Department::where('id',$id)->first();
        return view('department.edit-departmen',compact('dEdit'));
        
    }

     /** list record */
     public function listDepartment()
     {
         $dList = Department::all();
         return view('department.list-department',compact('dList'));
     }

 
     /** update record teacher */
     public function updateRecordDepartment(Request $request)
     {
         DB::beginTransaction();
         try {
 
             $updateRecord = [
                 'department_id'          => $request->department_id,
                 'department_name'        => $request->department_name,
                 'head_of_department'     => $request->head_of_department,
                 'start_date'             => $request->start_date,
                 'number_of_students'     => $request->number_of_students,
             ];
             Department::where('id',$request->id)->update($updateRecord);
             
             Toastr::success('Has been update successfully :)','Success');
             DB::commit();
             return redirect()->back();
             
         } catch(\Exception $e) {
             DB::rollback();
             Toastr::error('fail, update record  :)','Error');
             return redirect()->back();
         }
     }






     public function saveRecord(Request $request)
    {
      try{
       
        $saveDepartment = new Department;
        $saveDepartment->department_id             = $request->department_id;
        $saveDepartment->department_name           = $request->department_name;
        $saveDepartment->head_of_department        = $request->head_of_department;
        $saveDepartment->start_date                = $request->start_date;
        $saveDepartment->number_of_students        = $request->number_of_students;
        $saveDepartment->save();
       
        Toastr::success('Has been add successfully :)','Success');
        return redirect()->back();
    } catch(\Exception $e) {
        \Log::info($e);
        DB::rollback();
        Toastr::error('fail, Add new record  :)','Error');
        return redirect()->back();
     
    }
  

 }




  /** delete Department */
  public function departmentDelete(Request $request)
  {
      try {

          Department::destroy($request->id);
          DB::commit();
          Toastr::success('Deleted record successfully :)','Success');
          return redirect()->back();
      } catch(\Exception $e) {
          DB::rollback();
          Toastr::error('Deleted record fail :)','Error');
          return redirect()->back();
      }
  }

}
