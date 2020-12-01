@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                <h1 class="mb-0">Gallery</h1>
                <ul class="list-unstyled d-flex">
                    <li> <a href="{{ route('home') }}">Home  >> </a></li>
                    <li> <a href="{{ route('gallery') }}">Gallery  >> </a></li>
                    <li>{{$album_detail->album_title}}</li>
                </ul>
            </div>
        </div>
           
        </div>
    </div>
</section>

<section class="neta-gallery section-padding  wow animated fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
    <div class="container">
        <h2 class="ttl-line">{{$album_detail->album_title}}</h2>
        <p>{!! $album_detail->short_content !!}</p>

        <div class="row mt-4">

            @foreach($album_photos as $key => $value)
            
                <div class="col-md-6 col-lg-3">
                    <a href="{{ asset('uploads') }}/Gallery/Album/{{$value->image_path}}" class="image-popup neta-gallery-img">
                        <img src="{{ asset('uploads') }}/Gallery/Album/{{$value->image_path}}" alt="gallery photo">
                    </a>
                </div>

            @endforeach

        </div>
    </div>
</section>


<section class="section-padding"></section>
@include('home::layouts.footer')
