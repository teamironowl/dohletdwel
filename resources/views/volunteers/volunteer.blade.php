@extends('layouts.app')
@section('title', 'စေတနာ့၀န်ထမ်းများ')
@section('content')
<div class="container-fluid">
        <h4 class="text-center primary-text-color pb-4 mt-5"><b>စေတနာ့၀န်ထမ်း လျောက်ထားသူများ</b></h4>
        <div class="row">
            @foreach($volunteers as $volunteer)
            <div class="col-12 col-md-6 col-lg-3 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <img class="rounded-circle border" src="{{url('/logo.jpg')}}" alt="...">
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
            @endforeach
        </div>             

        <div class="row col-12">
            <div class="ml-auto"> {{ $volunteers ? $volunteers->links() : '' }} </div>
        </div>
    </div>
@stop