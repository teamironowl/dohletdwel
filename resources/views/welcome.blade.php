
@extends('layouts.app')
@section('title', 'ပင်မစာမျက်နှာ')
@section('content')
    <div class="container-fluid card p-5">
        <div class="container d-flex justify-content-around">
            <div class="align-self-center">
                <div class="d-flex p-4 flex-column" style="cursor:pointer" onclick="$('#reportForm').modal('show')">
                    <img src="{{ url('/banner.png')}}" class="secondary-background-color align-self-center rounded-circle" alt="Banner Image" width="100px">
                    <button class="btn primary-text-color btn-lg mt-4">အကူအညီတောင်းရန်</button>
                </div>
            </div>
            <div class="align-self-center">
                <img src="{{ url('/banner.png')}}" class="secondary-background-color rounded-circle" alt="Banner Image" width="200px">
            </div>
            <div class="align-self-center">
                <div class="d-flex p-4 flex-column" style="cursor:pointer" onclick="$('#reportForm').modal('show')">  
                    <img src="{{ url('/banner.png')}}" class="secondary-background-color align-self-center rounded-circle" alt="Banner Image" width="100px">
                    <button class="btn primary-text-color btn-lg mt-4">အကူအညီပေးရန်</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container m-auto pt-4">
        <div class="row mt-12">
            <div class="col-lg-4 col-md-12 col-sm-12 mb-5 text-center">
                <div class="card rounded contact-card">
                    <div class="card-header">Yangon</div>
                    <div class="card-body m-3">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum aut, numquam accusantium a asperiores earum veritatis excepturi sunt, vel, eligendi velit temporibus! Quo modi dolor ullam optio animi sapiente sit.</p>
                        <button class="btn btn-sm btn-success">More</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-5 text-center">
                <div class="card rounded contact-card">
                    <div class="card-header">Mandalay</div>
                    <div class="card-body m-3">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum aut, numquam accusantium a asperiores earum veritatis excepturi sunt, vel, eligendi velit temporibus! Quo modi dolor ullam optio animi sapiente sit.</p>
                        <button class="btn btn-sm btn-success">More</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 mb-5 text-center">
                <div class="card rounded contact-card">
                    <div class="card-header">Shan</div>
                    <div class="card-body m-3">
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Illum aut, numquam accusantium a asperiores earum veritatis excepturi sunt, vel, eligendi velit temporibus! Quo modi dolor ullam optio animi sapiente sit.</p>
                        <button class="btn btn-sm btn-success">More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-md-4">
    <div class="cmn-sec">

    <div class="row mt-4">
        <div class="col-lg-4 col-md-12 col-sm-12 mb-5 text-center">
            <div class="card rounded contact-card">
                <div class="card-body m-3">
                    <a href="viber://pa?chatURI=are&context=abcdefg&text=Hello" class="text-decoration-none text-dark" target="_blank">
                        <img src="{{ url('/viber.svg') }}" title="icon-viber- alt="icon-viber- class="wd-38">
                        <h3 class="card-title mt-2 primary-text-color">Contact Us</h3>
                        <p class="card-text">@lang('chat_with_us')</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 mb-5 text-center">
            <div class="card rounded contact-card">
                <div class="card-body m-3">
                    <a href="https://m.me/ivemore/" class="text-decoration-none text-dark" target="_blank">
                        <img src="{{ url('/messenger.svg') }}" title="icon-facebook-messenger- alt="icon-facebook-messenger- class="wd-38">
                        <h3 class="card-title mt-2 primary-text-color">Facebook messenger</h3>
                        <p class="card-text">@lang('chat_with_us')</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12 col-sm-12 mb-5 text-center">
            <div class="card rounded contact-card">
                <div class="card-body m-3">
                    <a href="https://com.mm/contact/" class="text-decoration-none text-dark" target="_blank">
                        <img src="{{ url('/contact.svg') }}" title="icon-hotline- alt="icon-hotline- class="wd-38">
                        <h3 class="card-title mt-2 primary-text-color">Phone or Email</h3>
                        <p class="card-text">@lang('we_available')</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
</div>
@if(Session::has('message'))
    <div class="alert alert-success alert-dismissible col-4 ml-auto fixed-bottom">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>အောင်မြင်သည်!</strong> {{ Session::get('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible col-4 ml-auto fixed-bottom">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>မအောင်မြင်ပါ!</strong> ထပ်မံကြိုးစားကြည့်ပါ။
    </div>
@endif
@endsection
<script>
    window.onload = function () {
        $('#state_division').on('change', function () {
            if(this.value){
                let url = `{{ url('/') }}/ajax/state_division/${this.value}/townships`;
                fetch(url)
                    .then(response => response.json())
                    .then(({townships: data}) => {
                        $('#township_id').empty();
                        $('#township_id').append('<option value="" disabled selected>မြို့နယ်ကိုရွေးပါ</option>');
                        data.map((township) => {
                            $('#township_id').append(`<option value="${township.id}" disable>${township.name}</option>`);
                        })
                    })
                    .catch(error => console.error(error));
                }
        });

        @if(session()->has('action_message') && session()->get('action_message') == 'openReportForm')
            $('#reportForm').modal('show')
        @endif
    }
</script>
