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

                            <!--Form Pencarian Dan Laporan Transaksi-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title" style="padding-bottom:2px;">Form Pencarian</h5>
                                            <form>
                                                <div class="form-group">
                                                    <select class="form-select js-example-basic-multiple">
                                                        <option value="Pilih ID Staff">Pilih ID Staff</option>
                                                        <option value="CW001">CW001</option>
                                                        <option value="CW002">CW002</option>
                                                        <option value="CW003">CW003</option>
                                                        <option value="CW004">CW004</option>
                                                    </select>
                                                </div>

                                                <h5 class="card-title" style="padding-bottom:1px;">Tanggal Transaksi</h5>
                                                <div class="form-group">
                                                    <label for="tgl_awal" class="col-form-label">Tanggal Awal</label>
                                                    <input type="datetime-local" class="form-control" name="tgl_awal"
                                                        id="tgl_awal">
                                                </div>

                                                <div class="form-group">
                                                    <label for="tgl_awal" class="col-form-label">Tanggal Akhir</label>
                                                    <input type="datetime-local" class="form-control" name="tgl_akhir"
                                                        id="tgl_akhir">
                                                </div>

                                                <div class="form-group py-3">
                                                    <button class="btn btn-primary"><span class="bi bi-search"></span>
                                                        Search</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Laporan Transaksi</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <th scope="col">#</th>
                                                        <th scope="col">ID Staff</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Saldo</th>
                                                        <th scope="col">Tanggal Transaksi</th>
                                                        <th scope="col">Total Harga</th>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    </section>
@endsection
@push('dashboard')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>
