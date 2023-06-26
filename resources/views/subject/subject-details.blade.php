@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">{{__('Subject Details')}}</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('subject.list') }}">{{__('Subjects')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Subject Details')}}</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
        <div class="col-sm-12">
                <div class="card">
                <div class="card-body">
        <h5 class="card-title text-center" style="font-size: 24px; font-weight: bold;">{{ $subject->subject_name }}</h5>
                        <div class="subject-details">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Subject Code')}}:</span>
                                        <span class="entry-value">{{ $subject->subject_code }}</span>
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Department')}}:</span>
                                        @isset($subject->department->name)
                                            <span class="entry-value">{{ $subject->department->name }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Teacher')}}:</span>
                                        @isset($subject->teacher->full_name)
                                            <span class="entry-value">{{ $subject->teacher->full_name }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Description')}}:</span>
                                        @isset($subject->description)
                                            <span class="entry-value">{{ $subject->description }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Start Date')}}:</span>
                                        @isset($subject->start_date)
                                            <span class="entry-value">{{ $subject->start_date }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Maximum Capacity')}}:</span>
                                        @isset($subject->maximum_capacity)
                                            <span class="entry-value">{{ $subject->maximum_capacity }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Language')}}:</span>
                                        @isset($subject->language)
                                            <span class="entry-value">{{ $subject->language }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('End Date')}}:</span>
                                        @isset($subject->end_date)
                                            <span class="entry-value">{{ $subject->end_date }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Pass Mark')}}:</span>
                                        @isset($subject->pass_mark)
                                            <span class="entry-value">{{ $subject->pass_mark }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Course Fee')}}:</span>
                                        @isset($subject->course_fee)
                                            <span class="entry-value">{{ $subject->course_fee }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Classroom')}}:</span>
                                        @isset($subject->classroom)
                                            <span class="entry-value">{{ $subject->classroom }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                    <div class="subject-entry rectangle">
                                        <span class="entry-label">{{__('Online Availability')}}:</span>
                                        @isset($subject->online_availability)
                                            <span class="entry-value">{{ $subject->online_availability ? __('Yes') : __('No') }}</span>
                                        @else
                                            <span class="entry-value">{{ __('You didn\'t assign a value') }}</span>
                                        @endisset
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary" onclick="printSubjectDetails()">{{__('Print')}}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .rectangle {
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
    }

    .entry-label {
        font-weight: bold;
    }

    .entry-value {
        margin-left: 10px;
    }
</style>

<script>
    function printSubjectDetails() {
        window.print();
    }
</script>
@endsection
