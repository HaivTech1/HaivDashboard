<!doctype html>
<html lang="en">    
<head>
        
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta property="description" content="@yield('description')" />
    <meta property="keywords" content="@yield('keywords')" />

    {{-- facebook Meta --}}
    <meta property="og:description" content="@yield('description')" />
    <meta property="og:image" content="@yield('metaImage')" />
    <meta property="og:image:type" content="image/jpeg" />


    {{-- twitter Meta --}}
    <meta property="twitter:card" content="@yield('summary_large_image')" />
    <meta property="twitter:site" content="{{ config('services.twitter.handle') }}" />
    <meta property="twitter:image" content="@yield('metaImage')" />
    <meta property="twitter:description" content="@yield('description')" />
    <meta property="twitter:title" content="@yield('title')" />
    <meta name="theme-color" content="#6777ef" />

    {{-- Title --}}
    <title>@yield('title', ''.application('name'))</title>

      

        <title>{{ config('app.name', 'Colony') }}</title>

        @include('partials.style')

    </head>

    <body data-bs-spy="scroll" data-bs-target="#topnav-menu" data-bs-offset="60">

        <nav class="navbar navbar-expand-lg navigation fixed-top sticky">
            <div class="container">
                <a class="navbar-logo" href="index.html">
                    <img src="{{ asset('storage/'.application('image'))}}" alt="{{ application('name')}}" height="29" class="logo logo-dark">
                    <img src="{{ asset('storage/'.application('image'))}}" alt="{{ application('name')}}" height="29" class="logo logo-light">
                </a>

                <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item waves-effect waves-light" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
              
                <div class="collapse navbar-collapse" id="topnav-menu-content">
                    <ul class="navbar-nav ms-auto" id="topnav-menu" >
                        <li class="nav-item">
                            <a class="nav-link active" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#roadmap">Roadmap</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#team">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faqs">FAQs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contact</a>
                        </li>

                    </ul>

                    <div class="my-2 ms-lg-2">
                        @if (Route::has('login'))
                        @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary w-xs">Dashboard</a>
                        @else
                        <a href="{{ url('/login') }}" class="btn btn-primary w-xs">Log in</a>
                        @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- hero section start -->
        <section class="section hero-section bg-ico-hero" id="home">
            <div class="bg-overlay bg-secondary"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <div class="text-white-50">
                            <h1 class="text-white fw-semibold mb-3 hero-title">{{ application('name')}} - {{ application('motto')}}</h1>
                            <p class="font-size-14">{{ application('description')}}</p>
                            
                            <div class="d-flex flex-wrap justify-content-between gap-2 mt-4">
                                <a href="#about" class="social-list-item bg-white text-white">
                                    <i class="bx bx-caret-down text-primary font-size-20 mt-1"></i>
                                </a>

                                <div>
                                    <button type="button" type="button" data-bs-toggle="offcanvas" data-bs-target="#goContact" aria-controls="goContact" class="btn btn-primary text-secondary fw-semibold ">Explore More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-8 col-sm-10 ms-lg-auto">
                        <div class="card overflow-hidden mb-0 mt-5 mt-lg-0">
                            <div class="card-header text-center bg-primary">
                                <h5 class="mb-0 text-white font-bold">Countdown to Colony</h5>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    
                                    <h5>Time left to lunching :</h5>
                                    <div class="mt-4">
                                        <div data-countdown="2022/12/1" class="counter-number ico-countdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- hero section end -->
        
        <!-- currency price section start -->
        <section class="section bg-white p-0">
            <div class="container">
                <div class="currency-price">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-warning bg-soft text-warning font-size-18">
                                                    <i class="mdi mdi-bitcoin"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted">Bitcoin</p>
                                            <h5>$ 9134.39</h5>
                                            <p class="text-muted text-truncate mb-0">+ 0.0012.23 ( 0.2 % ) <i class="mdi mdi-arrow-up ms-1 text-success"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-primary bg-soft text-primary font-size-18">
                                                    <i class="mdi mdi-ethereum"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted">Ethereum</p>
                                            <h5>$ 245.44</h5>
                                            <p class="text-muted text-truncate mb-0">- 004.12 ( 0.1 % ) <i class="mdi mdi-arrow-down ms-1 text-danger"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <div class="avatar-xs">
                                                <span class="avatar-title rounded-circle bg-info bg-soft text-info font-size-18">
                                                    <i class="mdi mdi-litecoin"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="text-muted">Litecoin</p>
                                            <h5>$ 63.61</h5>
                                            <p class="text-muted text-truncate mb-0">+ 0.0001.12 ( 0.1 % ) <i class="mdi mdi-arrow-up ms-1 text-success"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- currency price section end -->

        <!-- about section start -->
        <section class="section pt-4 bg-white" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="small-title">About us</div>
                            <h4>What our brand says!</h4>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="col-lg-5">
  
                        <div class="text-muted">
                            <h4>{{ application('motto') }}</h4>
                            <p>At HaivTech we dash through great length to see that our 
                                clients achieve unique results. The Haiv is a special naming 
                                from the word “Hive”. Hexagon, i.e 6 bounded polygon are 
                                related to the “bee-comb” and the HaivTech mark is based 
                                on 2 half hexagons.</p>
                            <p class="mb-4">One represent our client and the other represent us going 
                                through length and degrees to prove we are valuable assets 
                                through our unique experience and dynamic approach</p>

                            {{-- <div class="d-flex flex-wrap gap-2">
                                <a href="javascript: void(0);" class="btn btn-success">Read More</a>
                                <a href="javascript: void(0);" class="btn btn-outline-primary">How It work</a>
                            </div> --}}
                            
                            <div class="row mt-4">
                                <div class="col-lg-4 col-6">
                                    <div class="mt-4">
                                        <h4>$ 6.2 M</h4>
                                        <p>Invest amount</p>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-6">
                                    <div class="mt-4">
                                        <h4>16245</h4>
                                        <p>Users</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 ms-auto">
                        <div class="mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <i class="mdi mdi-bitcoin h2 text-success"></i>
                                            </div>
                                            <h5>Business Development</h5>
                                            <p class="text-muted mb-0">At vero eos et accusamus et iusto blanditiis</p>
        
                                        </div>
                                        <div class="card-footer bg-transparent border-top text-center">
                                            <a href="javascript: void(0);" class="text-primary">Learn more</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card border mt-lg-5">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <i class="mdi mdi-wallet-outline h2 text-success"></i>
                                            </div>
                                            <h5>Wallet</h5>
                                            <p class="text-muted mb-0">Quis autem vel eum iure reprehenderit</p>
        
                                        </div>
                                        <div class="card-footer bg-transparent border-top text-center">
                                            <a href="javascript: void(0);" class="text-primary">Learn more</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
        </section>
        <!-- about section end -->

        <!-- Features start -->
        <section class="section" id="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="small-title">Features</div>
                            <h4>Key features of the product</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row align-items-center pt-4">
                    <div class="col-md-6 col-sm-8">
                        <div>
                            <img src="{{ asset('images/crypto/features-img/img-1.png') }}" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                    <div class="col-md-5 ms-auto">
                        <div class="mt-4 mt-md-auto">
                            <div class="d-flex align-items-center mb-2">
                                <div class="features-number fw-semibold display-4 me-3">01</div>
                                <h4 class="mb-0">Business Development</h4>
                            </div>
                            <p class="text-muted">If several languages coalesce, the grammar of the resulting language is more simple and regular than of the individual will be more simple and regular than the existing.</p>
                            <div class="text-muted mt-4">
                                <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel aliquet</p>
                                <p><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row align-items-center mt-5 pt-md-5">
                    <div class="col-md-5">
                        <div class="mt-4 mt-md-0">
                            <div class="d-flex align-items-center mb-2">
                                <div class="features-number fw-semibold display-4 me-3">02</div>
                                <h4 class="mb-0">Wallet</h4>
                            </div>
                            <p class="text-muted">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend.</p>
                            <div class="text-muted mt-4">
                                <p class="mb-2"><i class="mdi mdi-circle-medium text-success me-1"></i>Donec pede justo vel aliquet</p>
                                <p><i class="mdi mdi-circle-medium text-success me-1"></i>Aenean et nisl sagittis</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  col-sm-8 ms-md-auto">
                        <div class="mt-4 me-md-0">
                            <img src="{{ asset('images/crypto/features-img/img-2.png')}}" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>
                    
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Features end -->

        <!-- Roadmap start -->
        <section class="section bg-white" id="roadmap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="small-title">Timeline</div>
                            <h4>Our Roadmap</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row mt-4">
                    <div class="col-lg-12">
                        <div class="hori-timeline" dir="ltr">
                            <div class="owl-carousel owl-theme events navs-carousel" id="timeline-carousel">
                               
                                @foreach ($events as $event)
                                    <div class="item event-list @if($event->category() === 'bg-success') active @endif">
                                        <div>
                                            <div class="event-date">
                                                <div class="text-primary mb-1">{{ $event->startDate() }}</div>
                                                <h5 class="mb-4">{{ $event->title() }}</h5>
                                            </div>
                                            <div class="event-down-icon">
                                                <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                            </div>

                                            <div class="mt-3 px-3">
                                                <p class="text-muted">{{ $event->description() }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Roadmap end -->

        <!-- Team start -->
        <section class="section" id="team">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="small-title">Team</div>
                            <h4>Meet our team</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="col-lg-12">
                    <div class="owl-carousel owl-theme events navs-carousel" id="team-carousel" dir="ltr">
                        @foreach ($pioneers as $pioneer)
                            <div class="item">
                                <div class="card text-center team-box">
                                    <div class="card-body">
                                        <div>
                                            <img src="{{ $pioneer->author()->image() ? $pioneer->author()->image() : '/haivimage.jpg' }}" alt="{{ $pioneer->author()->name() }}" class="rounded">
                                        </div>
        
                                        <div class="mt-3">
                                            <h5>{{ $pioneer->author()->name() }}</h5>
                                            <P class="text-muted mb-0">{{ $pioneer->designation() }}</P>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-transparent border-top">
                                        <div class="d-flex mb-0 team-social-links">
                                            <div class="flex-fill">
                                                <a href="https://facebook.com/{{ $pioneer->facebook() }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Facebook">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="https://facebook.com/{{ $pioneer->linkedin() }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Linkedin">
                                                    <i class="mdi mdi-linkedin"></i>
                                                </a>
                                            </div>
                                            <div class="flex-fill">
                                                <a href="https://facebook.com/{{ $pioneer->twitter() }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Twitter">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </div>

                                            <div class="flex-fill">
                                                <a href="https://facebook.com/{{ $pioneer->instagram() }}" target="_blank" data-bs-toggle="tooltip" data-bs-placement="top" title="Instagram">
                                                    <i class="mdi mdi-instagram"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Team end -->
        
        <!-- Faqs start -->
        <section class="section" id="faqs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="small-title">FAQs</div>
                            <h4>Frequently Asked Questions</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="vertical-nav">
                            <div class="row">
                                <div class="col-lg-2 col-sm-4">
                                    <div class="nav flex-column nav-pills" role="tablist">
                                        <a class="nav-link active" id="v-pills-gen-ques-tab" data-bs-toggle="pill" href="#v-pills-gen-ques" role="tab">
                                            <i class= "bx bx-help-circle nav-icon d-block mb-2"></i>
                                            <p class="fw-bold mb-0">General Questions</p>
                                        </a>
                                        <a class="nav-link" id="v-pills-token-sale-tab" data-bs-toggle="pill" href="#v-pills-token-sale" role="tab"> 
                                            <i class= "bx bx-receipt nav-icon d-block mb-2"></i>
                                            <p class="fw-bold mb-0">Token sale</p>
                                        </a>
                                        <a class="nav-link" id="v-pills-roadmap-tab" data-bs-toggle="pill" href="#v-pills-roadmap" role="tab">
                                            <i class= "bx bx-timer d-block nav-icon mb-2"></i>
                                            <p class="fw-bold mb-0">Roadmap</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-sm-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="tab-content">
                                                <div class="tab-pane fade show active" id="v-pills-gen-ques" role="tabpanel">
                                                    <h4 class="card-title mb-4">General Questions</h4>
                                                    
                                                    <div>
                                                        <div id="gen-ques-accordion" class="accordion custom-accordion">
                                                            <div class="mb-3">
                                                                <a href="#general-collapseOne" class="accordion-list" data-bs-toggle="collapse" aria-expanded="true"
                                                                    aria-controls="general-collapseOne">
                                                    
                                                                    <div>What is Lorem Ipsum ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                    
                                                                </a>
                                                    
                                                                <div id="general-collapseOne" class="collapse show" data-bs-parent="#gen-ques-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">Everyone realizes why a new common language would be desirable: one could refuse to
                                                                            pay expensive translators. To achieve this, it would be necessary to have uniform grammar,
                                                                            pronunciation and more common words.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                            <div class="mb-3">
                                                                <a href="#general-collapseTwo" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                    aria-expanded="false" aria-controls="general-collapseTwo">
                                                                    <div>Why do we use it ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="general-collapseTwo" class="collapse" data-bs-parent="#gen-ques-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">If several languages coalesce, the grammar of the resulting language is more simple
                                                                            and regular than that of the individual languages. The new common language will be more simple
                                                                            and regular than the existing European languages.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                            <div class="mb-3">
                                                                <a href="#general-collapseThree" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                    aria-expanded="false" aria-controls="general-collapseThree">
                                                                    <div>Where does it come from ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="general-collapseThree" class="collapse" data-bs-parent="#gen-ques-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">It will be as simple as Occidental; in fact, it will be Occidental. To an English
                                                                            person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me
                                                                            what Occidental.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                            <div>
                                                                <a href="#general-collapseFour" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                    aria-expanded="false" aria-controls="general-collapseFour">
                                                                    <div>Where can I get some ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="general-collapseFour" class="collapse" data-bs-parent="#gen-ques-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">To an English person, it will seem like simplified English, as a skeptical Cambridge
                                                                            friend of mine told me what Occidental is. The European languages are members of the same
                                                                            family. Their separate existence is a myth.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="v-pills-token-sale" role="tabpanel">
                                                    <h4 class="card-title mb-4">Token sale</h4>
                                                        
                                                    <div>
                                                        <div id="token-accordion" class="accordion custom-accordion">
                                                            <div class="mb-3">
                                                                <a href="#token-collapseOne" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                aria-expanded="false"
                                                                                aria-controls="token-collapseOne">
                                                                    <div>Why do we use it ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="token-collapseOne" class="collapse" data-bs-parent="#token-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <a href="#token-collapseTwo" class="accordion-list" data-bs-toggle="collapse"
                                                                                                aria-expanded="true"
                                                                                                aria-controls="token-collapseTwo">
                                                                    
                                                                    <div>What is Lorem Ipsum ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                    
                                                                </a>
                                        
                                                                <div id="token-collapseTwo" class="collapse show" data-bs-parent="#token-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
            
                                                            <div class="mb-3">
                                                                <a href="#token-collapseThree" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                aria-expanded="false"
                                                                                aria-controls="token-collapseThree">
                                                                    <div>Where can I get some ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="token-collapseThree" class="collapse" data-bs-parent="#token-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <a href="#token-collapseFour" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                aria-expanded="false"
                                                                                aria-controls="token-collapseFour">
                                                                    <div>Where does it come from ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="token-collapseFour" class="collapse" data-bs-parent="#token-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="v-pills-roadmap" role="tabpanel">
                                                    <h4 class="card-title mb-4">Roadmap</h4>
                                                        
                                                    <div>
                                                        <div id="roadmap-accordion" class="accordion custom-accordion">

                                                            <div class="mb-3">
                                                                <a href="#roadmap-collapseOne" class="accordion-list" data-bs-toggle="collapse"
                                                                                                aria-expanded="true"
                                                                                                aria-controls="roadmap-collapseOne">
                                                                    


                                                                    <div>Where can I get some ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                    
                                                                </a>
                                        
                                                                <div id="roadmap-collapseOne" class="collapse show" data-bs-parent="#roadmap-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="mb-3">
                                                                <a href="#roadmap-collapseTwo" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                aria-expanded="false"
                                                                                aria-controls="roadmap-collapseTwo">
                                                                    <div>What is Lorem Ipsum ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="roadmap-collapseTwo" class="collapse" data-bs-parent="#roadmap-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages.</p>
                                                                    </div>
                                                                </div>
                                                            </div>


            
                                                            <div class="mb-3">
                                                                <a href="#roadmap-collapseThree" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                aria-expanded="false"
                                                                                aria-controls="roadmap-collapseThree">
                                                                    <div>Why do we use it ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="roadmap-collapseThree" class="collapse" data-bs-parent="#roadmap-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is. The European languages are members of the same family. Their separate existence is a myth.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div>
                                                                <a href="#roadmap-collapseFour" class="accordion-list collapsed" data-bs-toggle="collapse"
                                                                                aria-expanded="false"
                                                                                aria-controls="roadmap-collapseFour">
                                                                    <div>Where does it come from ?</div>
                                                                    <i class="mdi mdi-minus accor-plus-icon"></i>
                                                                </a>
                                                                <div id="roadmap-collapseFour" class="collapse" data-bs-parent="#roadmap-accordion">
                                                                    <div class="card-body">
                                                                        <p class="mb-0">It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental.</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end vertical nav -->
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- Faqs end -->

       
        <section class="section bg-white" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mb-5">
                            <div class="small-title">Contact</div>
                            <h4>You can drop us a message:</h4>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-lg-6">
                        <form>
                           
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingnameInput" placeholder="Enter name">
                                        <label for="floatingnameInput">Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingnumberInput" placeholder="Enter phone number">
                                        <label for="floatingnumberInput">Phone Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingemailInput" placeholder="Enter Email address">
                                        <label for="floatingemailInput">Email address</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingmessageInput" placeholder="Enter message">
                                <label for="floatingmessageInput">Message</label>
                            </div>

                            <div>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Gallary</h4>
                                <p class="card-title-desc">A little glimpse from our archive. </p>

                                <div class="popup-gallery d-flex flex-wrap">
                                    @foreach ($galleries as $gallery)
                                        <a href="{{ $gallery->image() }}" title="{{ $gallery->title() }}">
                                            <div class="img-fluid">
                                                <img src="{{ $gallery->image() }}" alt="" width="120">
                                            </div>
                                        </a>
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> 
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>

        <!-- Footer start -->
        <footer class="landing-footer">
            <div class="container">

                {{-- <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Company</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="javascript: void(0);">About Us</a></li>
                                <li><a href="javascript: void(0);">Features</a></li>
                                <li><a href="javascript: void(0);">Team</a></li>
                                <li><a href="javascript: void(0);">News</a></li>
                                <li><a href="javascript: void(0);">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Resources</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="javascript: void(0);">Whitepaper</a></li>
                                <li><a href="javascript: void(0);">Token sales</a></li>
                                <li><a href="javascript: void(0);">Privacy Policy</a></li>
                                <li><a href="javascript: void(0);">Terms & Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Links</h5>
                            <ul class="list-unstyled footer-list-menu">
                                <li><a href="javascript: void(0);">Tokens</a></li>
                                <li><a href="javascript: void(0);">Roadmap</a></li>
                                <li><a href="javascript: void(0);">FAQs</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="mb-4 mb-lg-0">
                            <h5 class="mb-3 footer-list-title">Latest Events</h5>
                            <div class="blog-post">
                                @foreach ($events as $event)
                                    <a href="javascript: void(0);" class="post">
                                        <div class="badge badge-soft-success font-size-11 mb-3">{{ $event->title() }}</div>
                                        <h5 class="post-title">{{ $event->excerpt() }}</h5>
                                        <p class="mb-0"><i class="bx bx-calendar me-1"></i> 04 Mar, 2020</p>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="footer-border my-5"> --}}

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-4">
                            <img src="{{ asset('images/logo-light.png') }}" alt="{{ application('name') }}" height="50">
                        </div>
                    </div>
                    <div class="col-lg-6">
                    
                        <p class="mb-2"><script>document.write(new Date().getFullYear())</script> © {{ application('name') }}. {{ application('motto') }}</p>
                        <p>{{ application('description') }}</p>
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a href="https://linkedin.com/{{ application('facebook') }}" target="_blank" class="social-list-item bg-primary text-white border-primary">
                                    <i class="mdi mdi-facebook"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://linkedin.com/{{ application('twitter') }}" target="_blank" class="social-list-item bg-primary text-white border-info">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="mailto:{{ application('email') }}" class="social-list-item bg-primary text-white border-danger">
                                    <i class="mdi mdi-google"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://linkedin.com/{{ application('instagram') }}" target="_blank" class="social-list-item bg-primary text-white border-info">
                                    <i class="mdi mdi-instagram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://linkedin.com/{{ application('linkedin') }}" target="_blank" class="social-list-item bg-primary text-white border-primary">
                                    <i class="mdi mdi-linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
            <!-- end container -->
        </footer>
        <!-- Footer end -->

        <div class="offcanvas offcanvas-end" tabindex="-1" id="goContact" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <h5 id="offcanvasRightLabel">Offcanvas Right</h5>
              <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              ...
            </div>
        </div>

        @include('partials.script')

    </body>

</html>
