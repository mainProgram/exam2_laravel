@extends('layouts.app')

@section('title', 'Business')

@section('content')
    <section class="about_section layout_padding" id="#cmm">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-7 offset-lg-2 offset-md-1">
                    <div class="detail-box">
                        <p class="text-center">
                            <i class="fa-solid fa-business-time fa-4x j"></i>                        
                        </p>
                        <h4 class="my-3 j">Entre lieux de rendez-vous éloignés,
                            temps restreint entre 2 rendez-vous ou
                            encore voyages d’affaires. 
                        </h4>
                        <p class="my-3">
                            Nos solutions Faster Business répondent
                            à toutes vos problématiques de mobilité.               
                        </p>
                        <p class="d-flex justify-content-center">
                            <a class="btn btn-outline-dark" href="#nf">Découvrez les offres Faster Business</a>
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

    <section class="service_section layout_padding" id="nf">
        <div class="container w-50">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between my-3">
                        <h1 class="card-title j">Smart</h1>
                        <span class="px-1 text-center" style="background-color: lightgray; font-weight:bold; border-radius:5px;">Offre sur mesure <br>et sans engagement</span>
                    </div>
                  <h6 class="card-subtitle mb-2 text-muted">Intégrer les règles de déplacement en VTC et pilotez les dépenses de transport de votre entreprise</h6>
                  <p class="card-text">
                    <ul>
                        <li class="mb-2">Commande avec profil business ou personnel</li>
                        <li class="mb-2">Commande avec profil business ou personnel</li>
                        <li class="mb-2">Commande avec profil business ou personnel</li>
                        <li class="mb-2">Commande avec profil business ou personnel</li>
                        <li class="mb-2">Commande avec profil business ou personnel</li>
                        <li class="mb-2">Commande avec profil business ou personnel</li>
                        <li class="mb-2">Commande avec profil business ou personnel</li>
                        <li class="mb-2">Commande avec profil business ou personnel</li>
                        <li class="mb-5">Commande avec profil business ou personnel</li>
                    </ul>
                  </p>
                  <a href="#contact" class="btn btn-outline-dark w-100">Contacter notre équipe</a>
                </div>
              </div>
        </div>
    </section>

    <section class="service_section layout_padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col bg-dark p-5" style="color: white;">
                    <h2>En savoir plus sur KAPTEN BUSINESS</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium enim obcaecati aliquam, itaque minus cum laborum, adipisci tempore repellendus tenetur, illo quo saepe id. Odio repellat quos necessitatibus nihil numquam!</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas qui, velit, sapiente nostrum tempore culpa id ducimus dolorem corrupti ratione assumenda ipsum voluptates inventore ullam nesciunt ea illum molestiae enim?</p>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fuga illo doloribus cum reiciendis tempora excepturi, eligendi temporibus perspiciatis ipsum tenetur inventore reprehenderit. Qui eveniet molestias voluptates, veniam quos fuga eos.</p>
                </div>
                <div class="col">
                    <div class="contact">
                        <form class="row px-2">
                            <div class="col-md-6 mb-4">
                              <label for="validationCustom01" class="form-label">Prénom</label>
                              <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                            </div>
                            <div class="col-md-6 mb-4">
                              <label for="validationCustom02" class="form-label">Nom</label>
                              <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom01" class="form-label">Email</label>
                                <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
                              </div>
                              <div class="col-md-6 mb-4">
                                <label for="validationCustom02" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
                              </div>
                            <div class="col-md-12 mb-4">
                              <label for="validationCustom05" class="form-label">Nom de l'entreprise</label>
                              <input type="text" class="form-control" id="validationCustom05" required>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom04" class="form-label">Nombre d'employé</label>
                                <select class="form-control" id="validationCustom04" required>
                                  <option selected disabled value="">Veuiller sélectionner</option>
                                  <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label for="validationCustom04" class="form-label">Secteur d'activité</label>
                                <select class="form-control" id="validationCustom04" required>
                                  <option selected disabled value="">Veuiller sélectionner</option>
                                  <option>...</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-4">
                                <label for="validationCustom05" class="form-label">Message</label>
                                <textarea name="" id="" class="form-control"></textarea>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-dark" type="submit">Envoyer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop