@include('home::layouts.navbar-inner')

<section class="neta-ribbon">
    <img src="{{asset('home/img/cc.jpg')}}" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
            <h1 class="mb-0">Sucess</h1>
            <ul class="list-unstyled d-flex">
                <li> <a href="{{ route('home') }}">Home</a></li>
                <li>Error</li>
            </ul>
        </div>
        </div>
           
        </div>
    </div>
</section>

<section class="neta-about section-padding">
<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <h2 class="ttl-line">Error!! Your transaction id is cancelled.
                </h2>
     
        </div>
        
        
    </div>
</div>
</section>


<section class="section-padding"></section>


@include('home::layouts.footer')
