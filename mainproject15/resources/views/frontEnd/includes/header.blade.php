<!--Header Area Start-->
<header class="header_section">
    <!--Main Menu Area Start-->
    <div class="main-menu-area">
        <nav class="navbar navbar-inverse hidden-xs" data-spy="affix" data-offset-top="2">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand navbar-left visible-xs" href="{{url('/')}}"><img src="{{asset('public/frontEnd/img/logo.png')}}" alt="Logo Here" class="img-responsive"></a>
            </div>

            <div class="container">

                <div class="navbar-collapse collapse text-uppercase">

                    <a class="navbar-brand navbar-left hidden-xs" href="{{url('/')}}"><img src="{{asset('public/frontEnd/img/logo.png')}}" alt="Logo Here" class="img-responsive"></a>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="{{route('know-us.index')}}">Know US</a>
                            <ul class="sub-menu text-center">
                                <li><a href="{{route('about-us.index')}}"><h5>About Us</h5><img src="{{asset('public/frontEnd/img/know-us-icon/about-us.png')}}" alt="About Us"></a></li>
                                <li><a href="{{route('history.index')}}"><h5>History</h5><img src="{{asset('public/frontEnd/img/know-us-icon/history.png')}}" alt="History"></a></li>
                                <li><a href="{{route('sister-concern.index')}}"><h5>Sister Concerns</h5><img src="{{asset('public/frontEnd/img/know-us-icon/sister-concern.png')}}" alt="Sister Concerns"></a></li>
                                <li><a href="{{route('management.index')}}"><h5>Management</h5><img src="{{asset('public/frontEnd/img/know-us-icon/management.png')}}" alt="Management"></a></li>
                                <li><a href="{{route('achievement.index')}}"><h5>Achievements</h5><img src="{{asset('public/frontEnd/img/know-us-icon/achievement.png')}}" alt="Logistics and Support"></a></li>
                                <li><a href="{{route('csr.index')}}"><h5>CSR</h5><img src="{{asset('public/frontEnd/img/know-us-icon/csr.png')}}" alt="CSR Heading"></a></li>
                                <li><a href="{{route('sustain.index')}}"><h5>Sustainability</h5><img src="{{asset('public/frontEnd/img/know-us-icon/sustainability.png')}}" alt="CSR Heading"></a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('brand.index')}}">Brands</a>
                            <ul class="sub-menu text-center">
                                @foreach($brands as $brand)
                                <li><a href="{{route('brand.show',$brand->id)}}"><img src="{{asset($brand->brand_logo2)}}" alt="{{asset($brand->brand_logo2)}}"></a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{route('media.index')}}">Media</a>
                            <ul class="sub-menu text-center">
                                <li><a href="{{route('news-event.index')}}"><h5>News & Events</h5><img src="{{asset('public/frontEnd/img/news&events-img/news&events-small.png')}}" alt="News and Events"></a></li>
                                <li><a href="{{route('commercial.index')}}"><h5>Commercials</h5><img src="{{asset('public/frontEnd/img/news&events-img/commercials-small.png')}}" alt="Commercials"></a></li>
                                <li><a href="{{route('press-release.index')}}"><h5>Press Releases</h5><img src="{{asset('public/frontEnd/img/news&events-img/press_releases-small.png')}}" alt="Press Releases"></a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('career.index')}}">Career</a></li>
                        <li><a href="{{route('contact-us.index')}}">Contact Us</a></li>

                        <form class="navbar-form navbar-right" action="javascript:void(0)" method="post">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search...">
                                <div class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </ul>

                </div>
                <!--/.navbar-collapse -->
            </div>
        </nav>

        <!-- Mobile Menu Start -->
        <nav class="mobile_menu hidden">
            <a href="{{route('index')}}"><img class="mobile-logo" src="{{asset('public/frontEnd/img/logo.png')}}" alt="Citygroup"></a>
            <ul class="nav navbar-nav navbar-right menu">
                <li class="active">
                    <a href="{{route('know-us.index')}}">Know Us</a>
                    <ul class="sub_menu">
                        <li><a href="{{route('about-us.index')}}">About Us</a></li>
                        <li><a href="{{route('history.index')}}">History</a></li>
                        <li><a href="{{route('sister-concern.index')}}">Sister Concerns</a></li>
                        <li><a href="{{route('management.index')}}">Management</a></li>
                        <li><a href="{{route('achievement.index')}}">Achievements</a></li>
                        <li><a href="{{route('csr.index')}}">CSR</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('brand.index')}}">Brands</a>
                        <ul class="sub_menu">
                            @foreach($brands as $brand)
                            <li><a href="{{route('brand.show',$brand->id)}}"><img src="{{asset($brand->brand_logo)}}" alt="{{asset($brand->brand_logo)}}" width="105" height="69"></a></li>
                            @endforeach
                        </ul>
                </li>
                <li>
                    <a href="{{route('media.index')}}">Media</a>
                        <ul class="sub_menu">
                            <li><a href="{{route('news-event.index')}}">News & Events</a></li>
                            <li><a href="{{route('commercial.index')}}">Commercials</a></li>
                            <li><a href="{{route('press-release.index')}}">Press Releases</a></li>
                        </ul>
                </li>
                <li><a href="{{route('career.index')}}">Career</a></li>
                <li><a href="{{route('contact-us.index')}}">Contact Us</a></li>
            </ul>
        </nav>
        <!-- Mobile Menu End -->

    </div>
    <!--Main Menu Area End-->

</header>
<!--Header Area End -->