@extends('layouts.backend.app')
@section('title', 'Request Form')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Request Form</div>

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
                                <th scope="col">အခြေအနေ</th>
                                <th scope="col">လုပ်ဆောင်ချက်</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($report_cases ?? [] as $key => $report_case)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ auth()->user()->name ?? 'တင်ပြသူမသိ'}}</td>
                                <td>
                                    {!! $report_case->status == 3 ? '<del>': '' !!}
                                    <p><b>{{ $report_case->basic_need}}</b></p>
                                    <p>{{ $report_case->description}}</p>
                                    <p>{{ $report_case->affect_people}}ဦး။| ဖုန်း {{ $report_case->phone}} | တင်ပြသူ{{ $report_case->report_by}}</p>
                                    {!! $report_case->status == 3 ? '</del>': '' !!}
                                </td>
                                <td>
                                    {!! $report_case->status == 3 ? '<del>': '' !!}
                                    {{ $report_case->state_division_name}} {{ $report_case->township_name}}
                                    {!! $report_case->status == 3 ? '<del>': '' !!}
                                </td>
                                <td>{{ $report_case->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($report_case->status == 1)
                                        <p>အတည်မပြုရသေးပါ</p>
                                    @endif
                                    @if($report_case->status == 2)
                                        <p>အတည်ပြုပြီး</p>
                                    @endif
                                    @if($report_case->status == 3)
                                        <p>ပယ်ဖျက်ပြီး</p>
                                    @endif
                                    @if($report_case->status == 4)
                                        <p>ကေ့စ်ပိတ်ပြီး</p>
                                    @endif
                                </td>
                                <td>
                                {{$report_case->STATUS_PENDING}}
                                    @if($report_case->status == 1)
                                        <a class="btn btn-success btn-sm text-white" href='{{ url("admin/request_form/$report_case->id")."/approve" }}'>အတည်ပြုရန်</a>
                                        <a class="btn btn-danger btn-sm text-white" href='{{ url("admin/request_form/$report_case->id")."/cancel" }}'>ပယ်ဖျက်ရန်</a>
                                    @endif
                                    @if($report_case->status == 2)
                                        <a class="btn btn-secondary btn-sm text-white" href='{{ url("admin/request_form/$report_case->id")."/close" }}'>ကေ့စ်ပြီးပြီ</a>
                                    @endif
                                    @if($report_case->status == 3)
                                        <a class="btn btn-info btn-sm text-white" href='{{ url("admin/request_form/$report_case->id")."/restore" }}'>Restore</a>
                                    @endif
                                    @if($report_case->status == 4)
                                        <a class="btn btn-dark btn-sm text-white" href='{{ url("admin/request_form/$report_case->id")."/re_open" }}'>ကေ့စ်ပြန်ဖွင့်ရန်</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                                <tr class="text-center"> 
                                    <td colspan="5">no data!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="float-right">
                        {{ $report_cases ? $report_cases->links() : '' }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop