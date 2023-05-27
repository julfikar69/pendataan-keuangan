<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Rekening;
use App\Models\Transaksi;
use Illuminate\Http\Request;

use DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($datas = null)
    {
        if (empty($datas)) {
            $datas = Transaksi::get();
        }

        return view('transaksi.index', [
            'datas' => $datas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rekening = Rekening::get();
        $kategori = Kategori::get();
        return view('transaksi.create', [
            'rekening' => $rekening,
            'kategori' => $kategori
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kategori'    => 'required|exists:kategori,id',
            'rekening'    => 'required|exists:rekening,id',
            'nominal'     => 'required|integer|min:3',
            'keterangan'  => 'required|string',
            'tanggal'     => 'required|date',
            'jam'        => 'required|date_format:H:i',
        ], [
            'kategori.required' => 'Harap isi kategori',
            'kategori.exists' => 'Harap isi kategori sesuai data yang ada !',
            'rekening.required' => 'Harap isi rekening',
            'rekening.exists' => 'Harap isi rekening sesuai data yang ada !',
            'nominal.required' => 'Harap isi nominal',
            'nominal.integer' => 'Harap isi nominal dengan angka !',
            'nominal.min' => 'Harap isi nominal minimal 3 digit',
            'keterangan.required' => 'Harap isi keterangan!',
            'tanggal.required' => 'Harap isi tanggal!',
            'tanggal.date' => 'Harap isi tanggal dengan sesuai!',
            'jam.required' => 'Harap isi jam!',
            'jam.date_format' => 'Harap isi jam sesuai format, Contoh: 13:00!',
        ]);

        $tanggal = $request->tanggal . " " . $request->jam;

        $store = Transaksi::create([
            "kategori_id" => $request->kategori,
            "rekening_id" => $request->rekening,
            "jumlah" => $request->nominal,
            "keterangan" => $request->keterangan,
            "tanggal" => $tanggal
        ]);

        if ($store) {
            return redirect()->route('transaksi.index')->with('success', 'Berhasil Menyimpan Data');
        } else {
            return redirect()->route('transaksi.index')->with('error', 'Berhasil Menyimpan Data');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaksi::findOrFail($id);
        $rekening = Rekening::get();
        $kategori = Kategori::get();
        return view('transaksi.create', [
            'data'     => $data,
            'rekening' => $rekening,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Transaksi::findOrFail($id);

        $tanggal = $request->tanggal . " " . $request->jam;

        $res = $data->update([
            "kategori_id" => $request->kategori,
            "rekening_id" => $request->rekening,
            "jumlah" => $request->nominal,
            "keterangan" => $request->keterangan,
            "tanggal" => $tanggal
        ]);

        if ($res) {
            return redirect()->route('transaksi.index')->with('success', 'Berhasil Mengubah Data');
        } else {
            return redirect()->back()->with('error', 'Berhasil Mengubah Data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaksi::where('id', $id)->firstOrFail();
        $res = $data->delete();

        if ($res) {
            return redirect()->route('transaksi.index')->with('success', 'Berhasil Menghapus Data');
        } else {
            return redirect()->route('transaksi.index')->with('error', 'Berhasil Menghapus Data');
        }
    }

    public function search(Request $request)
    {
        $input = $request->key;

        $data = Transaksi::where('keterangan', 'LIKE', '%' . $input . '%')
            ->orWhere('jumlah', 'LIKE', '%' . $input . '%')
            ->orWhere('tanggal', 'LIKE', '%' . $input . '%')
            ->orWhereHas('rekening', function ($q) use ($input) {
                return $q->where('rekening', 'LIKE', '%' . $input . '%');
            })
            ->orWhereHas('kategori', function ($q) use ($input) {
                return $q->where('kategori', 'LIKE', '%' . $input . '%');
            })->get();
        return view('transaksi.index', [
            'datas' => $data
        ]);
    }
}
