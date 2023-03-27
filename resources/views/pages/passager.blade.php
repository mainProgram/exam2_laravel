@extends('layouts.app')

@section('title', 'Passagers')

@section('content')
    <section class="about_section layout_padding">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-7 offset-lg-2 offset-md-1">
                    <div class="detail-box">
                        <p class="text-center">
                            <i class="fa-solid fa-person-walking-luggage fa-4x j"></i>
                        </p>
                        <h4 class="my-3 j"> SAMA TAXI prend soin de ses passagers</h4>
                        <p class="my-3">
                            Faster est le service VTC à la demande qui
                            vous accompagnera en toute sécurité dans
                            tous vos déplacements locaux.               
                        </p>
                        <p class="d-flex justify-content-center">
                            <a href="{{ route('register.index', "passager") }}" class="btn btn-outline-dark">INSCRIPTION</a>
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
        </div>
    </section>

    <section class="service_section layout_padding" id="pe">
        <div class="container w-50">
            <div class="d-flex justify-content-center">
                <div class="heading_container">
                    <h2>Nos prix et engagements</h2>
                </div>
            </div>
            <div class="service_container">
                <div class="box">
                    <button type="button" class="btn btn-outline-dark" data-bs-toggle="collapse" data-bs-target="#collapseOne">Nos prix</button>
                    <div class="detail-box collapse" id="collapseOne">
                        <p>
                            Nos tarifs sont calculés en fonction de<br>
                            la distance de la course et des<br>
                            éventuels événements de circulation.<br>
                            Avant chaque validation de votre<br>
                            course, le montant estimé de votre<br>
                            course sera indiqué.   
                        </p>
                    </div>
                </div>
                <div class="box">
                    <button type="button"  class="btn btn-outline-dark" data-bs-toggle="collapse" data-bs-target="#collapse2">Nos engagements</button>
                    <div class="detail-box collapse" id="collapse2">
                        <h4>Sécurité</h4>
                        <h4>Ponctualité</h4>
                        <h4>Discrétion</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop