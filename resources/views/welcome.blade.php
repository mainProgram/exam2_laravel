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
                            <h4>
                                Le vtc local qui vous accompagne en toute sécurité
                                dans tous vos trajets.
                            </h4>
                            <div class="btn-box">
                                <a href="">
                                    <img src="{{ URL::asset('assets/images/playstore.png')}}" alt="">
                                </a>
                                <a href="">
                                    <img src="{{ URL::asset('assets/images/appstore.png')}}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end slider section -->
        </div>

        <!-- service section -->
        <section class="service_section layout_padding">
            <div class="container">
            <div class="heading_container">
                <h2>Comment ca marche ?</h2>
            </div>
            <div class="service_container">
                <div class="box">
                <div class="img-box">
                    <img src="{{ URL::asset('assets/images/delivery-man.png')}}" alt="">
                </div>
                <div class="detail-box">
                    <p>
                        Activez l’application SAMA TAXI.<br>
                        Saisissez votre destination<br>
                        via géolocalisation puis<br>
                        validez le montant estimé<br>
                        de votre trajet.
                    </p>
                </div>
                </div>
                <div class="box">
                <div class="img-box">
                    <img src="{{ URL::asset('assets/images/airplane.png')}}" alt="">
                </div>
                <div class="detail-box">
                    <p>
                        Votre chauffeur SAMA TAXI,<br>
                        vous récupère et vous<br>
                        dépose en toute sécurité à<br>
                        la destination indiquée.
                    </p>
                </div>
                </div>
                <div class="box">
                <div class="img-box">
                    <img src="{{ URL::asset('assets/images/backpack.png')}}" alt="">
                </div>
                <div class="detail-box">
                    <p>
                        Recevez votre facture et<br>
                        noter votre trajet ainsi que<br>
                        votre chauffeur
                    </p>
                </div>
            </div>
            </div>
        </section>
        <!-- end service section -->

        <!-- about section -->
        <section class="about_section layout_padding">
            <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-5 offset-lg-2 offset-md-1">
                <div class="detail-box">
                    <h2 class="my-3"> A propos de SAMA TAXI</h2>
                    <h4>Le meilleur choix de transport
                        pour une agréable journée. 
                    </h4>
                    <p class="mt-3">
                        SAMA TAXI est le service VTC à la demande qui
                        vous accompagnera en toute sécurité dans
                        tous vos déplacements locaux.
                        <br>
                        <br>
                        Via l’application SAMA TAXI vous pourrez
                        commander votre chauffeur et vous déplacer
                        vers la destination de votre choix en indiquant
                        simplement la géolocalisation de votre
                        destination finale.                   
                    </p>
                </div>
                </div>
                <div class="col-md-6">
                <div class="img-box">
                    <img src="{{ URL::asset('assets/images//about-img.png')}}" alt="">
                </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end about section -->

        <!-- app section -->
        <section class="app_section layout_padding2">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img-box">
                            <img src="{{ URL::asset('assets/images/mobile.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-box">
                            <h2>Télécharger notre application</h2>
                            <div class="text-box">
                                <p>
                                    Nos solutions SAMA TAXI Business
                                    répondent à toutes vos problématiques
                                    de mobilité. 
                                </p>
                            </div>
                            <div class="text-box">
                                <p>
                                    Votre chauffeur SAMA TAXI,
                                    vous récupère et vous
                                    dépose en toute sécurité à
                                    la destination indiquée.                            
                                </p>
                            </div>
                            <div class="btn-box">
                            <a href="">
                                <img src="{{ URL::asset('assets/images/playstore.png')}}" alt="">
                            </a>
                            <a href="">
                                <img src="{{ URL::asset('assets/images/appstore.png')}}" alt="">
                            </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end app section -->

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