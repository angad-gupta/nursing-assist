
@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
            <h1 class="mb-0">Agents</h1>
            <ul class="list-unstyled d-flex">
                <li> <a href="{{ route('home') }}">Home  >> </a></li>
                <li>Agents </li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>



<section class="neta-agent neta-about section-padding">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="ttl-line">Find Our Agents
                </h2>
           <!--  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia reiciendis quas minus est eligendi laboriosam minima? Pariatur eveniet nesciunt praesentium natus minima. Pariatur porro aperiam natus aliquam, ullam maiores quidem?</p> -->
        </div>

         @if(sizeof($agent)>0)
            @foreach($agent as $key => $agent_val)
              <div class="col-sm-12 col-md-6 col-lg-4">
                  <div class="neta-agent__content">
                    <h5><i class="fa fa-user-circle-o" aria-hidden="true"></i> {{ $agent_val->agent_name }}</h5>
                    <ul class="list-unstyled">
                        <li>
                            <i class="fa fa-user"></i> <span>{{ $agent_val->contact_person }}</span> 
                        </li>

                        <li>
                          <i class="fa fa-phone"></i> <span>{{ $agent_val->contact_number }}</span> 
                      </li>

                      <li>
                          <i class="fa fa-envelope"></i> <span>{{ $agent_val->email }}</span> 
                      </li>

                      <li>
                          <i class="fa fa-map-marker"></i> <span>{{ $agent_val->address }}</span> 
                      </li>

                    </ul>
                  </div>
              </div>
            @endforeach
        @endif

    </div>
</div>
</section>

<section class="section-padding pb-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="doyou">
                    <p>Do you want to enrol a student?</p>
                    <a href="{{ route('enrolment',['course_info_id'=>'4']) }}" class="btn">Enrol Student</a>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="doyou2">
                    <p>Do you want to download our promotional kit? </p>
                    <a  target="_blank" href="{{asset('admin/oba_download.jpg')}}" class="btn">Download Now</a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="neta-download">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <p>Do you want to be an agent?</p>
            </div>
            <div class="col-sm-4">
                <button class="btn btn-neta float-right"><a href="{{ route('contact-us') }}">Contact Now</a></button>
            </div>
        </div>
    </div>
</section>




<section class="section-padding"></section>

@include('home::layouts.footer')