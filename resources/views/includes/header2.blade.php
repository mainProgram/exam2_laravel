<header class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="{{ route('home') }}">
        <span>Sama Taxi</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home')}}">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('endroit.index')}}">Endroits</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('itineraire.index')}}">Itinéraires</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('course.index')}}">Courses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('passagers.index')}}">Passagers</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('chauffeur.index')}}">Chauffeurs</a>
            </li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button class="btn btn-outline-dark" type="submit">Déconnexion</button>
                </form>
              </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>