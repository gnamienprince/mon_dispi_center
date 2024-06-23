@include('partials.header')
@include('partials.slidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        data-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">

                <h6 class="font-weight-bolder fs-2 mb-0">Choix du service</h6>
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
                            <br>
                            @if ($info)
                                <div class="alert alert-success text-light" role="alert">
                                    {{ $info }}
                                </div>
                            @endif
                        </div>
                        <br><br>
                        <div class="card-body px-0 pb-2">

                            <div class="row">

                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">

                                    <div class="card">

                                        <div class="card-footer p-3">
                                            <p class="mb-0"><span
                                                    class="text-success text-sm font-weight-bolder"></span></p>
                                            {{-- le bouton pour saisir l'information de traitement  validerTraitement --}}
                                            <div class="text-center">
                                                <img src="https://img.freepik.com/free-photo/medicine-bottle-spilling-colorful-pills-depicting-addiction-risks-generative-ai_188544-12529.jpg?t=st=1716174767~exp=1716178367~hmac=b4eaae9632499e0c77107e41ef12a07b36b7d7624b9085c99601f9d383412b21&w=2000"
                                                    alt="Image illustrative" class="img-fluid mb-3">
                                                <a href="#" type="submit" data-bs-toggle="modal"
                                                    data-bs-target="#traitement"
                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mb-0">Traitement</a>
                                            </div>

                                        </div>

                                        {{-- le modal de la table traitement --}}
                                        <!-- Modal -->
                                        <div class="modal fade" id="traitement" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                            Traitement
                                                        </h1>


                                                    </div>
                                                    <form action="{{ route('validerTraitement') }}" method="get">
                                                        <div class="modal-body">
                                                            <div class="col-md">
                                                                {{-- idConsultation     id de la consultation --}}
                                                                <input type="text" name="idConsultation"
                                                                    value="{{ $idConsultation }}" hidden>
                                                                {{-- objet --}}
                                                                <label class="form-label" for="objet">Objet</label>
                                                                <div class="input-group input-group-outline mb-3">
                                                                    <textarea type="text" id="objet" name="objet" class="form-control"></textarea>
                                                                </div>

                                                                {{-- observation --}}
                                                                <label class="form-label"
                                                                    for="observation">Observation</label>
                                                                <div class="input-group input-group-outline mb-3">
                                                                    <textarea type="text" id="observation" name="observation" class="form-control"></textarea>
                                                                </div>
                                                                {{-- act medical --}}
                                                                <label class="form-label" for="acte">Acte
                                                                    medical</label>
                                                                <div class="input-group input-group-outline mb-3">
                                                                    <select type="text" id="acte" name="acte"
                                                                        class="form-select">

                                                                        @foreach ($actMedical as $acte)
                                                                            <option value="{{ $acte->id }}">
                                                                                {{ $acte->libelleAct }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('acte')
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
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">

                                        <div class="card-footer p-3">
                                            <p class="mb-0"><span
                                                    class="text-success text-sm font-weight-bolder"></span></p>
                                            {{-- le bouton pour saisir l'information de traitement --}}
                                            <div class="text-center">
                                                <img src="https://img.freepik.com/free-psd/hospital-room-with-bed-table-generative-ai_587448-2097.jpg?t=st=1716174814~exp=1716178414~hmac=ea5cb2cde204d6f8002e400c7fb6346b3c2c2922c88c84a72114d001b935203d&w=2000"
                                                    alt="Image illustrative" class="img-fluid mb-3">
                                                <a href="#" type="submit" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop"
                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mb-0">Hospitalisation</a>
                                            </div>


                                            {{-- le modal de la table hospitalisation --}}
                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                Hospitalisation
                                                            </h1>
                                                            {{-- idConsultation     id de la consultation --}}
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('validerHospitalisation') }}"
                                                            method="get">
                                                            <div class="modal-body">
                                                                <div class="col-md">
                                                                    <input type="text" name="idConsultation"
                                                                        value="{{ $idConsultation }}" hidden>
                                                                    {{-- chambre --}}
                                                                    <label class="form-label"
                                                                        for="chambre">Chambre</label>
                                                                    <div class="input-group input-group-outline mb-3">
                                                                        <select type="text" id="chambre"
                                                                            name="chambre" class="form-select">

                                                                            @foreach ($chambre as $chambre)
                                                                                <option value="{{ $chambre->id }}">
                                                                                    Chambre
                                                                                    N°{{ $chambre->chambre_id }} : Lit
                                                                                    N° {{ $chambre->id }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('chambre')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </div>
                                                                    <br />
                                                                    <div class="col-md">
                                                                        <label class="form-label"
                                                                            for="jour">Nombre de
                                                                            jour</label>
                                                                        <div
                                                                            class="input-group input-group-outline mb-3">

                                                                            <input type="number" id="jour"
                                                                                name="jour" class="form-control"
                                                                                min="1" value="1">
                                                                            @error('jour')
                                                                                {{ $message }}
                                                                            @enderror
                                                                        </div>
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


                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">

                                        <div class="card-footer p-3">
                                            <p class="mb-0"><span
                                                    class="text-success text-sm font-weight-bolder"></span></p>
                                            {{-- le bouton pour saisir l'information de traitement --}}
                                            <div class="text-center">
                                                <img src="https://img.freepik.com/free-photo/black-pregnant-women-posing_23-2151446121.jpg?t=st=1716175046~exp=1716178646~hmac=c10abda6d9e36ae75d56fab5379be7660d70c8c0ded6f81b96b1cc6de28115e2&w=2000"
                                                    alt="Image illustrative" class="img-fluid mb-3">
                                                <a href="{{ route('validerAccouchement', ['idConsultation' => $idConsultation]) }}"
                                                    type="submit"
                                                    class="btn btn-lg bg-gradient-primary btn-lg w-100 mb-0">Accouchement</a>
                                            </div>


                                            {{-- le modal de la table examen --}}
                                            <!-- Modal -->



                                        </div>
                                    </div>

                                </div>
                                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                                    <div class="card">

                                        <div class="card-footer p-3">
                                            <p class="mb-0"><span
                                                    class="text-danger text-sm font-weight-bolder"></span></p>
                                            {{-- le bouton pour saisir l'information de traitement --}}
                                            <div class="text-center">
                                                <div class="text-center">
                                                    <img src="https://img.freepik.com/free-photo/cardiologist-plans-research-using-diagnostic-medical-tool-generated-by-ai_188544-18522.jpg?t=st=1716175159~exp=1716178759~hmac=daa5da341d6fbf8659b4d426e3288a600837144e6f810ba583b1dcc08156e07d&w=2000" alt="Image illustrative"
                                                        class="img-fluid mb-3">
                                                    <a href="#" type="submit" data-bs-toggle="modal"
                                                        data-bs-target="#examen"
                                                        class="btn btn-lg bg-gradient-primary btn-lg w-100 mb-0">Examen</a>
                                                </div>

                                            </div>
                                            <div class="modal fade" id="examen" data-bs-backdrop="static"
                                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="examen"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="examen">
                                                                Examen
                                                            </h1>
                                                            {{-- idConsultation     id de la consultation --}}
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('validerExamen') }}" method="get">
                                                            <div class="modal-body">
                                                                <div class="col-md">
                                                                    <input type="text" name="idConsultation"
                                                                        value="{{ $idConsultation }}" hidden>
                                                                    {{-- chambre --}}
                                                                    <label class="form-label" for="examen">Liste des
                                                                        examens</label>
                                                                    <div class="input-group input-group-outline mb-3">
                                                                        @foreach ($examen as $examen)
                                                                            <div class="form-check">
                                                                                <input class="form-check-input"
                                                                                    type="checkbox"
                                                                                    id="{{ $examen->id }}"
                                                                                    name="examens[]"
                                                                                    value="{{ $examen->id }}">
                                                                                <label class="form-check-label"
                                                                                    for="{{ $examen->id }}">{{ $examen->libExamen }}</label>
                                                                            </div>
                                                                        @endforeach
                                                                        @error('examen')
                                                                            <div class="alert alert-danger">
                                                                                {{ $message }}</div>
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
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">

        {{-- le tableau --}}

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
<script>
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
