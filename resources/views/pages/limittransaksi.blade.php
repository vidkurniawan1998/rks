@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Limit Transaksi</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Page</a></li>
                <li class="breadcrumb-item active">Limit Transaksi</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-file-spreadsheet-fill"></i>
                            Limit Transaksi
                            <button class="btn btn-primary btn-sm" style="float: right;" data-toggle="modal"
                                data-target="#modal-create"><i class="bi bi-plus-circle"></i> Tambah</button>
                        </h5>
                        <hr>

                        <!--Show Entry And Search Form-->
                        <div class="col pb-4 table-responsive">
                            <label for="entries">
                                Show
                                <select class="form-control-sm" id="entries" name="entries">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                entries
                            </label>

                            <label style="float:right;">
                                Search:
                                <input class="form-control-sm" id="myInput" type="text" placeholder="Search.."
                                    onkeyup="myFunction()">
                            </label>
                        </div> <!--End Show Entry And Search Form-->

                        <!-- Default Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="ignore-search">
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">ID Staff</th>
                                        <th scope="col">Saldo</th>
                                        <th scope="col">Tanggal Transaksi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr id="not-found-row" class="ignore-search" style="display:none;">
                                        <td colspan="6" style="font-weight:bold;text-align:center;">Limit transaksi tidak
                                            ditemukan</td>
                                    </tr>
                                    @if (count($limittransaksi) > 0)
                                        @foreach ($limittransaksi as $index => $li)
                                            <tr>
                                                <td>{{ $limittransaksi->firstItem() + $index }}</td>
                                                <td>{{ $li->nama }}</td>
                                                <td>{{ $li->idstaff }}</td>
                                                <td>{{ $li->saldo }}</td>
                                                <td>{{ $li->created_at }}</td>
                                                <td>
                                                    <button class="btn btn-primary edit-limittransaksi"
                                                        data-id="{{ $li->id }}" data-toggle="modal"
                                                        data-target="#modal-update"><span
                                                            class="bi bi-pen-fill"></span>Ubah</button>
                                                    <a href = "{{ route('limittransaksi.delete_limit_transaksi', ['id' => $li->id]) }}"
                                                        class="btn btn-danger"
                                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Item Ini?')"><span
                                                            class="bi bi-trash-fill"></span>Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" style="text-align:center;"><b>No data available in this table
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
                            {{ $limittransaksi->count() }} of {{ $limittransaksi->total() }}
                            entries
                        </label>

                        <label style="float:right;">
                            {{ $limittransaksi->links() }}
                        </label>
                    </div><!--End Showing Entries And Showing Pagination-->
                </div>
            </div>
        </div>

        <!--Modal Create Limit Transaksi-->
        <div class="modal fade" id="modal-create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Limit Transaksi</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="needs-validation" novalidate
                            action="{{ route('limittransaksi.store_limit_transaksi') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                                    required>
                                <div class="invalid-feedback">Harap masukkan nama anda!</div>
                            </div>
                            <div class="form-group">
                                <label for="idstaff" class="col-form-label">ID Staff:</label>
                                <select class="form-select" name="idstaff" required id="validationCustom04">
                                    <option selected disabled value="">Pilih ID Staff</option>
                                    <option value="CW001">CW001</option>
                                    <option value="CW002">CW002</option>
                                    <option value="CW003">CW003</option>
                                    <option value="CW004">CW004</option>
                                </select>
                                <div class="invalid-feedback">Pilih dulu staff ID!</div>
                            </div>
                            <div class="form-group">
                                <label for="saldo" class="col-form-label">Saldo:</label>
                                <input type="number" step="any" class="form-control" id="saldo" name="saldo"
                                    placeholder="Saldo" required>
                                <div class="invalid-feedback">Harap masukkan saldo anda!</div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">Save</button>
                                <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!--Modal Update General Setting-->
        <div class="modal fade" id="modal-update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Limit Transaksi</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" class="id">
                        <div class="form-group">
                            <label for="nama" class="col-form-label">Nama:</label>
                            <input type="text" class="form-control nama" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="idstaff" class="col-form-label">ID Staff:</label>
                            <select class="form-select idstaff" name="idstaff" required>
                                <option selected disabled value="">Pilih ID Staff</option>
                                <option value="CW001">CW001</option>
                                <option value="CW002">CW002</option>
                                <option value="CW003">CW003</option>
                                <option value="CW004">CW004</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="saldo" class="col-form-label">Saldo:</label>
                            <input type="number" step="any" class="form-control saldo" id="saldo"
                                name="saldo" placeholder="Saldo" required>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary update-limittransaksi">Save</button>
                            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('limittransaksi')
    <script>
        // Pencarian data limit transaksi dengan respon not found
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;

            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }

            var resultsNotFound = true;
            document.querySelectorAll("table tr:not(.ignore-search)").forEach(tr => {
                var isHidden = tr.offsetParent === null
                if (!isHidden) {
                    resultsNotFound = false;
                }
            })

            var notFoundLabel = document.getElementById('not-found-row');
            if (resultsNotFound) {
                notFoundLabel.style.display = "";
            } else {
                notFoundLabel.style.display = "none";
            }

        }

        //Menampilkan Hasil Pencarian Dari limit transaksi tanpa respon not found
        // $(document).ready(function() {
        //     $("#myInput").on("keyup", function() {
        //         var value = $(this).val().toLowerCase();
        //         $("#myTable tr").filter(function() {
        //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //         });
        //     });
        // });

        //Menampilkan Limit Transaksi Yang Akan Diedit Ketika Klik Tombol Ubah
        $(function() {
            $('.edit-limittransaksi').click(function() {
                var id = $(this).data('id');
                var url = '{{ url('limittransaksi/edit_limit_transaksi') }}' + '/' + id;

                $.ajax({
                    url: url,
                    type: 'get',
                    datatype: 'json',
                    success: function(response) {
                        if (response !== null) {
                            $('.id').val(response.id);
                            $('.nama').val(response.nama);
                            $('.idstaff').val(response.idstaff);
                            $('.saldo').val(response.saldo);
                        }
                    }
                })
            })

            //Menyimpan Perubahan Limit Transaksi
            $('.update-limittransaksi').click(function() {
                var id = $('.id').val();
                var nama = $('.nama').val();
                var idstaff = $('.idstaff').val();
                var saldo = $('.saldo').val();
                var url = '{{ url('limittransaksi/update_limit_transaksi') }}' + '/' + id;

                let formData = new FormData();
                formData.append("nama", nama);
                formData.append("idstaff", idstaff);
                formData.append("saldo", saldo);
                formData.append('_token', '{{ csrf_token() }}');

                $.ajax({
                    url: url,
                    type: 'POST',
                    datatype: 'json',
                    contentType: false,
                    processData: false,
                    cache: false,
                    data: formData,
                    success: function(response) {
                        location.reload();
                    }
                })
            })
        });
    </script>
@endpush
