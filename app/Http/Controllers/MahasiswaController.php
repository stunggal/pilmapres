<?php

namespace App\Http\Controllers;

use App\Models\kriteria;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = mahasiswa::all();

        // dinormalisasikan
        // pembagi
        $pembagiAkademik = 0;
        $pembagiBiaya = 0;
        $pembagiMateri = 0;
        $pembagiAdab = 0;
        foreach ($mahasiswas as $mahasiswa) {
            $pembagiAkademik += $mahasiswa->akademik ** 2;
            $pembagiBiaya += $mahasiswa->biaya ** 2;
            $pembagiMateri += $mahasiswa->materi ** 2;
            $pembagiAdab += $mahasiswa->adab ** 2;
        };
        $pembagiAkademik = sqrt($pembagiAkademik);
        $pembagiBiaya = sqrt($pembagiBiaya);
        $pembagiMateri = sqrt($pembagiMateri);
        $pembagiAdab = sqrt($pembagiAdab);

        $normalisasiAkademik = 0;
        $normalisasiBiaya = 0;
        $normalisasiMateri = 0;
        $normalisasiAdab = 0;
        foreach ($mahasiswas as $mahasiswa) {
            $mahasiswa->akademik = $mahasiswa->akademik / $pembagiAkademik;
            $mahasiswa->biaya = $mahasiswa->biaya / $pembagiBiaya;
            $mahasiswa->materi = $mahasiswa->materi / $pembagiMateri;
            $mahasiswa->adab = $mahasiswa->adab / $pembagiAdab;
        }

        // normalisasi terbobot
        $kriterias = kriteria::all();
        $i = 0;
        foreach ($mahasiswas as $mahasiswa) {
            $mahasiswa->akademik = $mahasiswa->akademik * $kriterias[0]->nilai;
            $mahasiswa->biaya = $mahasiswa->biaya * $kriterias[0]->biaya;
            $mahasiswa->materi = $mahasiswa->materi * $kriterias[0]->materi;
            $mahasiswa->adab = $mahasiswa->adab * $kriterias[0]->adab;
        }

        // matrik solusi ideal
        $minMaxAkademik = [];
        $minMaxBiaya = [];
        $minMaxMateri = [];
        $minMaxAdab = [];
        foreach ($mahasiswas as $mahasiswa) {
            array_push($minMaxAkademik, $mahasiswa->akademik);
            array_push($minMaxBiaya, $mahasiswa->biaya);
            array_push($minMaxMateri, $mahasiswa->materi);
            array_push($minMaxAdab, $mahasiswa->adab);
        }

        // total perangkingan
        // D+ & D-
        foreach ($mahasiswas as $mahasiswa) {
            $mahasiswa['D+'] = sqrt(((max($minMaxAkademik) - $mahasiswa->akademik) ** 2) + ((max($minMaxBiaya) - $mahasiswa->biaya) ** 2) + ((max($minMaxMateri) - $mahasiswa->materi) ** 2) + ((max($minMaxAdab) - $mahasiswa->adab) ** 2));
            $mahasiswa['D-'] = sqrt(((min($minMaxAkademik) - $mahasiswa->akademik) ** 2) + ((min($minMaxBiaya) - $mahasiswa->biaya) ** 2) + ((min($minMaxMateri) - $mahasiswa->materi) ** 2) + ((min($minMaxAdab) - $mahasiswa->adab) ** 2));
        }

        // total akhir
        foreach ($mahasiswas as $mahasiswa) {
            $mahasiswa['total'] = $mahasiswa['D-'] / ($mahasiswa['D+'] + $mahasiswa['D-']);
        }

        $mahasiswas = $mahasiswas->sortBy('adab')->values()->all();

        return view('dashboard.index', [
            'mahasiswas' => $mahasiswas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'akademik' => 'required',
            'biaya' => 'required',
            'materi' => 'required',
            'adab' => 'required',
        ]);
        mahasiswa::create($validatedData);
        return redirect('/')->with('success', 'Data mahasiswa telah ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        //
    }
}
