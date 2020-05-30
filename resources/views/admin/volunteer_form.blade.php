@extends('layouts.backend.app')
@section('title', 'Admin Dashboar')
@section('content')
<div class="container-fluid">
        <h4 class="text-center primary-text-color pb-4 mt-5"><b>စေတနာ့၀န်ထမ်းများ</b></h4>
        <div class="row">
            @foreach($volunteers as $volunteer)
            <div class="col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{url('/logo.jpg')}}" alt="...">
                            </div>
                            <div class="col-8">
                                <p><b>Name:</b> {{ $volunteer->volunteer_name}}</p>
                                <p><b>Age:</b> {{ $volunteer->volunteer_age}}</p>
                                <p><b>Gender:</b> {{ $volunteer->volunteer_gender}}</p>
                                <p><b>Phone:</b> {{ $volunteer->volunteer_phone}}</p>
                                <p><b>Address:</b> {{ $volunteer->volunteer_address}}</p>
                                <p><b>Prefer Location:</b> {{ $volunteer->prefer_location}}</p>
                                <p><b>Join Date:</b> {{ $volunteer->created_at->format('Y-m-d')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>             

        <div class="row col-12">
            <div class="ml-auto"> {{ $volunteers ? $volunteers->links() : '' }} </div>
        </div>
    </div>
@stop