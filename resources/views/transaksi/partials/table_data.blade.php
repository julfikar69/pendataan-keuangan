<table class="table table-1 table-hover b-a" id="table-transaksi" aria-label="table-transaksi">
    <thead class="bg-light ">
        <tr>
            <!-- <th style="width:5%">#</th> -->
            <th>Kategori</th>
            <th>Rekening</th>
            <th>Nominal</th>
            <th>Keterangan</th>
            <th>Waktu</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{$data->kategori->kategori}}</td>
            <td>{{$data->rekening->rekening}}</td>
            <td>{{toRupiah($data->jumlah)}}</td>
            <td>{{$data->keterangan}}</td>
            <td>{{$data->tanggal}}</td>
            <td>
                <a href="{{route('transaksi.edit',['transaksi' => $data->id])}}">
                    <button class="btn btn-primary">
                        Edit
                    </button>
                </a>
                <form action="{{route('transaksi.destroy',['transaksi' => $data->id])}}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>