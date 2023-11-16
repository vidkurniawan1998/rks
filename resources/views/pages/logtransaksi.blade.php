@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Log Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Pages</a></li>
                <li class="breadcrumb-item active">Log Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col">
                <div class="row">
                    <!--Form Pencarian Dan Laporan Transaksi-->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" style="padding-bottom:2px;">Form Pencarian</h5>
                                <form action="{{ route('rks.filter_log_transaksi') }}" method="get" class="row g-3">
                                    @csrf
                                    <div class="col-md-4">
                                        <label for="agenid" class="col-form-label">ID Agen :</label>
                                        <input type="text" class="form-control" name="agenid" id="agenid"
                                            placeholder="ID Agen">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="start_date" class="col-form-label">Tanggal Awal</label>
                                        <input type="date" class="form-control" name="start_date" id="start_date"
                                            placeholder="Start Date">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="end_date" class="col-form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control" name="end_date" id="end_date"
                                            placeholder="End Date">
                                    </div>

                                    <div class="form-group py-3">
                                        <button class="btn btn-primary" style="float:right;"><span
                                                class="bi bi-search"></span>
                                            Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Log Transaksi</h5>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Tanggal Sukses</th>
                                                    <th scope="col">Agen ID</th>
                                                    <th scope="col">Sender</th>
                                                    <th scope="col">Vtype</th>
                                                    <th scope="col">Tujuan</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">VSN</th>
                                                    <th scope="col">ID Karyawan</th>
                                                    <th scope="col">Nama Karyawan</th>
                                                    <th scope="col">Status</th>
                                                </thead>

                                                {{-- Tabel Log Transaksi --}}
                                                <tbody id="myTable">
                                                    @if (count($logpurchase) > 0)
                                                        @foreach ($logpurchase as $index => $li)
                                                            <tr>
                                                                <td>{{ $li->tanggal }}</td>
                                                                <td>{{ $li->tglsukses }}</td>
                                                                <td>{{ $li->agenid }}</td>
                                                                <td>{{ $li->sender }}</td>
                                                                <td>{{ $li->vtype }}</td>
                                                                <td>{{ $li->tujuan }}</td>
                                                                <td>{{ $li->harga }}</td>
                                                                <td>{{ $li->vsn }}</td>
                                                                <td>{{ $li->h2h_id }}</td>
                                                                <td>{{ $li->nama }}</td>
                                                                <td>
                                                                    @if ($li->status == 0)
                                                                        <input type="button"
                                                                            class="btn btn-outline-warning" value="Antri">
                                                                    @elseif ($li->status == 1)
                                                                        <input type="button" class="btn btn-outline-info"
                                                                            value="Sedang Diproses">
                                                                    @elseif ($li->status == 2)
                                                                        <input type="button" class="btn btn-outline-danger"
                                                                            value="Gagal">
                                                                    @elseif ($li->status == 3)
                                                                        <input type="button" class="btn btn-outline-dark"
                                                                            value="Refund">
                                                                    @elseif ($li->status == 4)
                                                                        <input type="button"
                                                                            class="btn btn-outline-success" value="Sukses">
                                                                    @else
                                                                        <input type="button"
                                                                            class="btn btn-outline-secondary"
                                                                            value="Error">
                                                                    @endif

                                                                </td>
                                                                {{-- {{ $li->status }} --}}
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        <tr>
                                                            <td colspan="11" style="text-align:center;"><b>No data
                                                                    available in this table
                                                                </b></td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!--Showing Entries And Showing Pagination-->
                                    <div class="col pb-4 px-sm-4 table-responsive">
                                        <label>
                                            Showing
                                            {{ $logpurchase->count() }} of {{ $logpurchase->total() }}
                                            entries
                                        </label>

                                        <label style="float:right;" class="table-responsive">
                                            {{ $logpurchase->links() }}
                                        </label>
                                    </div><!--End Showing Entries And Showing Pagination-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Edit Status --}}
            <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Status</h5>
                            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="status" class="col-form-label">Status</label>
                                <select class="form-select" name="status" required>
                                    <option value="0">Antri</option>
                                    <option value="1">Sedang Diproses</option>
                                    <option value="2">Gagal</option>
                                    <option value="3">Refund</option>
                                    <option value="4">Sukses</option>
                                    <option value="5">Error</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">Save</button>
                                <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('logtransaksi')
    <script>
        // $(document).ready(function() {
        //     $('.js-example-basic-single').select2();
        // });
    </script>
@endpush
