@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
            <h1 class="mb-0">Forum</h1>
            <ul class="list-unstyled d-flex">
                <li> <a href="{{ route('home') }}">Home  >> </a></li>
                <li>Forum</li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>

<section class="neta-forum mt-4 section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="neta-forum-tags">
                    <ul class="list-unstyled d-flex mb-0">
                        <li><a href="{{ route('student-forum',['is_top_topic'=>'1']) }}">Top Topics</a></li>
                        <li><a href="{{ route('student-forum') }}">Most Recent</a></li>
                        <li><a href="{{ route('student-forum',['is_featured_topic'=>'1']) }}">Featured Topics</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="neta-forum-block">

                @if($forum_detail->total() != 0) 
                @foreach($forum_detail as $key => $value)

                @php
                    $totalComment = App\Modules\Forum\Entities\ForumComment::countComment($value->id);
                    $textcomment = ($totalComment > 0 ) ? $totalComment .' Comments' : $totalComment .' Comment';
                @endphp

                    <div class="neta-forum-item">
                        <h5><a href="{{ route('forum-detail',['forum_id'=>$value->id]) }}">{{$value->forum_title}}</a></h5>
                        <div class="entry-meta mb-2">
                            <span><i class="fa fa-user"></i> Posted By: {{ optional($value->studentInfo)->full_name }}</span>
                            <span><i class="fa fa-clock-o"></i>{{ $value->created_at->diffForHumans() }}</span>
                            <span><i class="fa fa-comments"></i> {{$textcomment}}</span>
                        </div>
                        <p>{{$value->forum_description}}</p>
                    </div>
                @endforeach
                @else
                <div class="neta-forum-item">
                    <h5>No Forums Discussion.</h5>
                </div>
                @endif
                </div>

                <nav class="mt-4" aria-label="...">
                     @if($forum_detail->total() != 0)
                        {{ $forum_detail->links() }}
                    @endif
                </nav>
            </div>

            <div class="col-md-4">
                <div class="neta-contact">
                    <div class="neta-contact__form form" style="margin-top: 30px;">
                        <h2 class="ttl-line" style="font-size: 24px;">Create a New Topic</h2>
                        <p>Want to get in touch? We'd love to hear from you. Here's how you can reach us...</p>

                         {!! Form::open(['route'=>'store-forum','method'=>'POST','name'=>'newsletter_form','id'=>'newsletter_submit','class'=>'form-horizontal','role'=>'form','files' => true]) !!}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {!! Form::text('forum_title', $value = null, ['id'=>'forum_title','placeholder'=>'Type Title, Topic','class'=>'form-control','required']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        {!! Form::textarea('forum_description', null, ['id' => 'forum_description','placeholder'=>'Enter Message', 'class' =>'form-control','required']) !!}
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button class="btn btn-neta" type="submit">Create Topic</button>
                                </div>
                            </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
</section>

<section class="section-padding"></section>
@include('home::layouts.footer')