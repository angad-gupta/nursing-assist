@include('home::layouts.navbar-inner')


<section class="neta-ribbon">
    <img src="img/cc.jpg" class="img-fluid" alt="">
    <div class="container">
        <div class="row">
            <div class="neta-ribbon__content">
                <div class="col-sm-12">
                    <h1 class="mb-0">User Agreement</h1>
                    <ul class="list-unstyled d-flex">
                        <li> <a href="{{ route('home') }}">Home  >> </a></li>
                        <li>User Agreement</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="courses-wrap section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                   <div class="courses-wrap__content neta-about">
                    <h2 class="ttl-line">User Agreement</h2>
                    <div class="oba-introduction b-line neta-bullet neta-font">
                        {!! ($user_agreement['short_content']) ? $user_agreement['short_content'] : $user_agreement['description'] !!}

                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

@include('home::layouts.footer')