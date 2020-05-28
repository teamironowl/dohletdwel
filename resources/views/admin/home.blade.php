@extends('layouts.backend.app')
@section('title', 'Admin Dashboar')
@section('content')
<div class="row m-3">
    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
        <div class="card-header">Total Case</div>
        <div class="card-body">
            <p class="card-text">{{ \App\ReportForm::count()}}</p>
        </div>
    </div>
    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
        <div class="card-header">Pending Case</div>
        <div class="card-body">
            <p class="card-text">{{ \App\ReportForm::where('status', 1)->count()}}</p>
        </div>
    </div>
    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
        <div class="card-header">Approve Case</div>
        <div class="card-body">
            <p class="card-text">{{ \App\ReportForm::where('status', 2)->count()}}</p>
        </div>
    </div>
    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
        <div class="card-header">Close Case</div>
        <div class="card-body">
            <p class="card-text">{{ \App\ReportForm::where('status', 4)->count()}}</p>
        </div>
    </div>
    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
        <div class="card-header">Cancel Case</div>
        <div class="card-body">
            <p class="card-text">{{ \App\ReportForm::where('status', 3)->count()}}</p>
        </div>
    </div>
    <div class="card text-white secondary-background-color m-3 col-12 col-lg-2 col-md-4 col-sm-8">
        <div class="card-header">Total User</div>
        <div class="card-body">
            <p class="card-text">{{\App\User::count()}}</p>
        </div>
    </div>
</div>
@stop