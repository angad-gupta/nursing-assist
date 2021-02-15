@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Learner's Portal</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home >> </a></li>
                        <li> <a href="{{ route('syllabus-detail',['course_info_id'=>$course_info_id]) }}">Syllabus >> </a></li>
                        <li> Resources [ {{$course_name}} ]</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="neta-about student-hub section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 neta-resources">

				<div class="row">
				    @if($resources->total() > 0)
				        @foreach($resources as $key => $value)
				            <div class="col-sm-12">
				                <div class="resource-box">
				                    <div class="row">
				                        <div class="col-sm-12 col-md-8">
				                            <h6>{{ $value->title }}</h6>
				                            <p>{!! $value->description !!} </p>
				                        </div>
				                        <div class="col-sm-12 col-md-4">
				                            <div class="downloads"> 
				                                <a target="_blank" href="{{ route('student-resources-view',['resources_id'=>$value->id]) }}" class="btn btn-neta float-right" style="background: #B0117E;color: white;"><b><i class="fa fa-eye"></i></b>View</a>

				                            </div>
				                        </div>
				                    </div>
				                </div>

				            </div>
				        @endforeach
				    @else
				        <span>No Resources Added</span>
				    @endif                           
				</div>

			</div>
		</div>
	</div>
</section>

<section class="section-padding"></section>

@include('home::layouts.footer')