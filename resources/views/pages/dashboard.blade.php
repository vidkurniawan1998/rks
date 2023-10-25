@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pages</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col">
                <div class="row">

                    <!-- Reports Daily-->
                    <div class="col-12">
                        <div class="card">

                            {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Daily</a></li>
                                    <li><a class="dropdown-item" href="#">Weekly</a></li>
                                    <li><a class="dropdown-item" href="#">Monthly</a></li>
                                </ul>
                            </div> --}}

                            <div class="card-body">
                                <h5 class="card-title">Laporan Penjualan <span>/Daily</span></h5>

                                <!-- Line Chart -->
                                <div id="lineChart"></div>

                                <script>
                                    //Daily
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#lineChart"), {
                                            series: [{
                                                name: "Nasabah",
                                                data: [30, 50, 80, 60, 20]
                                            }],
                                            chart: {
                                                height: 350,
                                                type: 'line',
                                                zoom: {
                                                    enabled: false
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            stroke: {
                                                curve: 'straight'
                                            },
                                            grid: {
                                                row: {
                                                    colors: ['#f3f3f3',
                                                        'transparent'
                                                    ], // takes an array which will be repeated on columns
                                                    opacity: 0.5
                                                },
                                            },
                                            xaxis: {
                                                categories: ['Mon', 'Thu', 'Wed', 'Thu', 'Fri', 'Sat'],
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Line Chart -->

                            </div>

                        </div>
                    </div><!-- End Reports -->

                    <!-- Left side columns -->
                    <div class="col">
                        <div class="row">

                            <!-- Reports Weekly-->
                            <div class="col-12">
                                <div class="card">

                                    {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Daily</a></li>
                                    <li><a class="dropdown-item" href="#">Weekly</a></li>
                                    <li><a class="dropdown-item" href="#">Monthly</a></li>
                                </ul>
                            </div> --}}

                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Penjualan <span>/Weekly</span></h5>

                                        <!-- Line Chart -->
                                        <div id="lineChart2"></div>

                                        <script>
                                            //Weekly
                                            document.addEventListener("DOMContentLoaded", () => {
                                                new ApexCharts(document.querySelector("#lineChart2"), {
                                                    series: [{
                                                        name: "Nasabah",
                                                        data: [50, 70, 70, 58, 49, 62, 69, 70]
                                                    }],
                                                    chart: {
                                                        height: 350,
                                                        type: 'line',
                                                        zoom: {
                                                            enabled: false
                                                        }
                                                    },
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    stroke: {
                                                        curve: 'straight'
                                                    },
                                                    grid: {
                                                        row: {
                                                            colors: ['#f3f3f3',
                                                                'transparent'
                                                            ], // takes an array which will be repeated on columns
                                                            opacity: 0.5
                                                        },
                                                    },
                                                    xaxis: {
                                                        categories: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7',
                                                            'Week 8'
                                                        ],
                                                    }
                                                }).render();
                                            });
                                        </script>
                                        <!-- End Line Chart -->

                                    </div>

                                </div>
                            </div><!-- End Reports -->

                            <!-- Reports Monthly -->
                            <div class="col-12">
                                <div class="card">

                                    {{-- <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Daily</a></li>
                                    <li><a class="dropdown-item" href="#">Weekly</a></li>
                                    <li><a class="dropdown-item" href="#">Monthly</a></li>
                                </ul>
                            </div> --}}

                                    <div class="card-body">
                                        <h5 class="card-title">Laporan Penjualan <span>/Monthly</span></h5>

                                        <!-- Line Chart -->
                                        <div id="lineChart3"></div>

                                        <script>
                                            //Monthly
                                            document.addEventListener("DOMContentLoaded", () => {
                                                new ApexCharts(document.querySelector("#lineChart3"), {
                                                    series: [{
                                                        name: "Nasabah",
                                                        data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
                                                    }],
                                                    chart: {
                                                        height: 350,
                                                        type: 'line',
                                                        zoom: {
                                                            enabled: false
                                                        }
                                                    },
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    stroke: {
                                                        curve: 'straight'
                                                    },
                                                    grid: {
                                                        row: {
                                                            colors: ['#f3f3f3',
                                                                'transparent'
                                                            ], // takes an array which will be repeated on columns
                                                            opacity: 0.5
                                                        },
                                                    },
                                                    xaxis: {
                                                        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
                                                    }
                                                }).render();
                                            });
                                        </script>
                                        <!-- End Line Chart -->

                                    </div>

                                </div>
                            </div><!-- End Reports -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('dashboard')
    <script>
        // $(document).ready(function() {
        //     $('.js-example-basic-single').select2();
        // });
    </script>
@endpush
