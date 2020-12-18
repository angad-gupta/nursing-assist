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
                <li> <a href="{{ route('student-forum') }}">Forums  >> </a></li>
                <li>{{$forum_detail->forum_title}}</li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>

 @php
    $image = (optional($forum_detail->studentInfo)->profile_pic) ? asset(optional($forum_detail->studentInfo)->file_full_path).'/'.optional($forum_detail->studentInfo)->profile_pic : asset('admin/default.png');
 @endphp

<section class="neta-forum section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="neta-forum-dtl-block comment_card">
                    <div class="neta-forum-detail">
                        <h5 class="mb-3">{{$forum_detail->forum_title}}</h5>
                        <div class="forum-user d-flex align-items-center">
                            <img src="{{$image}}" alt="user">
                            <div class="forum-user-content pl-3">
                                <h5 class="mb-1">{{ optional($forum_detail->studentInfo)->full_name }}</h5>
                                <span><i class="fa fa-clock-o"></i> {{ $forum_detail->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p>{{$forum_detail->forum_description}}</p>
                    </div>



                @if($forum_comments->total() != 0) 
                @foreach($forum_comments as $key => $value)

                 @php
                    $commentimage = (optional($value->commentStudentInfo)->profile_pic) ? asset(optional($value->commentStudentInfo)->file_full_path).'/'.optional($value->commentStudentInfo)->profile_pic : asset('admin/default.png');
                 @endphp

                    <div class="neta-forum-detail">
                        <div class="forum-user d-flex align-items-center">
                            <img src="{{$commentimage}}" alt="user">
                            <div class="forum-user-content pl-3">
                                <h5 class="mb-1">{{ optional($value->commentStudentInfo)->full_name }}</h5>
                                <span><i class="fa fa-clock-o"></i> {{ $value->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p>{{$value->comment}}</p>
                    </div>
                @endforeach
                @else
                    <div class="neta-forum-detail">
                        <h5>No Forum Comments.</h5>
                    </div>
                @endif

            </div>

                <div class="forum-msg mt-4">
                        <div class="form-group">
                            <label for="comment">Your Message:</label>
                            <textarea class="form-control" id="comment" rows="5"></textarea>

                            {{ Form::hidden('forum_id', $forum_id, array('class' => 'forum_id')) }}

                        </div>
                        <button type="button" class="submit_comment btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
</section>

<section class="section-padding"></section>
<script>


</script>
<section class="section-padding"></section>
@include('home::layouts.footer')
<script type="text/javascript">
        $('document').ready(function() {

        $(document).on('click', '.submit_comment', function() {
            var comment = $('#comment').val();
            var forum_id = $('.forum_id').val();

            if(comment == ''){
                $('#comment').parent().find('span .input-group-text').addClass("alpha-danger text-danger border-danger ").removeClass("alpha-success text-success border-success");
                $('#comment').addClass("border-danger").removeClass("border-success");
                $('#comment').parent().parent().addClass("text-danger").removeClass("text-success");
                $('#comment').next('div .form-control-feedback').find('i').addClass("icon-cross2 text-danger").removeClass("icon-checkmark4 text-success");

                return false;
            }

             this.disabled = true;
            
            $.ajax({
                type: 'POST',
                url: 'storeForumComment',
                data: {
                    comment: comment,
                    forum_id: forum_id,
                    _token: '{{csrf_token()}}'
                },

                success: function(data) {
                    // console.log(data);
                    $('.comment_card').fadeOut(800, function() {
                        $('.comment_card').fadeIn().delay(2000);
                        $(".comment_card").load(location.href + " .comment_card");
                        $('#comment').val(' ');
                    });
                    
                     $('.submit_comment').fadeOut(2000, function() {
                         $('.submit_comment').fadeIn().delay(2000);
                         $('.submit_comment').attr("disabled", false);
                     });
                    
                }
            });

        });

    });
</script>

