@extends('layouts.app')
@section('title', 'သင်၏စာမျက်နှာ')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">တင်ပြသူ</th>
                                <th scope="col">အကြောင်းအရာ</th>
                                <th scope="col">လိုအပ်သည့်နေရာ</th>
                                <th scope="col">ရက်စွဲ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($report_cases as $key => $report_case)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ auth()->user()->name ?? 'တင်ပြသူမသိ'}}</td>
                                <td>
                                    <p><b>{{ $report_case->basic_need}}</b></p>
                                    <p>{{ $report_case->description}}</p>
                                    <p>{{ $report_case->affect_people}}ဦးအကူအညီလိုအပ်နေပါသည်။</p>
                                    <p>ဆက်သွယ်ရန်ဖုန်း {{ $report_case->phone}}</p>
                                    <p>တင်ပြသူ{{ $report_case->report_by}}</p>
                                </td>
                                <td>{{ $report_case->state_division_name}} {{ $report_case->township_name}}</td>
                                <td>{{ $report_case->created_at->diffForHumans() }}</td>
                            </tr>
                            @empty
                                <tr class="text-center"> 
                                    <td colspan="5">no data!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
