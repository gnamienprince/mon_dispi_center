<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-info"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
            target="_blank">
            <img src="{{ asset('img/logo.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">
                Dashboard
                <br>
              <center>  {{ auth()->user()->prenom }}</center>
            </span>
            
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="{{ route('home') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">home</i>
                    </div>
                    <span class="nav-link-text ms-1">Accueil</span>
                </a>
            </li>

            {{-- ouvrir un dossier patient --}}
            @if (Auth::user()->role == 'accueil')
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary"
                        href="{{ route('pageCreationComptePatient') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">group_add</i>
                        </div>
                        <span class="nav-link-text ms-1">Ouvrir un dossier patient</span>
                    </a>
                </li>
            @endif

            {{-- liste des patients --}}
            <li class="nav-item">
                <a class="nav-link text-white active bg-gradient-primary" href="{{ route('listePatient') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">format_list_bulleted</i>
                    </div>
                    <span class="nav-link-text ms-1">Liste des patients</span>
                </a>
            </li>

            @if (Auth::user()->role == 'medecin')
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ route('consultationAttente') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">access_time</i>
                        </div>
                        <span class="nav-link-text ms-1">Consultation en attente</span>
                    </a>
                </li>
            @endif

            {{-- créer une consultation    @if (Auth::user()->role == 'medecin')  --}}
            @if (Auth::user()->role == 'accueil')
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary"
                        href="{{ route('pageCreationHospitalisation') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">local_hospital</i>
                        </div>
                        <span class="nav-link-text ms-1">Hospitalisation</span>
                    </a>
                </li>
            @endif
            {{-- la partie hospitalisation accessible par les personnes qui sont chargé de faire les examens --}}

            @if (Auth::user()->role == 'examen')
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ route('pageExamenAttente') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">airline_seat_legroom_normal</i>
                        </div>
                        <span class="nav-link-text ms-1">Examen en attente</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ route('pageExamenAttente') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">add_circle_outline</i>
                        </div>
                        <span class="nav-link-text ms-1">Ajouter un examen</span>
                    </a>
                </li>
            @endif

            {{-- la partie accouchement aussi accessible par les techniciens --}}
            @if (Auth::user()->role == 'technicien')
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="{{ route('pageAccouchement') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">local_hospital</i>
                        </div>
                        <span class="nav-link-text ms-1">Saisir Accouchement</span>
                    </a>
                </li>
            @endif

        </ul>
    </div>
    <ul class="navbar-nav ms-auto">



        <div class="sidenav-footer position-absolute w-100 bottom-0 ">

            <div class="mx-3">
                <a class="btn bg-gradient-primary w-100" href="{{ route('logout') }}" type="button"
                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Deconnexion') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

            <div class="mx-3">
                <a class="btn bg-gradient-primary w-100" href="{{ route('parametre') }}" type="button">
                    Paramètre</a>
            </div>
        </div>
</aside>
