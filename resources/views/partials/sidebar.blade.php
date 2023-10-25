<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-heading">Features</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('rks.dashboard') }}">
                <i class="bi bi-file-bar-graph"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('rks.log_transaksi') }}">
                <i class="ri-database-fill"></i>
                <span>Log Transaksi</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-cash"></i><span>Limit Transaksi</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="">
                    <a href="{{ route('limittransaksi.list') }}">
                        <i class="bi bi-circle" class></i><span>Set Limit Transaksi</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('limittransaksi.data_limit') }}">
                        <i class="bi bi-circle"></i><span>Data Limit</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Forms Nav -->


        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('rks.product') }}">
                <i class="ri-product-hunt-line"></i>
                <span>Product</span>
            </a>
        </li><!-- End Dashboard Nav -->

        {{-- <li class="nav-heading">Autentikasi</li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-person-lines-fill"></i>
                <span>Manage Admin</span>
            </a>
        </li><!-- End Register Page Nav --> --}}

    </ul>

</aside>
