<div class="table-responsive">
    <table class="table table-bordered">
            <!-- Display search results here -->
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Staff</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
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
                        <td colspan="7" style="text-align:center;"><b>Data Limit Not Found</b></td>
                    </tr>
                @endif
            </tbody>
    </table>
</div>
