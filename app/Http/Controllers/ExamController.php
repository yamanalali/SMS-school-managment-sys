<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Exam;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {       
        //
        $subjects = Subject::all(); // Retrieve all subjects
        $exams = Exam::all();
         return view('exam.list-exam', compact('subjects','exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = Subject::all(); // Retrieve all subjects
        $exams = Exam::all();
         return view('exam.create-exam', compact('subjects','exams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $startDateTime = $request->input('start_date');
        $startDateTime = date('Y-m-d H:i', strtotime($startDateTime));
        $exam = new Exam();
        $exam->subject_id = $request->input('subject_id');
        $exam->exam_name = $request->input('exam_name');

        $exam->start_date = $startDateTime;
        $exam->description = $request->input('description');
        $exam->max_score = $request->input('max_score');
        $exam->user_id = auth()->user()->id;
        $exam->save();
    
        return redirect()->route('exam.list', ['exam' => $exam]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
