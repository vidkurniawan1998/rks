@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Data Limit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Page</a></li>
                <li class="breadcrumb-item active">Data Limit</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-file-spreadsheet-fill"></i>
                            Data Limit
                            <div class="btn-toolbar" style="float:right;">
                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-create"><i
                                        class="bi bi-upload"></i> Upload</button>
                                <a href="{{ route('limittransaksi.download_data_limit') }}" class="btn btn-success btn-sm"
                                    style="margin-left:5px;"><i class="bi bi-download"></i> Download</a>
                            </div>
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
                                        <th scope="col">ID Staff</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Saldo</th>
                                        <th scope="col">Tanggal Transaksi</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <tr id="not-found-row" class="ignore-search" style="display:none;">
                                        <td colspan="6" style="font-weight:bold;text-align:center;">Data limit tidak
                                            ditemukan</td>
                                    </tr>
                                    @if (count($datalimit) > 0)
                                        @foreach ($datalimit as $index => $li)
                                            <tr>
                                                <td>{{ $datalimit->firstItem() + $index }}</td>
                                                <td>{{ $li->idstaff }}</td>
                                                <td>{{ $li->nama }}</td>
                                                <td>{{ $li->saldo }}</td>
                                                <td>{{ $li->created_at }}</td>
                                                <td>
                                                    <button class="btn btn-primary" data-toggle="modal"
                                                        data-target="#modal-update"><span class="bi bi-pen-fill"></span>
                                                        Ubah</button>
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
                            {{ $datalimit->count() }} of {{ $datalimit->total() }}
                            entries
                        </label>

                        <label style="float:right;">
                            {{ $datalimit->links() }}
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
                        <h5 class="modal-title">Tambah Data Limit</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('limittransaksi.store_data_limit') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="file" class="col-form-label">Nama File:</label>
                                <input type="file" class="form-control" id="file" name="file" placeholder="Nama">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary">Upload</button>
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
                        <h5 class="modal-title" id="exampleModalLabel">Update Data Limit</h5>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" class="id">
                        <div class="form-group">
                            <label for="namafile" class="col-form-label">Nama File:</label>
                            <input type="file" class="form-control namafile" name="namafile">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary update-limittransaksi">Upload</button>
                            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('datalimit')
    <script>
        // Pencarian data limit dengan respon not found
        $(document).ready(function() {
            // Pencarian data limit transaksi
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr:not(.ignore-search)").each(function() {
                    var found = false;
                    $(this).find('td').each(function() {
                        if ($(this).text().toLowerCase().indexOf(value) > -1) {
                            found = true;
                            return false; // exit the loop if a match is found
                        }
                    });
                    if (found) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Check if any rows are visible
                var resultsNotFound = $("#myTable tr:not(.ignore-search):visible").length === 0;

                // Show/hide the "Not Found" row
                $("#not-found-row").toggle(resultsNotFound);
            });
        });

        //Menampilkan Hasil Pencarian Dari Data General Settings
        // $(document).ready(function() {
        //     $("#myInput").on("keyup", function() {
        //         var value = $(this).val().toLowerCase();
        //         $("#myTable tr").filter(function() {
        //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //         });
        //     });
        // });

        // $(function() {
        //     // Menampilkan Data Di Form Ketika Tombol Edit Di Klik
        //     $('.edit-datalimit').click(function() {
        //         var id = $(this).data('id');
        //         var url = '{{ url('generalsettings/edit') }}' + '/' + id;
        //         $.ajax({
        //             url: url,
        //             type: 'get',
        //             datatype: 'json',
        //             success: function(response) {
        //                 if (response !== null) {
        //                     $('.id').val(response.id);
        //                     $('.nama_file').val(response.nama_file);
        //                 }
        //             }
        //         })
        //     })

        //     //Menyimpan Data Perubahan Ketika Di Klik Tombol Save Di Klik Di Update Data
        //     $('.update-datalimit').click(function() {
        //         var id = $('.id').val();
        //         var nama_file = $('.nama_file').val();
        //         var url = '{{ url('') }}' + '/' +

        //             let formData = new FormData();
        //         formData.append("nama", title);
        //         formData.append('nama_file', nama_file);
        //         formData.append('_token', '{{ csrf_token() }}');

        //         $.ajax({
        //             url: url,
        //             type: 'POST',
        //             datatype: 'json',
        //             contentType: false,
        //             processData: false,
        //             cache: false,
        //             data: formData,
        //             success: function(response) {
        //                 location.reload();
        //             }
        //         })
        //     })
        // });
    </script>
@endpush
