@extends('layouts.app2')
@section('content')
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
                @if(session()->has('success'))
                    <div class="alert alert-success" id="alert">{{ session()->get('success') }}</div>
                @endif
                <div class="slider_form">
                    <h5 class="text-white">Ajout d'un nouveau passager <a href="{{ route('passagers.index') }}"><i class="fa fa-list"></i></a></h5>
                    <form method="POST" action="{{ route('passagers.store') }}">
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
                        @error('telephone')<span class="text-danger">{{ $message }}</span>@enderror
                        <div class="btm_input">
                            <input type="text" placeholder="Téléphone" name="telephone">
                            <button>Ajouter</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end slider section -->
</div>
@stop
