<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

use DB;
use App\Models\Department;
use App\Models\Teacher;
use Brian2694\Toastr\Facades\Toastr;

class SubjectController extends Controller
{




    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $sub = Subject::all();
    $subject = Subject::all();
    $subjects = Subject::all();

    $departments = Department::all();
    $teachers = Teacher::all();

    return view('subject.list-subjects', compact('departments', 'teachers', 'sub', 'subject', 'subjects'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sub = Subject::all();
        $subject = Subject::all();
        $subjects = Subject::all();

        $departments = Department::all();
        $teachers = Teacher::all();

        return view('subject.add-subject', compact('departments', 'teachers', 'sub', 'subject', 'subjects'));
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Subject();
        $data->subject_name = $request->subject_name;
        $data->subject_code = $request->subject_code;
        $data->description = $request->description;
        $data->start_date = date('Y-m-d', strtotime($request->start_date));
        $data->end_date = date('Y-m-d', strtotime($request->end_date));
        $data->maximum_capacity = $request->maximum_capacity;
        $data->pass_mark = $request->pass_mark;
        $data->language = $request->language;
        $data->online_availability = $request->online_availability;
        $data->course_fee = $request->course_fee;
        $data->classroom = $request->classroom;
        $data->teacher_id = $request->teacher_id;
        $data->department_id = $request->department_id;

        $data->save();
    
        return redirect()->route('subject.list', ['data' => $data]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject,$id)
    {
        //
        $subject = Subject::findOrFail($id);

        return view('subject.subject-details', compact('subject'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject, $id)
    {
        $subject = Subject::all();
        $departments = Department::all();
        $teachers = Teacher::all();

        return view('subject.edit-subjects', compact('departments', 'teachers', 'subject'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
      
        DB::beginTransaction();
        try {
           
            $updateRecord = [
                'subject_name'     => $request->full_name,
                'subject_code'        => $request->gender,
                'description' => $request->date_of_birth,
                'hours'        => $request->mobile,
                'instructor'  => $request->joining_date,
                'class_schedule' => $request->qualification,
                'start_date'    => $request->experience,
                'end_date'      => $request->username,
                'maximum_capacity'       => $request->address,
                'available_seats'          => $request->city,
                'textbook'         => $request->state,
                'exam_schedule'      => $request->zip_code,
                'pass_mark'      => $request->country,
                'head_of_department' => $request->date_of_birth,
                'department_name'        => $request->mobile,
                'course_fee'  => $request->joining_date,
                'classroom' => $request->qualification,
                'language'    => $request->experience,
                'online_availability'      => $request->username,
                'class_duration'       => $request->address,
                'exam_format'          => $request->city,
                
            ];
           
      
           
        Subject::where('id', $request->id)->update($updateRecord);

        DB::commit();
        Toastr::success('Subject updated successfully :)', 'Success');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Subject update failed :(', 'Error');
    }

    return redirect()->back();
}
    
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }

    
}
