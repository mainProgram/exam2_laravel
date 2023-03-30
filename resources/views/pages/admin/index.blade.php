@extends('layouts.app2')

@section('title', 'Admin')

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
@stop