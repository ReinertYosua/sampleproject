<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use App\Models\Modalitas;
use App\Models\Pasien;
use App\Models\PendaftaranPemeriksaan;
use App\Models\DetailPendaftaranPemeriksaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendaftaranPemeriksaanKaryawanController extends Controller
{
    //
    public function index(){
        $datadaftarperiksa = PendaftaranPemeriksaan::join('pasien','pasien.id','=','pendaftaran_pemeriksaan.idPasien')
                        ->join('users', 'users.id', '=', 'pasien.idUser')
                        ->select('pendaftaran_pemeriksaan.id','pendaftaran_pemeriksaan.no_pendaftaran','users.name','pendaftaran_pemeriksaan.namaDokterPengirim','pendaftaran_pemeriksaan.tanggalDaftar','pendaftaran_pemeriksaan.fileLampiran')
                        ->orderBy('tanggalDaftar', 'desc')->get();

        return view('karyawan.pendaftaranpemeriksaan.index', compact('datadaftarperiksa'));
    }

    public function show($id){
        $getDetailPendaftaran =  DetailPendaftaranPemeriksaan::join('pendaftaran_pemeriksaan', 'pendaftaran_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idDaftarPemeriksaan')
        ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan')
        ->join('modalitas', 'modalitas.id', '=', 'jenis_pemeriksaan.idModalitas')
        ->select('jenis_pemeriksaan.namaJenisPemeriksaan', 'modalitas.namaModalitas', 'jenis_pemeriksaan.kelompokJenisPemeriksaan', 'detail_pendaftaran_pemeriksaan.jamMulai', 'detail_pendaftaran_pemeriksaan.jamSelesai', 'detail_pendaftaran_pemeriksaan.statusKetersediaan', 'detail_pendaftaran_pemeriksaan.keterangan', 'jenis_pemeriksaan.harga')
        ->where('pendaftaran_pemeriksaan.id', '=', $id)
        ->get();

        $html = "";
        foreach($getDetailPendaftaran as $get){
        $html .= "
        <tr>
            <td>".$get->namaJenisPemeriksaan ."</td>
            <td>".$get->namaModalitas ."</td>
            <td>".$get->kelompokJenisPemeriksaan ."</td>
            <td>".$get->jamMulai ."</td>
            <td>".$get->jamSelesai ."</td>
            <td>".$get->harga ."</td>";

            $html .= "<td>";

            if ($get->statusKetersediaan == 'ya') {
                $html .= "<span class='btn btn-success'>Sedang Digunakan</span>";
            } else {
                $html .= "<span class='btn btn-danger'>Dalam Reservasi</span>";
            }

            $html .= "</td>
                    <td>".$get->keterangan."</td>
                </tr>
            ";
        }
        $response['html'] = $html;

        return response()->json($response);
    }

    public function edit($id){
        

        // $getDaftarPemeriksaan = PendaftaranPemeriksaan::select('id','no_pendaftaran','namaDokterPengirim','tanggalDaftar','fileLampiran')
        // ->where('id', '=', $id)
        // ->get();

        $getDaftarPemeriksaan = PendaftaranPemeriksaan::join('pasien','pasien.id','=','pendaftaran_pemeriksaan.idPasien')
                        ->join('users', 'users.id', '=', 'pasien.idUser')
                        ->select('pendaftaran_pemeriksaan.id','pendaftaran_pemeriksaan.no_pendaftaran','users.name','pendaftaran_pemeriksaan.namaDokterPengirim','pendaftaran_pemeriksaan.tanggalDaftar','pendaftaran_pemeriksaan.fileLampiran')
                        ->where('pendaftaran_pemeriksaan.id', '=', $id)
                        ->get();

        $getDetailPendaftaran =  DetailPendaftaranPemeriksaan::join('pendaftaran_pemeriksaan', 'pendaftaran_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idDaftarPemeriksaan')
            ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan')
            ->join('modalitas', 'modalitas.id', '=', 'jenis_pemeriksaan.idModalitas')
            ->select('jenis_pemeriksaan.id as idJenisPemeriksaan', 'jenis_pemeriksaan.namaJenisPemeriksaan', 'modalitas.namaModalitas', 'jenis_pemeriksaan.kelompokJenisPemeriksaan', 'detail_pendaftaran_pemeriksaan.id', 'detail_pendaftaran_pemeriksaan.jamMulai', 'detail_pendaftaran_pemeriksaan.jamSelesai', 'detail_pendaftaran_pemeriksaan.statusKetersediaan', 'detail_pendaftaran_pemeriksaan.keterangan', 'jenis_pemeriksaan.harga', 'detail_pendaftaran_pemeriksaan.statusKetersediaan', 'detail_pendaftaran_pemeriksaan.keterangan')
            ->where('pendaftaran_pemeriksaan.id', '=', $id)
            ->get();

        $datajenispemeriksaan = JenisPemeriksaan::join('modalitas', 'modalitas.id','=','jenis_pemeriksaan.idModalitas')
                    ->select(['modalitas.namaModalitas as namaModalitas', 'modalitas.kodeRuang as kodeRuang', 'jenis_pemeriksaan.*'])
                    ->paginate(10);

        $slot = PendaftaranPemeriksaan::select('pendaftaran_pemeriksaan.tanggalDaftar', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan', 'jenis_pemeriksaan.namaJenisPemeriksaan', 'detail_pendaftaran_pemeriksaan.jamMulai', 'detail_pendaftaran_pemeriksaan.jamSelesai')
        ->join('detail_pendaftaran_pemeriksaan', 'detail_pendaftaran_pemeriksaan.idDaftarPemeriksaan', '=', 'pendaftaran_pemeriksaan.id')
        ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan')
        ->get();


        // dd($no);
        return view('karyawan.pendaftaranpemeriksaan.edit', compact('getDaftarPemeriksaan','getDetailPendaftaran','datajenispemeriksaan','slot'));
    }

    public function update(Request $request, $id)
    {
        //dd($request);
        // delete detail pendaftaran yang lama
        DetailPendaftaranPemeriksaan::where('idDaftarPemeriksaan', $id)->delete();

        $namaJenisPemeriksaan = $request->input('namaJenisPemeriksaan', []);
        $jamMulai = $request->input('jamMulai', []);
        $jamSelesai = $request->input('jamSelesai', []);
        $harga = $request->input('harga', []);
        $status = $request->input('status', []);
        $keterangan = $request->input('keterangan', []);
        for ($dp=0; $dp < count($namaJenisPemeriksaan); $dp++) {

            $detailDaftar=DetailPendaftaranPemeriksaan::create([
                'idDaftarPemeriksaan' => $id,
                'idJenisPemeriksaan' => Str::before($namaJenisPemeriksaan[$dp], '-'),//mengambil nilai paling depan dari 2-RRZZZ
                'jamMulai' => $jamMulai[$dp],
                'jamSelesai' => $jamSelesai[$dp],
                'statusKetersediaan' => $status[$dp],
                'keterangan' => $keterangan[$dp],
            ]);
        }

        return redirect()->route('karyawan.pendaftaranpemeriksaan.list')->with('success','Update Pendaftaran Pemeriksaan berhasil.');
    }

    public function download($file){
        $filePath = 'public/filelampiranpasien/' . $file;
        if (Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan');
        }
    }
}
