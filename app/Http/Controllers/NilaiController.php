<?php

namespace App\Http\Controllers;

use App\Models\AbsensiSiswa;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\NilaiEkstrakurikuler;
use App\Models\NilaiPrestasi;
use App\Models\NilaiSikap;
use App\Models\Siswa;
use App\Models\NilaiPoi;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function inputNilaiSikap()
    {
        $kelas = Kelas::all();
        return view('nilai_management.nilai_sikap', compact('kelas'));
    }

    public function detailNilaiSikap($id)
    {
        $siswa = Siswa::where('kode_kelas', $id)->get();
        $kode_kelas = $id;

        return view('nilai_management.detail_nilai_sikap', compact(['siswa', 'kode_kelas']));
    }

    public function storeNilaiSikap(Request $request, $id)
    {
        $request->validate([
            'kode_siswa' => ['required'],
            'jenis_sikap' => ['required'],
            'predikat' => ['required'],
            'desk' => ['required', 'max:255'],
            'semester' => ['required'],
        ]);

        NilaiSikap::create([
            'kode_siswa' => $request->kode_siswa,
            'jenis_sikap' => $request->jenis_sikap,
            'predikat' => $request->predikat,
            'desk' => $request->desk,
            'semester' => $request->semester,
        ]);

        return redirect(route('detail-nilai-sikap', ['id' => $id]));
    }

    public function inputNilaiPoi()
    {
        $kelas = Kelas::all();
        return view('nilai_management.nilai_poi', compact('kelas'));
    }

    public function detailNilaiPoi($id)
    {
        $siswa = Siswa::where('kode_kelas', $id)->get();
        $kode_kelas = $id;

        return view('nilai_management.detail_nilai_poi', compact(['siswa', 'kode_kelas']));
    }

    public function storeNilaiPoi(Request $request, $id)
    {
        $request->validate([
            'kode_siswa' => ['required'],
            'semester' => ['required', 'in:1(Ganjil),2(Genap)'],
            'nilai_principled' => ['required', 'numeric', 'between:0,4'],
            'nilai_balanced' => ['required', 'numeric', 'between:0,4'],
            'nilai_skill' => ['required', 'numeric', 'between:0,4'],
            'nilai_product' => ['required', 'numeric', 'between:0,4'],
            'comment_indonesian' => ['required', 'string', 'max:1000'],
            'comment_english' => ['required', 'string', 'max:1000'],
        ]);

        NilaiPoi::create([
            'kode_siswa' => $request->kode_siswa,
            'semester' => $request->semester,
            'nilai_principled' => $request->nilai_principled,
            'nilai_balanced' => $request->nilai_balanced,
            'nilai_skill' => $request->nilai_skill,
            'nilai_product' => $request->nilai_product,
            'comment_indonesian' => $request->comment_indonesian,
            'comment_english' => $request->comment_english,
        ]);

        return redirect(route('detail-nilai-poi', ['id' => $id]));
    }

    public function showNilaiLapor()
    {
        return view('nilai_management.show_nilai_lapor');
    }

    public function showNilaiLaporSiswa(Request $request)
    {

        $request->validate([
            'no_induk' => ['required'],
            'semester' => ['required'],
        ]);


        $siswa = Siswa::where('no_induk', $request->no_induk)->first();
        try {
            $nilai = Nilai::where('kode_siswa', $siswa->id)->where('semester', $request->semester)->get();

            $nilaiSikapSpritual = NilaiSikap::where('kode_siswa', $siswa->id)->where('jenis_sikap', 'spritual')->where('semester', $request->semester)->get();

            $nilaiSikapSosial = NilaiSikap::where('kode_siswa', $siswa->id)->where('jenis_sikap', 'sosial')->where('semester', $request->semester)->get();

            $sakit = AbsensiSiswa::where('kode_siswa', $siswa->id)->where('kode_kehadiran', 4)->count();

            $izin = AbsensiSiswa::where('kode_siswa', $siswa->id)->where('kode_kehadiran', 2)->count();

            $bertugasKeluar = AbsensiSiswa::where('kode_siswa', $siswa->id)->where('kode_kehadiran', 3)->count();

            $terlambat = AbsensiSiswa::where('kode_siswa', $siswa->id)->where('kode_kehadiran', 5)->count();

            $tanpaKeterangan = AbsensiSiswa::where('kode_siswa', $siswa->id)->where('kode_kehadiran', 6)->count();

            $absen = array("sakit" => $sakit, "izin" => $izin, "bertugasKeluar" => $bertugasKeluar, "terlambat" => $terlambat, "tanpaKeterangan" => $tanpaKeterangan);

            $ekstrakurikuler = NilaiEkstrakurikuler::where('kode_siswa', $siswa->id)->where('semester', $request->semester)->get();

            $prestasi = NilaiPrestasi::where('kode_siswa', $siswa->id)->where('semester', $request->semester)->get();

        } catch (\Throwable $th) {
            return view('nilai_management.components.search_not_found');
        }
        $title = $siswa->nama_siswa;
        $semester = $request->semester;

        return view('nilai_management.components.nilai_lapor', compact(['nilai', 'title', 'nilaiSikapSpritual', 'nilaiSikapSosial', 'siswa', 'semester', 'absen', 'ekstrakurikuler', 'prestasi']));
    }


}
