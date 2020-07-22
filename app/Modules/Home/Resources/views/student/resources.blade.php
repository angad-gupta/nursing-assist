@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Resources</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home >> </a></li>
                        <li> Resources</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-about student-resources section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')

                <div class="my-courses">
                    <div class="row">
                        @if($resources->total() > 0)
                            @foreach($resources as $key => $value)
                                @if(!empty($value->source_name))
                                    <div class="col-sm-12 col-md-12 col-lg-3">
                                        <div class="my-courses__list">
                                            <div class="list-content">
                                                <h5>{{ $value->title }}</h5>
                                                <span></span>
                                                <div class="neta-limit">
                                                    <p>{!! $value->description !!} </p>
                                                </div>
                                                <a class="btn e-btn w-100"
                                                    href="{{asset($value->file_full_path).'/'.$value->source_name}}" download>Download</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                    
                        @endif
                    </div>
                </div>
             
            </div>
        </div>
    </div>
</section>

<section class="section-padding"></section>

@include('home::layouts.footer')
