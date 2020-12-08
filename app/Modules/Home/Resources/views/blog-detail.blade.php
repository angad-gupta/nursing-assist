@include('home::layouts.navbar-inner')

@php
    $image = ($blog_detail->blog_image) ? asset($blog_detail->file_full_path).'/'.$blog_detail->blog_image : asset('admin/default.png');
@endphp

@section('script')
<meta property="og:url"           content="{{ route('blog-detail',['blog_id'=>$blog_detail->id]) }}" />
<meta property="og:type"          content="Neta Onlince Couse" />
<meta property="og:title"         content="{{$blog_detail->title}}" />
<meta property="og:description"   content="{{$blog_detail->sub_content}}" />
<meta property="og:image"         content="{{$image}}" />
@stop

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                <h1 class="mb-0">Blog</h1>
                <ul class="list-unstyled d-flex">
                    <li> <a href="{{ route('home') }}">Home  >> </a></li>
                    <li> <a href="{{ route('blog') }}">Blog  >> </a></li>
                    <li>{{$blog_detail->title}}</li>
                </ul>
            </div>
        </div>
           
        </div>
    </div>
</section>

 

<section class="neta-blog section-padding  wow animated fadeInUp" data-wow-duration=".5s" data-wow-delay=".5s">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-12">
                <div class="blog-block border-1 rounded o-h">
                    <div class="p-4">
                        <h2 class="mb-3">{{$blog_detail->title}}</h2>
                        <div class="text-muted mb-2">
                            <span class="mr-4"><i class="fa fa-user"></i> By NETA</span>
                            <span><i class="fa fa-calendar"></i> {{date('M j, Y',strtotime($blog_detail->date))}}</span>
                        </div>
                    </div>
                    <div class="neta-blog-dtl-img">
                        <img src="{{$image}}" alt="">
                    </div>
                    <div class="p-4">
                        <div class="blog-content">
                            <div>
                               {!!$blog_detail->content!!} 
                            </div>
                    </div>
                    <div class="p-4 share-now">
                        <h5 class="mb-0 pr-4">Share Now:</h5>
                        <div class="share-icons">
                            <div class="fb-share-button" data-layout="button" data-size="large"  data-href="{{ route('blog-detail',['blog_id'=>$blog_detail->id]) }}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-padding"></section>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

@include('home::layouts.footer')
