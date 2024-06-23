    @include('partials.header')
    @include('partials.slidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder fs-2 mb-0">Information sur {{ $informationPatient->nom }}
                        {{ $informationPatient->prenom }}</h6>





                </nav>

            </div>
        </nav>

        <div class="container mt-4">
            <div class="row">
                <!-- Première colonne avec les informations de naissance et de localisation -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Naissance</h5>
                            <p class="card-text"><strong>Date de naissance :</strong>
                                {{ $informationPatient->dateNaissance }}</p>
                            <p class="card-text"><strong>Lieu de naissance :</strong>
                                {{ $informationPatient->lieuNaissance }}</p>
                        </div>
                    </div>
                </div>

                <!-- Deuxième colonne avec les informations de contact -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Contact</h5>
                            <p class="card-text"><strong>Téléphone :</strong> {{ $informationPatient->telephone }}</p>
                            <p class="card-text"><strong>Email :</strong><a href="#"></a>{{ $informationPatient->email }}</p>
                            <p class="card-text"><strong>Localisation :</strong> {{ $informationPatient->localisation }}
                            </p>

                        </div>
                    </div>
                </div>

                <!-- Troisième colonne avec les informations professionnelles et médicales -->
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Professionnelles et médicales</h5>
                            <p class="card-text"><strong>Profession :</strong> {{ $informationPatient->profession }}</p>
                            <p class="card-text"><strong>Antécédent :</strong> {{ $informationPatient->antecedent }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="py-4">
                <div class="row">
                    <div class="col-12">
                        <center>
                            <a href="#" data-target="#tabConsultation" class="btn btn-success toggle-table">
                                Consultation
                            </a>
                            <a href="#" data-target="#tabTraitement" class="btn btn-success toggle-table">
                                Traitement
                            </a>
                            <a href="#" data-target="#tabHospitalisation" class="btn btn-success toggle-table">
                                Hospitalisation
                            </a>
                            <a href="#" data-target="#tabAccouchement" class="btn btn-success toggle-table">
                                Accouchement
                            </a>
                            <a href="#" data-target="#tabExamen" class="btn btn-success toggle-table">
                                Examen
                            </a>
                        </center>
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">.</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    {{-- le tableau de la consultation --}}
                                    <table id="tabConsultation"
                                        class="display table align-items-center mb-0 table-striped">

                                        <thead>
                                            <tr>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Constante</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Diagnostique</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Pathologie</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Prescription</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date du prochain RDV</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Medecin traitant</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($consultation as $consultation)
                                                <tr>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $consultation->created_at }}</p>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">
                                                            @php
                                                                $constanteData = json_decode(
                                                                    $consultation->constante,
                                                                    true,
                                                                );
                                                            @endphp
                                                            <span class="text-xs font-weight-bold mb-0">
                                                                @foreach ($constanteData as $key => $value)
                                                                    {{ $key }} : {{ $value }}
                                                                    <br>
                                                                @endforeach
                                                            </span>
                                                        </span>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $consultation->diagnostique }}</span>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $consultation->pathologie }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $consultation->prescription }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $consultation->dateRDV }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $consultation->nom }}
                                                            {{ $consultation->prenom }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- le tableau du traitement --}}
                                    <table id="tabTraitement"
                                        class="display table align-items-center mb-0 table-striped">

                                        <thead>
                                            <tr>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Objet</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Observation</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Act medical</th>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Medecin traitant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($traitements as $traitements)
                                                <tr>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $traitements->created_at }}</p>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </td>


                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $traitements->objet }}</span>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $traitements->observation }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $traitements->act_medical_id }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $traitements->nom }}
                                                            {{ $traitements->prenom }}</span>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- -le trableau des hospitalisations --}}
                                    <table id="tabHospitalisation"
                                        class="display table align-items-center mb-0 table-striped ">

                                        <thead>
                                            <tr>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date de debut</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date de fin</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Lit occupé</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($hospitalisations as $hospitalisations)
                                                <tr>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $hospitalisations->dateDebut }}</p>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </td>


                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $hospitalisations->dateFin }}</span>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $hospitalisations->lit_id }}</span>
                                                    </td>



                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- le tableau des accouchements --}}
                                    <table id="tabAccouchement"
                                        class="display table align-items-center mb-0 table-striped">

                                        <thead>
                                            <tr>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date de l'accouchement</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Description</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Infirmière</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($accouchements as $accouchement)
                                                <tr>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $accouchement->dateAccouchement }}</p>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </td>


                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $accouchement->description }}</span>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">
                                                            {{ $listeInfirmier[$accouchement->technicien_id]->nom }}
                                                            {{ $listeInfirmier[$accouchement->technicien_id]->prenom }}
                                                        </span>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{-- le tableau des examens --}}
                                    <table id="tabExamen" class="display table align-items-center mb-0 table-striped">

                                        <thead>
                                            <tr>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Date de l'examen</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    libellé de l'examen</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Objet</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Interpretation</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($examens as $examens)
                                                <tr>

                                                    <td>
                                                        <p class="text-xs font-weight-bold mb-0">
                                                            {{ $examens->dateExamen }}</p>
                                                        <p class="text-xs text-secondary mb-0"></p>
                                                    </td>


                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $examens->examen_id }}</span>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $examens->objet }}</span>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="">{{ $examens->interpretation }}</span>
                                                    </td>
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
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Material UI Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark"
                        onclick="sidebarType(this)">Dark</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent"
                        onclick="sidebarType(this)">Transparent</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <a class="btn bg-gradient-info w-100"
                    href="https://www.creative-tim.com/product/material-dashboard-pro">Free Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Material%20UI%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/material-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.4/datatables.min.js"></script>
    <script>
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



    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            // Cache tous les tableaux sauf le premier
            $('.table').hide();
            $('#tabConsultation').show();

            // Gestion du clic sur les boutons
            $('.toggle-table').on('click', function(event) {
                event.preventDefault();
                var target = $(this).data('target');

                // Masquer tous les tableaux
                $('.table').hide();

                // Afficher le tableau cible
                $(target).show();
            });
        });
    </script>


    </body>

    </html>
