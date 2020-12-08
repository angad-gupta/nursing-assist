@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
            <h1 class="mb-0">Blog</h1>
            <ul class="list-unstyled d-flex">
                <li> <a href="{{ route('home') }}">Home  >> </a></li>
                <li>Blog</li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>


<section class="neta-blog section-padding  wow animated fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
    <div class="container">
        <div class="row mt-4">

            @if($blog_info->total() != 0) 
                @foreach($blog_info as $key => $value)
                    @php
                        $image = ($value->blog_image) ? asset($value->file_full_path).'/'.$value->blog_image : asset('admin/image.png');
                    @endphp
                    <div class="col-md-6 col-lg-4">
                        <div class="card neta-blog-card transition border-1 rounded o-h">
                            <div class="neta-blog-img">
                                <img src="{{$image}}" alt="">
                            </div>
                            <div class="pt-4 pb-4 pl-3 pr-3">
                                <div class="d-flex mb-3">
                                    <span class="text-muted mr-4"><i class="fa fa-user"></i> NETA</span>
                                    <span class="text-muted"><i class="fa fa-calendar"></i> {{date('M j, Y',strtotime($value->date))}}</span>
                                </div>
                                <h5><a href="{{ route('blog-detail',['blog_id'=>$value->id]) }}">{{$value->title}}</a></h5>
                                <p class="font-size-sm pt-1 m-0 text-muted">
                                   {!!$value->sub_content!!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

        </div>
        <div class="row">
            <div class="col-12">
            <nav aria-label="...">
                    @if($blog_info->total() != 0)
                        {{ $blog_info->links() }}
                    @endif
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="section-padding"></section>

@include('home::layouts.footer')
