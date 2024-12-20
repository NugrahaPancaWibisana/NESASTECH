<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreKeuanganRequest;
use App\Http\Requests\UpdateKeuanganRequest;
use App\Models\Keuangan;
use Carbon\Carbon;

class KeuanganController extends Controller
{
    public function index()
    {
        $data = Keuangan::orderBy('id', 'desc')->get();
        $today = Carbon::today()->toDateString();
        $dataHariIni = Keuangan::whereDate('tanggal', $today)->get();

        $totalMasuk = $dataHariIni->sum('masuk');
        $totalKeluar = $dataHariIni->sum('keluar');
        $selisih = $data->sum('masuk') - $data->sum('keluar');

        return view('dashboard', compact('data', 'totalMasuk', 'totalKeluar', 'selisih'));
    }

    public function laporanKeuangan()
    {
        return view('create');
    }

    public function store(StoreKeuanganRequest $request)
    {
        $request->validate([
            'masuk' => 'nullable|integer|required_without:keluar',
            'keluar' => 'nullable|integer|required_without:masuk',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
        ], [
            'masuk.required_without' => 'Field Masuk atau Keluar harus diisi.',
            'keluar.required_without' => 'Field Keluar atau Masuk harus diisi.',
        ]);

        Keuangan::create([
            'masuk' => $request->input('masuk'),
            'keluar' => $request->input('keluar'),
            'keterangan' => $request->input('keterangan', '-'),
            'tanggal' => $request->input('tanggal'),
        ]);

        return redirect()->route('keuangan.index')->with('success', 'Laporan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Keuangan $keuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        return view('edit', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeuanganRequest $request, Keuangan $keuangan)
    {
        $request->validate([
            'masuk' => 'nullable|integer|required_without:keluar',
            'keluar' => 'nullable|integer|required_without:masuk',
            'keterangan' => 'nullable|string',
            'tanggal' => 'required|date',
        ], [
            'masuk.required_without' => 'Field Masuk atau Keluar harus diisi.',
            'keluar.required_without' => 'Field Keluar atau Masuk harus diisi.',
        ]);

        $keuangan->update([
            'masuk' => $request->input('masuk'),
            'keluar' => $request->input('keluar'),
            'keterangan' => $request->input('keterangan', '-'),
            'tanggal' => $request->input('tanggal'),
        ]);

        return redirect()->route('keuangan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();

        return redirect()->route('keuangan.index')->with('success', 'Laporan berhasil dihapus.');
    }
}
