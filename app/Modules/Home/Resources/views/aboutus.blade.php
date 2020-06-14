@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
            <h1 class="mb-0">About Us</h1>
            <ul class="list-unstyled d-flex">
                <li> <a href="{{ route('home') }}">Home  >> </a></li>
                <li>About Us</li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>

<section class="neta-about section-padding">
<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <h2 class="ttl-line">Welcome to <br>Nurse Education & Training Australia
                </h2>
                {!! $about_neta['description'] !!}          
        </div>

        @php
            $image = ($about_neta->image) ? asset($about_neta->file_full_path).'/'.$about_neta->image : '';
        @endphp

        <div class="col-sm-5">
            <img src=" {{$image}} " class="img-fluid" alt="">
        </div>
        
    </div>
</div>
</section>

<!-- <section class="neta-team section-padding">
    <div class="container">
        <h2 class="ttl-line">Our Team </h2>
        <div class="row">

            
        @if(sizeof($team)>0)
        @foreach($team as $key => $team_val)

        @php
            $team_image = ($team_val->profile_pic) ? asset($team_val->file_full_path).'/'.$team_val->profile_pic : '';
        @endphp

            <div class="col-sm-3">
                <div class="neta-team__box">
                    <figure>
                        <img src="{{ $team_image }}" class="img-fluid" alt="">
                        <div class="img-fade"></div>
                        <figcaption class="text-center">
                         <h5 class="mb-0">{{ $team_val->member_name }}</h5>
                         <p>{{ $team_val->designation }}</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</section> -->

<section class="section-padding"></section>


@include('home::layouts.footer')
