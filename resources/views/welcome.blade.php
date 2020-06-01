
@extends('layouts.app')
@section('title', 'ပင်မစာမျက်နှာ')
@section('content')
    <div class="container-fluid card p-5">
        <div class="d-flex justify-content-around flex-column flex-lg-row flex-md-row">
            <div class="align-self-center order-1 order-lg-0 order-md-1 order-sm-1">
                <div class="d-flex p-4 flex-lg-column flex-md-column flex-sm-row" style="cursor:pointer" onclick="$('#reportForm').modal('show')">
                    <img src="{{ url('/banner.png')}}" class="secondary-background-color align-self-center rounded-circle" alt="Banner Image" width="100px">
                    <button class="btn primary-text-color btn-lg mt-4">အကူအညီတောင်းရန်</button>
                </div>
            </div>
            <div class="align-self-center">
                <img src="{{ url('/banner.png')}}" class="secondary-background-color rounded-circle" alt="Banner Image" width="200px">
            </div>
            <div class="align-self-center">
                <div class="d-flex p-4 flex-lg-column flex-md-column flex-sm-row" style="cursor:pointer" onclick="$('#volunteerForm').modal('show')">  
                    <img src="{{ url('/banner.png')}}" class="secondary-background-color align-self-center rounded-circle" alt="Banner Image" width="100px">
                    <button class="btn primary-text-color btn-lg mt-4">Volunteer လျောက်ထားရန်</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid m-auto pt-4">
        <h4 class="text-center primary-text-color pb-4"><b>အကူအညီလိုအပ်သည့်နေရာများ (ပြည်နယ်နှင့် တိုင်းအလိုက်)</b></h4>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($divisions->chunk(4) ?? [] as $count => $dc)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$count}}}" class="{{ $count == 0 ? 'active' : '' }}"></li>
                @endforeach
            </ol>
            
            <div class="carousel-inner">
                @foreach($divisions->chunk(4) ?? [] as $count => $division_cats)
                <div class="carousel-item {{ $count == 0 ? 'active' : '' }}">
                    <div class="row mt-12">
                        @foreach($division_cats ?? [] as $division)
                        <div class="col-lg-3 col-md-3 col-sm-12 mb-5 text-center">
                            <div class="card rounded contact-card">
                                <div class="card-header secondary-background-color text-white"><h5>{{$division->name}}</h5></div>
                                <div class="card-body m-3">
                                    <div class="row">
                                        <div class="float-lefts col-8">
                                            @forelse($division->medias->sortByDesc('created_at')->take(4) as $media)
                                                @if(count($division->medias) == 1)
                                                <img src="{{$media->file_path}}" alt="..." width="120" height="120">
                                                @elseif(count($division->medias) == 2)
                                                <img src="{{$media->file_path}}" alt="..." width="60" height="58">
                                                <img src="{{url('logo.jpg')}}" alt="..." width="60" height="58">
                                                @else
                                                <img src="{{$media->file_path}}" alt="..." width="60" height="58">
                                                @endif
                                            @empty
                                                <img src="{{url('logo.jpg')}}" alt="...">
                                            @endforelse
                                        </div>
                                        <div>
                                            <p><b>{{ $division->cases}}</b> Case</p>
                                            <a href="{{ url('/state_or_division').'/'.$division->state_division.'/cases'}}" class="btn btn-sm secondary-background-color text-white">အသေးစိပ်</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container mt-md-4">
        <div class="cmn-sec">
            <div class="row mt-4">
                <div class="col-lg-4 col-md-12 col-sm-12 mb-5 text-center">
                    <div class="card rounded contact-card">
                        <div class="card-body m-3">
                            <a href="viber://pa?chatURI=are&context=abcdefg&text=Hello" class="text-decoration-none text-dark" target="_blank">
                                <img src="" title="icon-viber- alt="icon-viber- class="wd-38">
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
                                <img src="" title="icon-facebook-messenger- alt="icon-facebook-messenger- class="wd-38">
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
                                <img src="" title="icon-hotline- alt="icon-hotline- class="wd-38">
                                <h3 class="card-title mt-2 primary-text-color">Phone or Email</h3>
                                <p class="card-text">@lang('we_available')</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible col-4 ml-auto fixed-bottom">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>မအောင်မြင်ပါ!</strong> ထပ်မံကြိုးစားကြည့်ပါ။
    </div>
@endif
@endsection

@section('scripts')
<script>
    window.onload = function () {
        $('#state_division').on('change', function () {
            if(this.value){
                let url = `{{ url('/') }}/ajax/state_division/${this.value}/townships`;
                fetch(url)
                .then(response => response.json())
                .then(data => {
                    $('#township_id').empty();
                    $('#township_id').append('<option value="" disabled selected>မြို့နယ်ကိုရွေးပါ</option>');
                    data.map(({id, name}) => $('#township_id').append(`<option value="${id}" disable>${name}</option>`))
                })
                .catch(error => console.error(error));
            }
        });

        @if(session()->has('action_message') && session()->get('action_message') == 'openReportForm')
            $('#reportForm').modal('show');
        @endif

        @if(session()->has('action_message') && session()->get('action_message') == 'openVolunteerForm')
            $('#volunteerForm').modal('show');
        @endif

        var action_message = /[?&]action_message(=([^&#]*)|&|#|$)/.exec(window.location.href);
        
        if (action_message && action_message[2] && action_message[2] == 'openLoginForm') $('#loginForm').modal('show');

        @if(Session::has('message'))
            swal.fire({
                type: "success",
                icon: 'success',
                title: 'အောင်မြင်သည်!',
                text: '{{ Session::get('message') }}',
                confirmButtonColor: "hsl(189, 39%, 40%)"
            });
        @endif
    }

    const files_dom  = document.getElementById('files');
    const image_preview = document.getElementById('image_preview');

    files_dom.addEventListener('change', ev => {
        ev.preventDefault();
        image_preview.innerHTML = ''; // Clear Preview
        const files = ev.target.files;
        if (!files || !files[0]) return alert('File upload not supported');
        [...files].map( readFile );
    });

    const readFile = file => {
        const reader = new FileReader();
        if (file.type.match('image')){
            reader.onload = _ => image_preview.insertAdjacentHTML('beforeend', `<img src="${reader.result}" width="57" class="img-fluid img-thumbnail" alt="..."> `)
            reader.readAsDataURL(file);
            return;  
        }
        reader.onload = _ => image_preview.insertAdjacentHTML('beforeend', `<video src="${reader.result}" width="57" class="img-fluid img-thumbnail" alt="..."></video> `)
        reader.readAsDataURL(file);
    }

    function thumbnail(){
        var canvas = document.getElementById('canvas');
        var video = document.getElementById('video');
        canvas.getContext('2d').drawImage(video, 0, 0, video.videoWidth, video.videoHeight);
    }
</script>
@stop
