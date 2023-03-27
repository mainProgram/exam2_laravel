<!DOCTYPE html>
<html>
    <head>
        @include('includes.head')
    </head>
    <body>
        <div class="hero_area">
            <!-- header section strats -->
            <header class="header_section">
                @include('includes.header')
            </header>
            <!-- end header section -->
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
                            <h4>Création d'un compte {{ $type }}</h4>
                            <form method="POST" action="{{ route('inscription', $type) }}">
                                @csrf
                                @error('prenom')<span class="text-danger">{{ $message }}</span>@enderror
                                <input type="text" placeholder="Prénom" name="prenom">
                                @error('nom')<span class="text-danger">{{ $message }}</span>@enderror
                                <input type="text" placeholder="Nom" name="nom">
                                @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                <input type="text" placeholder="Email" name="email">
                                @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                                <input type="password" placeholder="Mot de passe" name="password">
                                @error('password_confirmation')<span class="text-danger">{{ $message }}</span>@enderror
                                <input type="password" placeholder="Confirmer mot de passe" name="password_confirmation">
                                @if($type == "chauffeur")
                                    @error('ville')<span class="text-danger">{{ $message }}</span>@enderror
                                    <input type="text" placeholder="Ville" name="ville">
                                @elseif($type == "business")
                                    @error('nom_entreprise')<span class="text-danger">{{ $message }}</span>@enderror
                                    <input type="text" placeholder="Nom de l'entreprise" name="nom_entreprise">
                                    @error('nb_employe')<span class="text-danger">{{ $message }}</span>@enderror
                                    @error('secteur')<span class="text-danger">{{ $message }}</span>@enderror
                                    <div class="btm_input mb-3">
                                        <input type="text" placeholder="Secteur d'activité" name="secteur">
                                        <input type="number" placeholder="Nombre d'employés" name="nb_employe" min="2">
                                    </div>
                                @endif
                                @error('telephone')<span class="text-danger">{{ $message }}</span>@enderror
                                <div class="btm_input">
                                    <input type="text" placeholder="Téléphone" name="telephone">
                                    <button>S'inscrire</button>
                                </div>
                                <a href="{{ route('login')}}" class="j" style="font-size: 12px;">Déja un compte ? Se connecter</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end slider section -->
        </div>

        @include('includes.footer')

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