@extends('layouts.app')

@section('title', 'Chauffeur')

@section('content')
    <section class="about_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-7 offset-lg-2 offset-md-1">
                    <div class="detail-box">
                        <p class="text-center">
                            <i class="fa-solid fa-car fa-4x j"></i>
                        </p>
                        <h4 class="my-3 j text-center">Bienvenue sur le réseau SAMA TAXI</h4>
                        <p class="my-5">
                            Rejoignez-nous et augmentez
                            vos revenus tout en gérant votre
                            emploi du temps simplement.               
                        </p>
                        <p class="d-flex justify-content-center">
                            <a href="{{ route('register.index', "chauffeur") }}" class="btn btn-outline-dark">Devenir chauffeur SAMA TAXI</a>
                        </p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="img-box">
                        <img src="{{ URL::asset('assets/images/about-img.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="service_section layout_padding">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="heading_container">
                    <h2>Comment ca marche ?</h2>
                </div>
            </div>
            <div class="service_container">
                <div class="box">
                    <div class="img-box">
                        <img src="{{ URL::asset('assets/images/delivery-man.png')}}" alt="">
                    </div>
                    <div class="detail-box">
                        <p>
                            Inscrivez-vous via notre<br>
                            plateforme. Une fois votre<br>
                            dossier validé, vous<br>
                            recevrez vos identifiants.
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ URL::asset('assets/images/airplane.png')}}" alt="">
                    </div>
                    <div class="detail-box">
                        <p>
                            Téléchargez l’application Faster Pro<br>
                            puis saisissez vos identifiants. Suivez<br>
                            toutes les instructions d’utilisation de<br>
                            l’application. 
                        </p>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                        <img src="{{ URL::asset('assets/images/backpack.png')}}" alt="">
                    </div>
                    <div class="detail-box">
                        <p>
                            Vous êtes prêt à prendre<br>
                            vos nouvelles fonction.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop