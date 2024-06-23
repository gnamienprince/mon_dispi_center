@include('partials.header')
@include('partials.slidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">

                <h6 class="font-weight-bolder fs-2 mb-0">Consultation secondaire</h6>
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
                                                <form action="{{ route('majConsultation') }}" method="post">
                                                    @csrf
                                                <div class="row g-2">
    <div class="col">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title text-secondary">Informations de la consultation</h6>
                <p class="card-text text-secondary mb-2">ID : {{ $listeConsultationAttente->id }}</p>
                <p class="card-text text-secondary mb-2">Nom : {{ $listeConsultationAttente->nom }}</p>
                <p class="card-text text-secondary mb-2">Prénom : {{ $listeConsultationAttente->prenom }}</p>
                <input type="text" id="idConsultation" name="idConsultation" value="{{ $listeConsultationAttente->id }}" class="form-control" readonly hidden>
                <input type="text" id="nomPatient" name="nomPatient" value="{{ $listeConsultationAttente->nom }}" class="form-control" readonly hidden>
                <input type="text" id="prenomPatient" name="prenomPatient" value="{{ $listeConsultationAttente->prenom }}" class="form-control" readonly hidden>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h6 class="card-title text-secondary">Constantes</h6>
                @php
                    $constanteData = json_decode($listeConsultationAttente->constante, true);
                @endphp
                @foreach ($constanteData as $key => $value)
                    <p class="card-text text-secondary mb-2">{{ $key }} : {{ $value }}</p>
                @endforeach
                <input type="text" id="constante" name="constante" value="{{ $listeConsultationAttente->constante }}" class="form-control" readonly hidden>
            </div>
        </div>
    </div>
</div>




                                                    <br>


                                                    <div class="row g-2">
                                                        <div class="col-md">
                                                            <label class="form-label"
                                                                for="diagnostique">Diagnostique</label>
                                                            <div class="input-group input-group-outline mb-3">

                                                                <textarea type="text" id="diagnostique" name="diagnostique" class="form-control"></textarea>

                                                            </div>

                                                            <br>
                                                            @error('diagnostique')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="col-md">
                                                             <label class="form-label"
                                                                    for="pathologie">Pathologie</label>
                                                            <div class="input-group input-group-outline mb-3">
                                                               
                                                                <textarea type="text" id="pathologie" name="pathologie" class="form-control"></textarea>

                                                            </div>
                                                            <br>
                                                            @error('pathologie')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                        <div class="col-md">
                                                            <label class="form-label"
                                                                    for="prescription">Prescription</label>
                                                            <div class="input-group input-group-outline mb-3">
                                                                
                                                                <textarea type="text" id="prescription" name="prescription" class="form-control"></textarea>

                                                            </div>
                                                            <br>
                                                            @error('prescription')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row g-2">
                                                        <div class="col-md">
                                                             <label class="form-label" for="rdv">Date du
                                                                    prochain Rendez-vous</label>
                                                            <div class="input-group input-group-outline mb-3">
                                                               
                                                                <input type="date" id="rdv" name="rdv"
                                                                    class="form-control">

                                                            </div>
                                                            <br>
                                                            @error('rdv')
                                                                {{ $message }}
                                                            @enderror
                                                        </div>
                                                    </div>



                                                    <div class="text-center">
                                                        <button type="submit"
                                                            class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Enregistrer</button>
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
