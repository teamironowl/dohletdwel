@extends('layouts.app')
@section('title', $cases[0]['division_name'])
@section('content')
    <div class="container">
        <h4 class="text-center primary-text-color pb-4 mt-5"><b>{{ $cases[0]['division_name']}} အတွင်းအကူအညီလိုအပ်သည့်နေရာများ</b></h4>
        @foreach($cases as $case)
        <div class="row card m-4 p-4">
            <div class="col align-self-center">
                <div class="row">
                    <div class="col-2">
                        <img src="{{url('/logo.jpg')}}" alt="...">
                    </div>
                    <div class="col-8">
                        <p><b>{{ $case->basic_need}} {{ $case->division_name}}၊ {{ $case->township_name}} မြို့၊   <small><i>{{ $case->created_at->diffForHumans() }}</i></small></b></p>
                        <p>{{ $case->description}}</p>
                        <p>အကူအညီလူအပ်သူ : {{ $case->affect_people}}ဦး၊  ဆက်သွယ်ရန်ဖုန်း : {{ $case->phone}}၊  တင်ပြသူ  : {{ $case->report_by}}</p>
                    </div>
                    <div class="row btn-group ml-auto">
                        <a href="#" class="btn btn-sm btn-secondary mr-2">Donate</a>
                        <a href="#" class="btn btn-sm btn-secondary mr-2">Donate by instance volunteer</a>
                        <a href="#" class="btn btn-sm btn-secondary mr-2">Request volunteer</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row col-12">
            <div class="ml-auto"> {{ $cases ? $cases->links() : '' }} </div>
        </div>
    </div>
@stop