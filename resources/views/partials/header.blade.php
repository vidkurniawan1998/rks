<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center">
            <span class="d-none d-lg-block">Report RKS</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#"></a>
            </li><!-- End Search Icon-->
            <li class="nav-item dropdown pe-3">
                @if (auth()->check())
                    <!-- Periksa apakah pengguna masih dalam sesi -->
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('assets/img/149071.png') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                    </a><!-- End Profile Image Icon -->
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('rks.process_logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Logout</span>
                            </a>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                @else
                    {{-- <a class="nav-link" data-bs-toggle="modal" href="#loginModal">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Login</span>
                    </a> --}}
                @endif
            </li><!-- End Profile Nav -->
        </ul>
    </nav><!-- End Icons Navigation -->
</header><!-- End Header -->

<!-- Modal -->
<div class="modal show" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true"
    data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sesi Login Kadaluarsa</h5>
            </div>
            <div class="modal-body">
                <p>Sesi login anda sudah habis. Silahkan klik tombol login dibawah ini untuk login lagi.</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('rks.login') }}" class="btn btn-primary">Ke Halaman Login</a>
            </div>
        </div>
    </div>
</div>
@push('header')
    <script>
       $(document).ready(function() {
        // Periksa apakah pengguna terotentikasi
        @if (auth()->check())
            // Set waktu timeout menjadi detik
            var sessionTimeout = {{ config ('session.lifetime')}} *60 * 1000; // Settingan  Hitungan Per Menit
            //(Untuk Atur Waktu Per Menit Buka ENV Dan session ubah session_lifetimenya jadi angka 10 (apabila mau atur waktu 10 menit) dan env SESSION_LIFETIME = 10 lalu
            //php artisan config:clear setiap ubah env dan session.php)
            var lastActivityTime = new Date().getTime();

            // Atur interval untuk memeriksa aktivitas
            var checkActivityInterval = setInterval(function() {
                var currentTime = new Date().getTime();
                var elapsedTime = currentTime - lastActivityTime;

                // Periksa apakah waktu yang sudah berlalu melebihi waktu timeout
                if (elapsedTime > sessionTimeout) {
                    // Tampilkan modal timeout
                    $('#loginModal').modal('show');

                    // Hentikan interval
                    clearInterval(checkActivityInterval);
                }
            }, 1000); // Periksa setiap detik

            // Atur event untuk merekam waktu aktivitas terakhir
            $(document).on('mousemove click keypress', function() {
                lastActivityTime = new Date().getTime();
            });
        @endif
    });
    </script>
@endpush
