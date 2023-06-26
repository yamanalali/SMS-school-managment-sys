@extends('layouts.master')

@section('content')
    {{-- message --}}
    {!! Toastr::message() !!}
   
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add Exam</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('exam/list') }}">Exams</a></li>
                            <li class="breadcrumb-item active">Add Exam</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body"> 
                            <form action="{{ route('exam/save/page') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <h5 class="form-title"><span>Exam Details</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Exam Title <span class="login-danger">*</span></label>
                                            <input type="text" value="{{ auth()->user()->name }}" class="form-control" id='user_id' name="user_id" disabled>
                                            @error('exam_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
    <div class="form-group local-forms ">
        <label>{{__('Start Date')}} <span class="login-danger">*</span></label>
        <div class="datetime-local">
            <input type="datetime-local" class="form-control @error('start_date') is-invalid @enderror" name="start_date" placeholder="DD-MM-YYYY HH:mm" value="">
        </div>
        @error('start_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>




                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Exam Title <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="exam_name">
                                            @error('exam_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Subject<span class="login-danger">*</span></label>
                                            <select class="form-control" name="subject_id">
                                                <option value="">Select Subject</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('subject_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Description <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="description">
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4">
                                        <div class="form-group local-forms">
                                            <label>Max Score <span class="login-danger">*</span></label>
                                            <input type="text" class="form-control" name="max_score">
                                            @error('max_score')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="exam-submit">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
@endsection
