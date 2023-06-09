<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        <div class="hero_area">
            <!-- slider section -->
            <section class="slider_section">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-7 ">
                            <div class="box">
                                <div class="detail-box">
                                    <h4>Bienvenue chez</h4>
                                    <h1>SAMA TAXI</h1>
                                </div>
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                                </ol>
                                <div class="carousel-inner">
                                <div class="carousel-item active">

                                    <div class="img-box">
                                    <img src="{{ URL::asset('assets/images/slider-img.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-box">
                                    <img src="{{ URL::asset('assets/images/slider-img.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-box">
                                    <img src="{{ URL::asset('assets/images/slider-img.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-box">
                                    <img src="{{ URL::asset('assets/images/slider-img.png')}}" alt="">
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="img-box">
                                    <img src="{{ URL::asset('assets/images/slider-img.png')}}" alt="">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 ">
                        <div class="slider_form">
                            <h4>Connexion</h4>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <input type="text" placeholder="Email" name="email">
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                <input type="password" placeholder="Mot de passe" name="password">
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                <div class="btm_input">
                                    <button class="p-2">Se connecter</button>
                                </div>
                                <a href="{{ route('register.index', "passager")}}" class="j" style="font-size: 12px;">Pas de compte ? S'inscrire</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end slider section -->
        </div>
        <!-- owl carousel script -->
        <script type="text/javascript">
            $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 20,
            navText: [],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                items: 1
                },
                768: {
                items: 2
                },
                1000: {
                items: 2
                }
            }
            });
        </script>
        <!-- end owl carousel script -->
    </body>
</html>
