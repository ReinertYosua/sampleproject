<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use App\Models\Karyawan;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\DraftLaporanPemeriksaan;
use App\Models\PendaftaranPemeriksaan;
use App\Models\DetailPendaftaranPemeriksaan;
use App\Models\TransaksiPemeriksaan;
use App\Models\DetailTransaksiPemeriksaan;
use App\Models\DetailHasilPemeriksaan;
use App\Models\HasilPemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HasilPemeriksaanController extends Controller
{
    //

    public function index(){
    //    dd(Auth::user()->id);

        if(Auth::user()->role=="dokter"){
            $hasilPemeriksaan = HasilPemeriksaan::join('transaksi_pemeriksaan as b', 'b.id', '=', 'hasil_pemeriksaan.idTransaksiPemeriksaan')
            ->join('pendaftaran_pemeriksaan as g', 'g.id', '=', 'b.idDaftarPemeriksaan')
            ->join('dokter as c', 'c.id', '=', 'b.idDokter')
            ->join('users as d', 'd.id', '=', 'c.idUser')
            ->join('pasien as e', 'e.id', '=', 'g.idPasien')
            ->join('users as f', 'f.id', '=', 'e.idUser')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus1
                FROM detail_transaksi_pemeriksaan
                WHERE status = "1"
                GROUP BY idTransaksiPemeriksaan
            ) as status1'), 'status1.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus2
                FROM detail_transaksi_pemeriksaan
                WHERE status = "2"
                GROUP BY idTransaksiPemeriksaan
            ) as status2'), 'status2.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus3
                FROM detail_transaksi_pemeriksaan
                WHERE status = "3"
                GROUP BY idTransaksiPemeriksaan
            ) as status3'), 'status3.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus4
                FROM detail_transaksi_pemeriksaan
                WHERE status = "4"
                GROUP BY idTransaksiPemeriksaan
            ) as status4'), 'status4.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus5
                FROM detail_transaksi_pemeriksaan
                WHERE status = "5"
                GROUP BY idTransaksiPemeriksaan
            ) as status5'), 'status5.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus6
                FROM detail_transaksi_pemeriksaan
                WHERE status = "6"
                GROUP BY idTransaksiPemeriksaan
            ) as status6'), 'status6.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idHasilPemeriksaan, COUNT(laporan) as laporan
                FROM detail_hasil_pemeriksaan
                WHERE laporan = ""
                GROUP BY idHasilPemeriksaan
            ) as h'), 'h.idHasilPemeriksaan', '=', 'hasil_pemeriksaan.id')
            ->where('d.id','=', Auth::user()->id)
            ->select(
                'hasil_pemeriksaan.id',
                'hasil_pemeriksaan.no_transaksi_pemeriksaan',
                'b.tanggalPemeriksaan',
                'g.namaDokterPengirim as namaDokterRekomendasi',
                'd.name as namaDokterRadiology',
                'f.name as namaPasien',
                'd.name as namaDokter',
                DB::raw('COALESCE(h.laporan, 0) as TotalLaporanBelumAda'),
                DB::raw('COALESCE(status1.totalStatus1, NULL) AS totalStatus1'),
                DB::raw('COALESCE(status2.totalStatus2, NULL) AS totalStatus2'),
                DB::raw('COALESCE(status3.totalStatus3, NULL) AS totalStatus3'),
                DB::raw('COALESCE(status4.totalStatus4, NULL) AS totalStatus4'),
                DB::raw('COALESCE(status5.totalStatus5, NULL) AS totalStatus5'),
                DB::raw('COALESCE(status6.totalStatus6, NULL) AS totalStatus6')
            )
            ->get();
            
        }else if(Auth::user()->role=="karyawan"){
            $hasilPemeriksaan = HasilPemeriksaan::join('transaksi_pemeriksaan as b', 'b.id', '=', 'hasil_pemeriksaan.idTransaksiPemeriksaan')
            ->join('pendaftaran_pemeriksaan as g', 'g.id', '=', 'b.idDaftarPemeriksaan')
            ->join('dokter as c', 'c.id', '=', 'b.idDokter')
            ->join('users as d', 'd.id', '=', 'c.idUser')
            ->join('pasien as e', 'e.id', '=', 'g.idPasien')
            ->join('users as f', 'f.id', '=', 'e.idUser')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus1
                FROM detail_transaksi_pemeriksaan
                WHERE status = "1"
                GROUP BY idTransaksiPemeriksaan
            ) as status1'), 'status1.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus2
                FROM detail_transaksi_pemeriksaan
                WHERE status = "2"
                GROUP BY idTransaksiPemeriksaan
            ) as status2'), 'status2.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus3
                FROM detail_transaksi_pemeriksaan
                WHERE status = "3"
                GROUP BY idTransaksiPemeriksaan
            ) as status3'), 'status3.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus4
                FROM detail_transaksi_pemeriksaan
                WHERE status = "4"
                GROUP BY idTransaksiPemeriksaan
            ) as status4'), 'status4.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus5
                FROM detail_transaksi_pemeriksaan
                WHERE status = "5"
                GROUP BY idTransaksiPemeriksaan
            ) as status5'), 'status5.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus6
                FROM detail_transaksi_pemeriksaan
                WHERE status = "6"
                GROUP BY idTransaksiPemeriksaan
            ) as status6'), 'status6.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idHasilPemeriksaan, COUNT(laporan) as laporan
                FROM detail_hasil_pemeriksaan
                WHERE laporan = ""
                GROUP BY idHasilPemeriksaan
            ) as h'), 'h.idHasilPemeriksaan', '=', 'hasil_pemeriksaan.id')
            ->select(
                'hasil_pemeriksaan.id',
                'hasil_pemeriksaan.no_transaksi_pemeriksaan',
                'b.tanggalPemeriksaan',
                'g.namaDokterPengirim as namaDokterRekomendasi',
                'd.name as namaDokterRadiology',
                'f.name as namaPasien',
                'd.name as namaDokter',
                DB::raw('COALESCE(h.laporan, 0) as TotalLaporanBelumAda'),
                DB::raw('COALESCE(status1.totalStatus1, NULL) AS totalStatus1'),
                DB::raw('COALESCE(status2.totalStatus2, NULL) AS totalStatus2'),
                DB::raw('COALESCE(status3.totalStatus3, NULL) AS totalStatus3'),
                DB::raw('COALESCE(status4.totalStatus4, NULL) AS totalStatus4'),
                DB::raw('COALESCE(status5.totalStatus5, NULL) AS totalStatus5'),
                DB::raw('COALESCE(status6.totalStatus6, NULL) AS totalStatus6')
            )
            ->get();
        }else if(Auth::user()->role=="pasien"){
            $hasilPemeriksaan = HasilPemeriksaan::join('transaksi_pemeriksaan as b', 'b.id', '=', 'hasil_pemeriksaan.idTransaksiPemeriksaan')
            ->join('pendaftaran_pemeriksaan as g', 'g.id', '=', 'b.idDaftarPemeriksaan')
            ->join('dokter as c', 'c.id', '=', 'b.idDokter')
            ->join('users as d', 'd.id', '=', 'c.idUser')
            ->join('pasien as e', 'e.id', '=', 'g.idPasien')
            ->join('users as f', 'f.id', '=', 'e.idUser')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus1
                FROM detail_transaksi_pemeriksaan
                WHERE status = "1"
                GROUP BY idTransaksiPemeriksaan
            ) as status1'), 'status1.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus2
                FROM detail_transaksi_pemeriksaan
                WHERE status = "2"
                GROUP BY idTransaksiPemeriksaan
            ) as status2'), 'status2.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus3
                FROM detail_transaksi_pemeriksaan
                WHERE status = "3"
                GROUP BY idTransaksiPemeriksaan
            ) as status3'), 'status3.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus4
                FROM detail_transaksi_pemeriksaan
                WHERE status = "4"
                GROUP BY idTransaksiPemeriksaan
            ) as status4'), 'status4.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus5
                FROM detail_transaksi_pemeriksaan
                WHERE status = "5"
                GROUP BY idTransaksiPemeriksaan
            ) as status5'), 'status5.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus6
                FROM detail_transaksi_pemeriksaan
                WHERE status = "6"
                GROUP BY idTransaksiPemeriksaan
            ) as status6'), 'status6.idTransaksiPemeriksaan', '=', 'b.id')
            ->leftJoin(DB::raw('(
                SELECT idHasilPemeriksaan, COUNT(laporan) as laporan
                FROM detail_hasil_pemeriksaan
                WHERE laporan = ""
                GROUP BY idHasilPemeriksaan
            ) as h'), 'h.idHasilPemeriksaan', '=', 'hasil_pemeriksaan.id')
            ->where('f.id','=', Auth::user()->id)
            ->select(
                'hasil_pemeriksaan.id',
                'hasil_pemeriksaan.no_transaksi_pemeriksaan',
                'b.tanggalPemeriksaan',
                'g.namaDokterPengirim as namaDokterRekomendasi',
                'd.name as namaDokterRadiology',
                'f.name as namaPasien',
                'd.name as namaDokter',
                DB::raw('COALESCE(h.laporan, 0) as TotalLaporanBelumAda'),
                DB::raw('COALESCE(status1.totalStatus1, NULL) AS totalStatus1'),
                DB::raw('COALESCE(status2.totalStatus2, NULL) AS totalStatus2'),
                DB::raw('COALESCE(status3.totalStatus3, NULL) AS totalStatus3'),
                DB::raw('COALESCE(status4.totalStatus4, NULL) AS totalStatus4'),
                DB::raw('COALESCE(status5.totalStatus5, NULL) AS totalStatus5'),
                DB::raw('COALESCE(status6.totalStatus6, NULL) AS totalStatus6')
            )
            ->get();
        }
        // dd($hasilPemeriksaan);
        return view('dokter.hasilpemeriksaan.index',compact('hasilPemeriksaan'));
    }

    public function show($id){
        $dataHasilPemeriksaan = HasilPemeriksaan::join('transaksi_pemeriksaan as b', 'b.id', '=', 'hasil_pemeriksaan.idTransaksiPemeriksaan')
                ->join('pendaftaran_pemeriksaan as g', 'g.id', '=', 'b.idDaftarPemeriksaan')
                ->join('dokter as c', 'c.id', '=', 'b.idDokter')
                ->join('users as d', 'd.id', '=', 'c.idUser')
                ->join('pasien as e', 'e.id', '=', 'g.idPasien')
                ->join('users as f', 'f.id', '=', 'e.idUser')
                ->where('hasil_pemeriksaan.id','=', $id)
                ->select(
                    'hasil_pemeriksaan.id as idHasilPemeriksaan',
                    'hasil_pemeriksaan.no_transaksi_pemeriksaan',
                    'b.id as idTransaksiPemeriksaan',
                    'b.tanggalPemeriksaan',
                    'g.namaDokterPengirim as namaDokterRekomendasi',
                    'f.name as namaPasien',
                    'd.name as namaDokter'
                )
                ->get();

        $namapasien = $dataHasilPemeriksaan[0]->namaPasien;
        $tglperiksa = $dataHasilPemeriksaan[0]->tanggalPemeriksaan;
        $notransaksi = $dataHasilPemeriksaan[0]->no_transaksi_pemeriksaan;
        $namadokterpengirim = $dataHasilPemeriksaan[0]->namaDokterRekomendasi;

        $getDetailHasil = HasilPemeriksaan::where('hasil_pemeriksaan.id','=',$id)
            ->join('detail_hasil_pemeriksaan', 'hasil_pemeriksaan.id', '=', 'detail_hasil_pemeriksaan.idHasilPemeriksaan')
            ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_hasil_pemeriksaan.idJenisPemeriksaan')
            ->select(
                'hasil_pemeriksaan.id',
                'jenis_pemeriksaan.namaJenisPemeriksaan',
                'jenis_pemeriksaan.kelompokJenisPemeriksaan',
                'detail_hasil_pemeriksaan.laporan'
            )
            ->get();

        $html = "";
    
        foreach($getDetailHasil as $get){
        $html .= "
        
        <tr>
            <td>".$get->namaJenisPemeriksaan."</td>
            <td>".$get->kelompokJenisPemeriksaan."</td>
            <td>".$get->laporan."</td>

        </tr>
            ";
        }

        return response()->json([
            'html' => $html,
            'namapasien' => $namapasien,
            'tglperiksa' => $tglperiksa,
            'notransaksi' => $notransaksi,
            'namadokterpengirim' => $namadokterpengirim,
        ]);
    }

    public function edit($id){
        // $getHasilPemeriksaan = HasilPemeriksaan::findorfail($id);
        
        $getHasilPemeriksaan = HasilPemeriksaan::join('transaksi_pemeriksaan as b', 'b.id', '=', 'hasil_pemeriksaan.idTransaksiPemeriksaan')
            ->join('pendaftaran_pemeriksaan as g', 'g.id', '=', 'b.idDaftarPemeriksaan')
            ->join('dokter as c', 'c.id', '=', 'b.idDokter')
            ->join('users as d', 'd.id', '=', 'c.idUser')
            ->join('pasien as e', 'e.id', '=', 'g.idPasien')
            ->join('users as f', 'f.id', '=', 'e.idUser')
            ->join('karyawan as h','h.id','=','hasil_pemeriksaan.idKaryawan')
            ->join('users as i','i.id','=','h.idUser')
            ->where('hasil_pemeriksaan.id', $id)
            ->select(
                'hasil_pemeriksaan.id',
                'hasil_pemeriksaan.idTransaksiPemeriksaan',
                'b.no_transaksi_pemeriksaan',
                'b.tanggalPemeriksaan',
                'g.namaDokterPengirim as namaDokterRekomendasi',
                'f.name as namaPasien',
                'e.noIdentitas as noIdentitas',
                'e.tanggalLahir as tanggalLahir',
                'e.jenisKelamin as jenisKelamin',
                'e.noHp as noHp',
                'e.alamat',
                'd.name as namaDokter',
                'i.name as namaKaryawan'
            )
            ->get();

        $getDetailHasil = HasilPemeriksaan::where('hasil_pemeriksaan.id','=',$id)
            ->join('detail_hasil_pemeriksaan', 'hasil_pemeriksaan.id', '=', 'detail_hasil_pemeriksaan.idHasilPemeriksaan')
            ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_hasil_pemeriksaan.idJenisPemeriksaan')
            ->select(
                
                'jenis_pemeriksaan.id as idJenisPemeriksaan',
                'jenis_pemeriksaan.namaJenisPemeriksaan',
                'jenis_pemeriksaan.kelompokJenisPemeriksaan',
                'detail_hasil_pemeriksaan.id',
                'detail_hasil_pemeriksaan.laporan',
                'detail_hasil_pemeriksaan.jamMulaiAlat',
                'detail_hasil_pemeriksaan.jamSelesaiAlat',
                'detail_hasil_pemeriksaan.ruangan'
            )
            ->get();

        //dd($getDetailHasil);
        return view('dokter.hasilpemeriksaan.edit', compact('getHasilPemeriksaan','getDetailHasil'));
    }

    public function update(Request $request, $id)
    {
      
        $idDetailLaporan = $request->input('idDetailLaporan', []);
        $laporan = $request->input('laporan', []);

        for ($dp=0; $dp < count($idDetailLaporan); $dp++) {

            DetailHasilPemeriksaan::where('id', $idDetailLaporan[$dp])
            ->update(['laporan' => $laporan[$dp]]);
        }
        DetailTransaksiPemeriksaan::where('idTransaksiPemeriksaan', $request->id_transaksi_pemeriksaan)
            ->update(['status' => '5']);
        //status report ready
    
        return redirect()->route('dokter.hasilpemeriksaan.index')->with('success','Laporan Pemeriksaan '.$request->no_transaksi_pemeriksaan.' berhasil disimpan');
    }

    public function preview($id){
        $getHasilPemeriksaan = HasilPemeriksaan::join('transaksi_pemeriksaan as b', 'b.id', '=', 'hasil_pemeriksaan.idTransaksiPemeriksaan')
        ->join('pendaftaran_pemeriksaan as g', 'g.id', '=', 'b.idDaftarPemeriksaan')
        ->join('dokter as c', 'c.id', '=', 'b.idDokter')
        ->join('users as d', 'd.id', '=', 'c.idUser')
        ->join('pasien as e', 'e.id', '=', 'g.idPasien')
        ->join('users as f', 'f.id', '=', 'e.idUser')
        ->join('karyawan as h','h.id','=','hasil_pemeriksaan.idKaryawan')
        ->join('users as i','i.id','=','h.idUser')
        ->where('hasil_pemeriksaan.id', $id)
        ->select(
            'hasil_pemeriksaan.id',
            'hasil_pemeriksaan.idTransaksiPemeriksaan',
            'b.no_transaksi_pemeriksaan',
            'b.tanggalPemeriksaan',
            'g.namaDokterPengirim as namaDokterRekomendasi',
            'f.name as namaPasien',
            'e.noIdentitas as noIdentitas',
            'e.tanggalLahir as tanggalLahir',
            'e.jenisKelamin as jenisKelamin',
            'e.noHp as noHp',
            'e.alamat',
            'd.name as namaDokter',
            'i.name as namaKaryawan'
        )
        ->get();

        $getDetailHasil = HasilPemeriksaan::where('hasil_pemeriksaan.id','=',$id)
            ->join('detail_hasil_pemeriksaan', 'hasil_pemeriksaan.id', '=', 'detail_hasil_pemeriksaan.idHasilPemeriksaan')
            ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_hasil_pemeriksaan.idJenisPemeriksaan')
            ->select(
                'hasil_pemeriksaan.id as idHasilPemeriksaan',
                'jenis_pemeriksaan.id as idJenisPemeriksaan',
                'jenis_pemeriksaan.namaJenisPemeriksaan',
                'jenis_pemeriksaan.kelompokJenisPemeriksaan',
                'detail_hasil_pemeriksaan.id',
                'detail_hasil_pemeriksaan.laporan',
                'detail_hasil_pemeriksaan.jamMulaiAlat',
                'detail_hasil_pemeriksaan.jamSelesaiAlat',
                'detail_hasil_pemeriksaan.ruangan'
            )
            ->get();

            DetailTransaksiPemeriksaan::where('idTransaksiPemeriksaan', $getHasilPemeriksaan[0]->idTransaksiPemeriksaan)
            ->update(['status' => '6']);
        // dd($getDetailHasil);
        return view('dokter.hasilpemeriksaan.preview', compact('getHasilPemeriksaan','getDetailHasil'));
    }
    
    
}
