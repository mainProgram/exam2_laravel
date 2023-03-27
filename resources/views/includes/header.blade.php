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
                <a class="nav-link" href="{{ route('about')}}">A propos</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ route('passager.index')}}" data-bs-toggle="dropdown">Passagers</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('passager.index')}}">Comment ca marche ?</a></li>
                <li><a class="dropdown-item" href="{{ route('passager.index')}}#pe">Nos prix & engagements</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link  dropdown-toggle" href="{{ route('chauffeur.index')}}" data-bs-toggle="dropdown">Chauffeurs</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('chauffeur.index')}}">Comment ca marche ?</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link  dropdown-toggle" href="{{ route('business.index')}}" data-bs-toggle="dropdown">Business</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ route('business.index')}}">Comment ca marche ?</a></li>
                <li><a class="dropdown-item" href="{{ route('business.index')}}#nf">Nos forfaits</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">Inscription</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Compte passager</a></li>
                <li><a class="dropdown-item" href="#">Compte chauffeur</a></li>
                <li><a class="dropdown-item" href="#">Compte business</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>