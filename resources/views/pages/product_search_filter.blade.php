<div class="table-responsive">
    <table class="table table-bordered">
            <!-- Display search results here -->
            <thead>
                <tr>
                    <th scope="col">Vtype</th>
                    <th scope="col">Harga 8</th>
                    <th scope="col">Harga 9</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Operator</th>
                </tr>
            </thead>
            <tbody>
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
                        <td colspan="7" style="text-align:center;"><b>Data Product Not Found</b></td>
                    </tr>
                @endif
            </tbody>
    </table>
</div>
