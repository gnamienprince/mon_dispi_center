    @include('partials.header')
    @include('partials.slidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <h6 class="font-weight-bolder fs-2 mb-0">Examen en attente</h6>
                </nav>

            </div>
        </nav>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="py-4">
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
                                    {{-- @if ($info != 0)
                                        <div class="alert alert-success text-light" role="alert">
                                            {{ $info }}
                                        </div>
                                    @endif --}}
                                    <table id="myTable" class="display table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Reference</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Nom et prenom</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Telephone</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date de la consultation</th>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Examen à faire</th>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($examen as $examen)
                                                <tr>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $examen->resultat_examens_id }}</span>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="https://cdn.icon-icons.com/icons2/1749/PNG/512/17_113699.png"
                                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                                    alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">
                                                                    {{ $examen->nom }}</h6>
                                                                <p class="text-xs text-secondary mb-0">
                                                                    {{ $examen->prenom }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $examen->telephone }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $examen->created_at }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $examen->libExamen }}</span>
                                                    </td>

                                                    <td class="align-middle text-center">
                                                        <div class="text-center">
                                                            <a href="#" type="submit" data-bs-toggle="modal"
                                                                data-bs-target="#traitement"
                                                                data-id="{{ $examen->resultat_examens_id }}"
                                                                class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Resultats</a>
                                                        </div>
                                                    </td>

                                                    {{-- modal de renseignement des resultats pour les examens --}}

                                                    <div class="modal fade" id="traitement" data-bs-backdrop="static"
                                                        data-bs-keyboard="false" tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5"
                                                                        id="staticBackdropLabel">
                                                                        Saisir les informations du resultats
                                                                    </h1>


                                                                </div>
                                                                <form action="{{ route('enregistrerExamen') }}"
                                                                    method="get">
                                                                    <div class="modal-body">
                                                                        <div class="col-md">
                                                                            {{-- idExamen  id de l'examen --}}
                                                                            <input type="text" id="idConsultation" name="idConsultation"
                                                                               
                                                                                hidden>
                                                                            {{-- objet --}}
                                                                            <label class="form-label"
                                                                                for="objet">Objet</label>
                                                                            <div
                                                                                class="input-group input-group-outline mb-3">
                                                                                <textarea type="text" id="objet" name="objet" class="form-control"></textarea>
                                                                            </div>

                                                                            {{-- observation --}}
                                                                            <label class="form-label"
                                                                                for="interpretation">Interpretation</label>
                                                                            <div
                                                                                class="input-group input-group-outline mb-3">
                                                                                <textarea type="text" id="interpretation" name="interpretation" class="form-control"></textarea>
                                                                            </div>
                                                                            {{-- act medical --}}
                                                                            <label class="form-label"
                                                                                for="dateExamen">date de l'Examen
                                                                            </label>
                                                                            <div
                                                                                class="input-group input-group-outline mb-3">
                                                                                <input type="date" id="dateExamen"
                                                                                    name="dateExamen"
                                                                                    class="form-select">

                                                                                @error('dateExamen')
                                                                                    {{ $message }}
                                                                                @enderror
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Fermé</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Valider</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">

    </main>

    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script>
        
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('traitement');
                modal.addEventListener('show.bs.modal', function(event) {
                    // Bouton qui déclenche le modal
                    var button = event.relatedTarget;

                    // Récupère les données
                    var examId = button.getAttribute('data-id');

                    // Met à jour le champ caché dans le modal
                    var inputExamId = modal.querySelector('#idConsultation');
                    inputExamId.value = examId;
                });
            });
   


    let table = new DataTable('#myTable');


    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
    type: "bar",
    data: {
    labels: ["M", "T", "W", "T", "F", "S", "S"],
    datasets: [{
    label: "Sales",
    tension: 0.4,
    borderWidth: 0,
    borderRadius: 4,
    borderSkipped: false,
    backgroundColor: "rgba(255, 255, 255, .8)",
    data: [50, 20, 10, 22, 50, 10, 40],
    maxBarThickness: 6
    }, ],
    },
    options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
    legend: {
    display: false,
    }
    },
    interaction: {
    intersect: false,
    mode: 'index',
    },
    scales: {
    y: {
    grid: {
    drawBorder: false,
    display: true,
    drawOnChartArea: true,
    drawTicks: false,
    borderDash: [5, 5],
    color: 'rgba(255, 255, 255, .2)'
    },
    ticks: {
    suggestedMin: 0,
    suggestedMax: 500,
    beginAtZero: true,
    padding: 10,
    font: {
    size: 14,
    weight: 300,
    family: "Roboto",
    style: 'normal',
    lineHeight: 2
    },
    color: "#fff"
    },
    },
    x: {
    grid: {
    drawBorder: false,
    display: true,
    drawOnChartArea: true,
    drawTicks: false,
    borderDash: [5, 5],
    color: 'rgba(255, 255, 255, .2)'
    },
    ticks: {
    display: true,
    color: '#f8f9fa',
    padding: 10,
    font: {
    size: 14,
    weight: 300,
    family: "Roboto",
    style: 'normal',
    lineHeight: 2
    },
    }
    },
    },
    },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
    type: "line",
    data: {
    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
    label: "Mobile apps",
    tension: 0,
    borderWidth: 0,
    pointRadius: 5,
    pointBackgroundColor: "rgba(255, 255, 255, .8)",
    pointBorderColor: "transparent",
    borderColor: "rgba(255, 255, 255, .8)",
    borderColor: "rgba(255, 255, 255, .8)",
    borderWidth: 4,
    backgroundColor: "transparent",
    fill: true,
    data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
    maxBarThickness: 6

    }],
    },
    options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
    legend: {
    display: false,
    }
    },
    interaction: {
    intersect: false,
    mode: 'index',
    },
    scales: {
    y: {
    grid: {
    drawBorder: false,
    display: true,
    drawOnChartArea: true,
    drawTicks: false,
    borderDash: [5, 5],
    color: 'rgba(255, 255, 255, .2)'
    },
    ticks: {
    display: true,
    color: '#f8f9fa',
    padding: 10,
    font: {
    size: 14,
    weight: 300,
    family: "Roboto",
    style: 'normal',
    lineHeight: 2
    },
    }
    },
    x: {
    grid: {
    drawBorder: false,
    display: false,
    drawOnChartArea: false,
    drawTicks: false,
    borderDash: [5, 5]
    },
    ticks: {
    display: true,
    color: '#f8f9fa',
    padding: 10,
    font: {
    size: 14,
    weight: 300,
    family: "Roboto",
    style: 'normal',
    lineHeight: 2
    },
    }
    },
    },
    },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
    type: "line",
    data: {
    labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
    label: "Mobile apps",
    tension: 0,
    borderWidth: 0,
    pointRadius: 5,
    pointBackgroundColor: "rgba(255, 255, 255, .8)",
    pointBorderColor: "transparent",
    borderColor: "rgba(255, 255, 255, .8)",
    borderWidth: 4,
    backgroundColor: "transparent",
    fill: true,
    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
    maxBarThickness: 6

    }],
    },
    options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
    legend: {
    display: false,
    }
    },
    interaction: {
    intersect: false,
    mode: 'index',
    },
    scales: {
    y: {
    grid: {
    drawBorder: false,
    display: true,
    drawOnChartArea: true,
    drawTicks: false,
    borderDash: [5, 5],
    color: 'rgba(255, 255, 255, .2)'
    },
    ticks: {
    display: true,
    padding: 10,
    color: '#f8f9fa',
    font: {
    size: 14,
    weight: 300,
    family: "Roboto",
    style: 'normal',
    lineHeight: 2
    },
    }
    },
    x: {
    grid: {
    drawBorder: false,
    display: false,
    drawOnChartArea: false,
    drawTicks: false,
    borderDash: [5, 5]
    },
    ticks: {
    display: true,
    color: '#f8f9fa',
    padding: 10,
    font: {
    size: 14,
    weight: 300,
    family: "Roboto",
    style: 'normal',
    lineHeight: 2
    },
    }
    },
    },
    },
    });
    </script>
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
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
    </body>

    </html>
