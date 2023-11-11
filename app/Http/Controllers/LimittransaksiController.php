<?php

namespace App\Http\Controllers;

use Session;

use App\Limittransaksi;
use App\Datalimit;
use App\Exports\DatalimitExport;
use App\Imports\DatalimitImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LimittransaksiController extends Controller
{
    public function index()
    {
        $limittransaksi = Limittransaksi::paginate(10);
        return view('pages.limittransaksi', compact('limittransaksi'));
    }

    public function store_limit_transaksi(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'idstaff' => 'required',
            'saldo' => 'required|numeric',
        ]);

        $limittransaksi = Limittransaksi::create([
            'nama' => $request->nama,
            'idstaff' => $request->idstaff,
            'saldo' => $request->saldo,
        ]);

        if ($limittransaksi) {
            return redirect()->back()->with(['success' => 'Data limit transaksi berhasil tersimpan'], 201);
        } else {
            return redirect()->back()->with(['error' => 'Data limit transaksi gagal tersimpan'], 204);
        }
    }

    public function show_limit_transaksi($id)
    {
        //Menampilkan Limit Transaksi Berdasarkan ID Nya
        $limittransaksi = Limittransaksi::find($id);

        //Respon Dari Modal Untuk Menampilkan Data
        return response()->json($limittransaksi);
    }

    public function update_limit_transaksi(Request $request, $id)
    {
        //Menemukan Data Berdasarkan User ID
        $limittransaksi = Limittransaksi::find($id);

        $this->validate($request, [
            'nama' => 'required',
            'idstaff' => 'required',
            'saldo' => 'required|numeric',
        ]);

        $limittransaksi->update([
            'nama' => $request->nama,
            'idstaff' => $request->idstaff,
            'saldo' => $request->saldo,
        ]);

        if ($limittransaksi) {
            return response()->json($limittransaksi);
        } else {
            return response()->json(['error' => 'Error Update']);
        }
    }

    public function delete_limit_transaksi($id)
    {
        //Menemukan Limit Transaksi Berdasarkan ID Nya
        $limittransaksi = Limittransaksi::find($id);

        $limittransaksi->delete();
        return redirect()->back()->with(['success' => 'Data limit transaksi berhasil dihapus']);
    }

    public function view_data_limit()
    {
        $datalimit = DataLimit::paginate(10);
        return view('pages.datalimit', compact('datalimit'));
    }

    public function store_data_limit_2(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);

        $file = $request->file('file');

        $nama_file = rand() . $file->getClientOriginalName();

        $file->move('file_limit', $nama_file);

        $datalimit = Excel::import(new DatalimitImport, public_path('/file_limit/' . $nama_file));

        return redirect()->back()->with(['success' => 'Data limit berhasil diimport'], 201);
    }

    public function download_data_limit_2(){
        return Excel::download(new DatalimitExport, 'data_limit.xlsx');
    }

    public function store_data_limit(Request $request)
    {
        $this->validate($request, [
            'namafile' => 'required|mimes:xls,xlsx',
        ]);

        //Process Upload Data Limit Excel
        $namafile = $request->file('namafile');
        $originalFileName = $namafile->getClientOriginalName();
        $namafile->storeAs('uploads/excel', $originalFileName);

        //Insert Data Limit Excel
        $datalimit = Datalimit::create([
            'namafile' => request('namafile')->store('uploads/excel'),
        ]);

        if ($datalimit) {
            return redirect()->back()->with(['successs' => 'Data limit berhasil ditambahkan'], 201);
        } else {
            return redirect()->back()->with(['error' => 'Data limit gagal ditambahkan'], 500);
        }
    }
}
