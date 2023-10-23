@extends('layouts.admin')
@section('content')
    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Page</a></li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-file-spreadsheet-fill"></i>
                            Produk
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
                                <input class="form-control-sm" id="myInput" type="text" placeholder="Search..">
                            </label>
                        </div> <!--End Show Entry And Search Form-->

                        <!-- Default Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">Vtype</th>
                                        <th scope="col">Harga 8</th>
                                        <th scope="col">Harga 9</th>
                                        <th scope="col">Jenis</th>
                                        <th scope="col">Operator</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    @if (count($product) > 0)
                                        @foreach ($product as $index => $li)
                                            <tr>
                                                <td>{{ $li->vtype }}</td>
                                                <td>{{ $li->harga8 }}</td>
                                                <td>{{ $li->harga9 }}</td>
                                                <td>{{ $li->jenis }}</td>
                                                <td>{{ $li->opr }}</td>
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
                            {{ $product->count() }} of {{ $product->total() }}
                            entries
                        </label>

                        <label style="float:right;">
                            {{ $product->links() }}
                        </label>
                    </div><!--End Showing Entries And Showing Pagination-->
                </div>
            </div>
        </div>
    </section>
@endsection
@push('product')
    <script>
        //Menampilkan Hasil Pencarian Dari Data General Settings
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        //Menampilkan Entry Data Halaman
        $(document).ready(function() {
            var table = $('#myTable tr').DataTable({
                "lengthMenu": [10, 25, 50, 100], // Define the options
                "pageLength": 10, // Default number of rows to display
            });

            $('#entries').on('change', function() {
                var selectedValue = $(this).val();
                table.page.len(selectedValue).draw();
            });
        });
    </script>
@endpush
