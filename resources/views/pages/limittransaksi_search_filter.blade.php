<div class="table-responsive">
        <table class="table table-bordered">
                <!-- Display search results here -->
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">ID Staff</th>
                        <th scope="col">Saldo</th>
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
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
                </tbody>
                @endforeach
                @else
                    <tr>
                        <td colspan="7" style="text-align:center;"><b>Limit Transaksi Not Found</b></td>
                    </tr>
                @endif
        </table>
    </div>

    <script>
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

