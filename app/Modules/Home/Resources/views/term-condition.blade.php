@include('home::layouts.navbar-inner')


<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">Terms and  Conditions</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home  >> </a></li>
                        <li>Terms & Conditions</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="courses-wrap">
    <div class="container section-padding">
        <div class="row">
            <div class="col-sm-12">
                <div class="courses-wrap__content neta-about">
                    <h2 class="ttl-line">Terms & Conditions</h2>
                    <div class="oba-introduction b-line">
                       {!! ($terms_and_conditions['short_content']) ? $terms_and_conditions['short_content'] : $terms_and_conditions['description'] !!}    

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@include('home::layouts.footer')