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
                <li>Gallery</li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>

<section class="neta-gallery section-padding  wow animated fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
    <div class="container">
        <h2 class="ttl-line">Our Gallery</h2>

        <div class="row mt-4">

            @if($album_info->total() != 0) 
                @foreach($album_info as $key => $value)
            
                    @php
                        $image = ($value->thumbnail_image) ? asset($value->file_full_path).'/'.$value->thumbnail_image : asset('admin/image.png');
                    @endphp
            
                        <div class="col-md-6 col-lg-3">
                            <a href="{{ route('album-detail',['album_id'=>$value->id]) }}" class="neta-gallery__card">
                                <span href="gallery-dtl.php" class="neta-gallery-img">
                                    <img src="{{$image}}" alt="gallery photo">
                                </span>
                                <h5 class="pt-4">{{ $value->album_title }}</h5>
                                <p>
                                    {!! $value->short_content !!}
                                </p>
                            </a>
                        </div>
                @endforeach
            @endif
        </div>

        <div class="row">
            <div class="col-12">
            <nav aria-label="...">
                    @if($album_info->total() != 0)
                        {{ $album_info->links() }}
                    @endif
                </nav>
            </div>
        </div>

    </div>
</section>


<section class="section-padding"></section>
@include('home::layouts.footer')
