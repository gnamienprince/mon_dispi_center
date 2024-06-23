@include('partials.header')
@include('partials.slidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">

                <h6 class="font-weight-bolder fs-2 mb-0">Ouvrir un compte patient</h6>
            </nav>

        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">.</h6>
                        </div>

                    </div>

                    <div class="card-body px-0 pb-2">

                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">

                                <tbody>

                                    <div class="col-xl-12 col-lg-5 col-md-7 ">
                                        <div class="card card-plain">
                                            <div class="card-body">
                                                <form action="{{ route('createDossierPatient') }}" method="post">
                                                    @csrf
                                                    <div class="row g-2">
                                                        @if ($message != 0)
                                                            <div class="alert alert-success text-light" role="alert">
                                                                {{ $message }}
                                                            </div>
                                                        @endif
                                                        <div class="col-md">
                                                            <div class="input-group input-group-outline mb-3">
                                                                <label class="form-label" for="nom">Nom</label>
                                                                <input type="text" id="nom" name="nom"
                                                                    value="{{ old('nom') }}" class="form-control">

                                                            </div>
                                                            @error('nom')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="col-md">
                                                            <div class="input-group input-group-outline mb-3">
                                                                <label class="form-label" for="prenom">Prenom</label>
                                                                <input type="text" id="prenom" name="prenom"
                                                                    class="form-control" value="{{ old('prenom') }}">
                                                            </div>
                                                            @error('prenom')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row g-2">
                                                        <div class="col-md">
                                                            <div class="input-group input-group-outline mb-3">
                                                                <label class="form-label" for="date"></label>
                                                                <input type="date" id="dateNaissance"
                                                                    name="dateNaissance" class="form-control"
                                                                    value="{{ old('dateNaissance') }}">
                                                            </div>
                                                            @error('dateNaissance')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="col-md">
                                                            <div class="input-group input-group-outline mb-3">
                                                                <label class="form-label" for="lieu">Lieu de
                                                                    naissance</label>
                                                                <input type="text" id="lieuNaissance"
                                                                    name="lieuNaissance" class="form-control"
                                                                    value="{{ old('lieuNaissance') }}">
                                                            </div>
                                                            @error('lieuNaissance')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row g-2">
                                                        <div class="col-md">
                                                            <div class="input-group input-group-outline mb-3">
                                                                <label class="form-label"
                                                                    for="localisation">Localisation</label>
                                                                <input type="texte" id="localisation"
                                                                    name="localisation" class="form-control"
                                                                    value="{{ old('localisation') }}">

                                                            </div>
                                                            @error('localisation')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="col-md">
                                                            <div class="input-group input-group-outline mb-3">
                                                                <label class="form-label"
                                                                    for="telephone">Téléphone</label>
                                                                <input type="text" id="telephone" name="telephone"
                                                                    class="form-control"
                                                                    value="{{ old('telephone') }}">

                                                            </div>
                                                            @error('telephone')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="row g-2">
                                                        <div class="col-md">
                                                            <div class="input-group input-group-outline mb-3">
                                                                <label class="form-label" for="email">Email</label>
                                                                <input type="email" id="email" name="email"
                                                                    class="form-control" value="{{ old('email') }}">

                                                            </div>
                                                            @error('email')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="col-md">
                                                            <div class="input-group input-group-outline mb-3">
                                                                <label class="form-label"
                                                                    for="profession">Profession</label>
                                                                <input type="text" id="profession" name="profession"
                                                                    class="form-control"
                                                                    value="{{ old('profession') }}">

                                                            </div>
                                                            @error('profession')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md">
                                                        <div class="input-group input-group-outline mb-3">
                                                            <label class="form-label"
                                                                for="antecedent">Antecedent</label>
                                                            <input type="text" id="antecedent" name="antecedent"
                                                                class="form-control" value="{{ old('antecedent') }}">

                                                        </div>
                                                        @error('antecedent')
                                                            {{ $message }}
                                                        @enderror

                                                        <div class="text-center">
                                                            <button type="submit"
                                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Créer</button>
                                                        </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar -->

</main>

<!--   Core JS Files   -->
<script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('js/material-dashboard.min.js?v=3.1.0') }}"></script>
</body>

</html>
