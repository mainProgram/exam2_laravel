@extends('layouts.app')

@section('title', 'A propos')

@section('content')
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
                        <img src="{{ URL::asset('assets/images/about-img.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop