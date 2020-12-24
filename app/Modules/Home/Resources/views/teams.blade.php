@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
            <h1 class="mb-0">Team</h1>
            <ul class="list-unstyled d-flex">
                <li> <a href="{{ route('home') }}">Home  >> </a></li>
                <li>Team</li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>

<section class="neta-team section-padding  wow animated fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
    <div class="container">
        <div class="row mt-4">

        @if(sizeof($team)>0)
            @foreach($team as $key => $team_val)

            @php
                $team_image = ($team_val->profile_pic) ? asset($team_val->file_full_path).'/'.$team_val->profile_pic : '';
            @endphp
            <div class="col-md-6 col-lg-3">
                <div class="card neta-team-card p-0 transition border-1 rounded o-h">
                    <div class="neta-team-img">
                        <img src="{{ $team_image }}" alt="">
                    </div>
                    <div class="pt-4 pb-4 pl-3 pr-3">
                        <h6>{{ $team_val->member_name }}</h6>
                        <span>{{ $team_val->designation }}</span>
                        <div class="neta-team-desc">
                            <a href="" data-toggle="collapse" data-target="#collapseExample_{{$key}}" aria-expanded="false" aria-controls="collapseExample_{{$key}}">
                            <svg width="10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 284.936 284.936"><path d="M277.515 135.9L144.464 2.857C142.565.955 140.375 0 137.9 0c-2.472 0-4.659.955-6.562 2.857l-14.277 14.275c-1.903 1.903-2.853 4.089-2.853 6.567 0 2.478.95 4.664 2.853 6.567L229.268 142.47 117.062 254.677c-1.903 1.903-2.853 4.093-2.853 6.564 0 2.477.95 4.667 2.853 6.57l14.277 14.271c1.902 1.905 4.089 2.854 6.562 2.854 2.478 0 4.665-.951 6.563-2.854l133.051-133.044c1.902-1.902 2.851-4.093 2.851-6.567s-.949-4.664-2.851-6.571z"/><path d="M170.732 142.471c0-2.474-.947-4.665-2.857-6.571L34.833 2.857C32.931.955 30.741 0 28.267 0S23.602.955 21.7 2.857L7.426 17.133C5.52 19.036 4.57 21.222 4.57 23.7c0 2.478.95 4.664 2.856 6.567L119.63 142.471 7.426 254.677c-1.906 1.903-2.856 4.093-2.856 6.564 0 2.477.95 4.667 2.856 6.57l14.273 14.271c1.903 1.905 4.093 2.854 6.567 2.854s4.664-.951 6.567-2.854l133.042-133.044c1.91-1.902 2.857-4.093 2.857-6.567z"/></svg>
    
                            About me</a>
                            <div class="collapse" id="collapseExample_{{$key}}">
                                <div class="card card-body">
                                    {!! $team_val->about_me !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @endif

        </div>
    </div>
</section>


<section class="section-padding"></section>
@include('home::layouts.footer')