
@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
            <h1 class="mb-0">FAQ</h1>
            <ul class="list-unstyled d-flex">
                <li> <a href="{{ route('home') }}">Home  >> </a></li>
                <li> <a href="#">FAQ</a></li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>

<section class="neta-about section-padding">
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="ttl-line">Frequently Asked Question(FAQ)
                </h2>
                <div class="accordion" id="accordionExample">

                    @if(sizeof($faq)>0)
                        @foreach($faq as $key => $faq_val)   

                            @php
                                $collapse = ($key == 0) ? 'collapsed' : '';
                                $collapse_show = ($key == 0) ? 'show' : '';
                            @endphp
                            <div class="card">
                                <div class="card-header {{ $collapse }}" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true">     
                                    <span class="title">Q. {{ $faq_val->question }}</span>
                                </div> 
                                <div id="collapse{{$key}}" class="collapse {{ $collapse_show }}" data-parent="#accordionExample">
                                    <div class="card-body">
                                      <p>A. {{ $faq_val->answer }}</p>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>
                
        </div>
        
    </div>
</div>
</section>

<section class="section-padding"></section>
@include('home::layouts.footer')