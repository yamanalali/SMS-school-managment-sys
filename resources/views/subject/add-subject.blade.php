@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
        <div class="page-header">
        <div class="row align-items-center">
            <div class="col">
                <h3 class="page-title">{{__('Add Subjects')}}</h3>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('subject.list') }}">{{__('Subjects')}}</a></li>
                    <li class="breadcrumb-item active">{{__('Add Subjects')}}</li>
                </ul>
            </div>
        </div>
    </div>
    {{-- message --}}
    {!! Toastr::message() !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('subject/store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>{{__('Basic Details')}}</span></h5>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Subject Name')}} <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control @error('subject_name') is-invalid @enderror" name="subject_name" placeholder="{{__('Enter Subject Name')}}" value="{{ old('subject_name') }}">
                                    @error('subject_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Subject Code')}} <span class="login-danger">*</span></label>
                                    <input type="text" class="form-control @error('subject_code') is-invalid @enderror" name="subject_code" placeholder="{{__('Enter Subject Code')}}" value="{{ old('subject_code') }}">
                                    @error('subject_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Department')}} <span class="login-danger">*</span></label>
                                    <select class="form-control select @error('department_id') is-invalid @enderror" name="department_id" id="department_id">
                                        <option selected disabled>{{__('Select Department')}}</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                {{ $department->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('department_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Teacher')}} <span class="login-danger">*</span></label>
                                    <select class="form-control select @error('teacher_id') is-invalid @enderror" name="teacher_id" id="teacher_id">
                                        <option selected disabled>{{__('Select Teacher')}}</option>
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->full_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('teacher_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
    <div class="form-group">
        <label>{{__('Description')}}</label>
        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="{{__('Enter Description')}}" value="">
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                            <div class="col-12">
                                <h5 class="form-title"><span>{{__('Schedule Details')}}</span></h5>
                            </div>

                          
                            <div class="col-12 col-sm-4">
    <div class="form-group local-forms calendar-icon">
        <label>{{__('Start Date')}} <span class="login-danger">*</span></label>
        <input type="text" class="form-control datetimepicker @error('start_date') is-invalid @enderror" name="start_date" placeholder="DD-MM-YYYY" value="">
        @error('start_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="col-12 col-sm-4">
    <div class="form-group local-forms calendar-icon">
        <label>{{__('End Date')}} <span class="login-danger">*</span></label>
        <input type="text" class="form-control datetimepicker @error('end_date') is-invalid @enderror" name="end_date" placeholder="DD-MM-YYYY" value="">
        @error('end_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Maximum Capacity')}}</label>
                                    <input type="number" class="form-control" name="maximum_capacity" placeholder="{{__('Enter Maximum Capacity')}}" value="{{ old('maximum_capacity') }}">
                                </div>
                            </div>

                            
                          

                            <div class="col-12">
                                <h5 class="form-title"><span>{{__('Additional Details')}}</span></h5>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Pass Mark')}}</label>
                                    <input type="number" class="form-control" name="pass_mark" id="pass_mark" placeholder="{{__('Enter Pass Mark')}}" value="">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Course Fee')}}</label>
                                    <input type="number" class="form-control" id="course_fee" name="course_fee" placeholder="{{__('Enter Course Fee')}}" value="">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Classroom')}}</label>
                                    <input type="text" class="form-control" name="classroom" placeholder="{{__('Enter Classroom')}}" value="{{ old('classroom') }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Language')}}</label>
                                    <input type="text" class="form-control" name="language" placeholder="{{__('Enter Language')}}" value="{{ old('language') }}">
                                </div>
                            </div>

                            <div class="col-12 col-sm-4">
                                <div class="form-group local-forms">
                                    <label>{{__('Online Availability')}}</label>
                                    <select class="form-control select" name="online_availability">
                                        <option value="1" {{ old('online_availability') == '1' ? 'selected' : '' }}>{{__('Yes')}}</option>
                                        <option value="0" {{ old('online_availability') == '0' ? 'selected' : '' }}>{{__('No')}}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">{{__('Save')}}</button>
                                    <a href="{{ route('subject.list') }}" class="btn btn-secondary">{{__('Cancel')}}</a>
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
