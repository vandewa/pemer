<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('front.index') }}" class="logo">
                        <img src="{{ asset('chain/assets/images/logo2.png') }}" alt="Chain App Dev">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ route('front.index') }}" class="active">Home</a></li>
                        <!-- <li class="scroll-to-section"><a href="#pricing">Pricing</a></li>
                        <li class="scroll-to-section"><a href="#newsletter">Newsletter</a></li> -->
                        <li>
                            @guest
                            <div class="gradient-button"><a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> Sign In Now</a></div>
                            @else
                            <div class="gradient-button"><a href="{{ route('home') }}"><i class="fa fa-sign-in-alt"></i>Dashboard</a></div>
                            @endguest
                        </li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
