@section('title')
{{ empty($data) ? 'Tambah' : 'Edit' }} Transaksi
@endsection

<form action="{{ empty($data) ? route('transaksi.store') : route('transaksi.update', $data->id) }}" method="post">
    @csrf
    @if (!empty($data))
    @method('PUT')
    @endif
    <div class="card-body">
        <div class="form-group">
            <label for="Rekening">Rekening</label>
            <select name="rekening" class="form-control" id="rekening">
                <option value="" disabled {{!empty(@$data->rekening)?'':'selected'}}>== Pilih Rekening ==</option>
                @if(!empty(@$data->rekening->rekening))
                <option value="{{@$data->rekening->id}}" {{!empty(@$data->rekening->rekening)?'selected':''}}>
                    {{@$data->rekening->rekening}}
                </option>
                @endif
                @foreach($rekening as $rekening)
                <option value="{{ $rekening->id }}">{{ $rekening->rekening }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="Kategori">Kategori</label>
            <select name="kategori" class="form-control" id="kategori">
                <option value="" disabled {{!empty(@$data->kategori)?'':'selected'}}>== Pilih Kategori ==</option>
                @if(!empty(@$data->kategori->kategori))
                <option value="{{@$data->kategori->id}}" {{!empty(@$data->kategori->kategori)?'selected':''}}>
                    {{@$data->kategori->kategori}}
                </option>
                @endif
                @foreach($kategori as $kategori)
                <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                @endforeach

            </select>
        </div>
        <div class="form-group">
            <label for="Nominal">Nominal</label>
            <input type="number" name="nominal" class="form-control" id="nominal"
            value="{{ @$data->jumlah }}">
        </div>
        <div class="form-group">
            <label for="Keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="Tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal"
                     value="{{ !empty(@$data->kategori) ? getDateOnly(@$data->tanggal) : '' }}">
                </div>
                <div class="col-6">
                    <label for="Jam">Jam</label>
                    <input type="time" name="jam" class="form-control" id="jam"
                    value="{{ !empty(@$data->kategori) ? getTimeOnly(@$data->tanggal,'H:i') : '' }}">
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
