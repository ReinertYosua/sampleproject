<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use App\Models\Modalitas;
use App\Models\Pasien;
use App\Models\Karyawan;
use App\Models\Dokter;
use App\Models\PendaftaranPemeriksaan;
use App\Models\HasilPemeriksaan;
use App\Models\DetailPendaftaranPemeriksaan;
use App\Models\TransaksiPemeriksaan;
use App\Models\DetailTransaksiPemeriksaan;
use App\Models\DetailHasilPemeriksaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class TransaksiPemeriksaanController extends Controller
{
    //
    public function index(){
        
       
        // $idDokter = Dokter::select('dokter.id')
        //     ->join('users', 'users.id', '=', 'dokter.idUser')
        //     ->where('dokter.idUser', Auth::user()->id)
        //     ->get();
        $idPasien= Pasien::select('pasien.id')
        ->join('users', 'users.id', '=', 'pasien.idUser')
        ->where('pasien.idUser', Auth::user()->id)
        ->get();
        $idDokter = Dokter::select('dokter.id')
            ->join('users', 'users.id', '=', 'dokter.idUser')
            ->where('dokter.idUser', Auth::user()->id)
            ->get();


        
            //Ini query old
            // $datatransaksiperiksa = TransaksiPemeriksaan::join('pendaftaran_pemeriksaan as a', 'a.id', '=', 'transaksi_pemeriksaan.idDaftarPemeriksaan')
            // ->join('pasien as b', 'b.id', '=', 'a.idPasien')
            // ->join('dokter as c', 'c.id', '=', 'transaksi_pemeriksaan.idDokter')
            // ->join('users as d', 'd.id', '=', 'c.idUser')
            // ->join('users as e', 'e.id', '=', 'b.idUser')
            // ->select(
            //     'a.no_pendaftaran',
            //     'transaksi_pemeriksaan.id',
            //     'transaksi_pemeriksaan.no_transaksi_pemeriksaan',
            //     'e.name as nama_pasien', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
            //     'd.name as nama_dokter', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
            //     'transaksi_pemeriksaan.tanggalPemeriksaan',
            // )
            // ->orderBy('transaksi_pemeriksaan.tanggalPemeriksaan', 'desc')
            // ->get();

       
            if(Auth::user()->role =='karyawan'){
                $datatransaksiperiksa = TransaksiPemeriksaan::join('pendaftaran_pemeriksaan as a', 'a.id', '=', 'transaksi_pemeriksaan.idDaftarPemeriksaan')
                ->join('pasien as b', 'b.id', '=', 'a.idPasien')
                ->join('dokter as c', 'c.id', '=', 'transaksi_pemeriksaan.idDokter')
                ->join('users as d', 'd.id', '=', 'c.idUser')
                ->join('users as e', 'e.id', '=', 'b.idUser')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus1
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "1"
                    GROUP BY idTransaksiPemeriksaan
                ) as status1'), 'status1.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus2
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "2"
                    GROUP BY idTransaksiPemeriksaan
                ) as status2'), 'status2.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus3
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "3"
                    GROUP BY idTransaksiPemeriksaan
                ) as status3'), 'status3.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus4
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "4"
                    GROUP BY idTransaksiPemeriksaan
                ) as status4'), 'status4.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus5
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "5"
                    GROUP BY idTransaksiPemeriksaan
                ) as status5'), 'status5.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus6
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "6"
                    GROUP BY idTransaksiPemeriksaan
                ) as status6'), 'status6.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->select(
                    'a.no_pendaftaran',
                    'transaksi_pemeriksaan.id',
                    'transaksi_pemeriksaan.no_transaksi_pemeriksaan',
                    'e.name as nama_pasien', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
                    'd.name as nama_dokter', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
                    'transaksi_pemeriksaan.tanggalPemeriksaan',
                    DB::raw('COALESCE(status1.totalStatus1, NULL) AS totalStatus1'),
                    DB::raw('COALESCE(status2.totalStatus2, NULL) AS totalStatus2'),
                    DB::raw('COALESCE(status3.totalStatus3, NULL) AS totalStatus3'),
                    DB::raw('COALESCE(status4.totalStatus4, NULL) AS totalStatus4'),
                    DB::raw('COALESCE(status5.totalStatus5, NULL) AS totalStatus5'),
                    DB::raw('COALESCE(status6.totalStatus6, NULL) AS totalStatus6')
                )
                ->orderBy('transaksi_pemeriksaan.tanggalPemeriksaan', 'asc')
                ->get();
                // dd($datatransaksiperiksa);
            }else if(Auth::user()->role =='dokter'){
                $datatransaksiperiksa = TransaksiPemeriksaan::join('pendaftaran_pemeriksaan as a', 'a.id', '=', 'transaksi_pemeriksaan.idDaftarPemeriksaan')
                ->join('pasien as b', 'b.id', '=', 'a.idPasien')
                ->join('dokter as c', 'c.id', '=', 'transaksi_pemeriksaan.idDokter')
                ->join('users as d', 'd.id', '=', 'c.idUser')
                ->join('users as e', 'e.id', '=', 'b.idUser')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus1
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "1"
                    GROUP BY idTransaksiPemeriksaan
                ) as status1'), 'status1.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus2
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "2"
                    GROUP BY idTransaksiPemeriksaan
                ) as status2'), 'status2.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus3
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "3"
                    GROUP BY idTransaksiPemeriksaan
                ) as status3'), 'status3.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus4
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "4"
                    GROUP BY idTransaksiPemeriksaan
                ) as status4'), 'status4.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus5
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "5"
                    GROUP BY idTransaksiPemeriksaan
                ) as status5'), 'status5.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus6
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "6"
                    GROUP BY idTransaksiPemeriksaan
                ) as status6'), 'status6.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->select(
                    'a.no_pendaftaran',
                    'transaksi_pemeriksaan.id',
                    'transaksi_pemeriksaan.no_transaksi_pemeriksaan',
                    'e.name as nama_pasien', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
                    'd.name as nama_dokter', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
                    'transaksi_pemeriksaan.tanggalPemeriksaan',
                    DB::raw('COALESCE(status1.totalStatus1, NULL) AS totalStatus1'),
                    DB::raw('COALESCE(status2.totalStatus2, NULL) AS totalStatus2'),
                    DB::raw('COALESCE(status3.totalStatus3, NULL) AS totalStatus3'),
                    DB::raw('COALESCE(status4.totalStatus4, NULL) AS totalStatus4'),
                    DB::raw('COALESCE(status5.totalStatus5, NULL) AS totalStatus5'),
                    DB::raw('COALESCE(status6.totalStatus6, NULL) AS totalStatus6')
                )
                ->where('transaksi_pemeriksaan.idDokter','=', $idDokter[0]->id)
                ->orderBy('transaksi_pemeriksaan.tanggalPemeriksaan', 'asc')
                ->get();
                
            }else if(Auth::user()->role =='pasien'){
                $datatransaksiperiksa = TransaksiPemeriksaan::join('pendaftaran_pemeriksaan as a', 'a.id', '=', 'transaksi_pemeriksaan.idDaftarPemeriksaan')
                ->join('pasien as b', 'b.id', '=', 'a.idPasien')
                ->join('dokter as c', 'c.id', '=', 'transaksi_pemeriksaan.idDokter')
                ->join('users as d', 'd.id', '=', 'c.idUser')
                ->join('users as e', 'e.id', '=', 'b.idUser')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus1
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "1"
                    GROUP BY idTransaksiPemeriksaan
                ) as status1'), 'status1.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus2
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "2"
                    GROUP BY idTransaksiPemeriksaan
                ) as status2'), 'status2.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus3
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "3"
                    GROUP BY idTransaksiPemeriksaan
                ) as status3'), 'status3.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus4
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "4"
                    GROUP BY idTransaksiPemeriksaan
                ) as status4'), 'status4.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus5
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "5"
                    GROUP BY idTransaksiPemeriksaan
                ) as status5'), 'status5.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->leftJoin(DB::raw('(
                    SELECT idTransaksiPemeriksaan, COUNT(status) AS totalStatus6
                    FROM detail_transaksi_pemeriksaan
                    WHERE status = "6"
                    GROUP BY idTransaksiPemeriksaan
                ) as status6'), 'status6.idTransaksiPemeriksaan', '=', 'transaksi_pemeriksaan.id')
                ->select(
                    'a.no_pendaftaran',
                    'transaksi_pemeriksaan.id',
                    'transaksi_pemeriksaan.no_transaksi_pemeriksaan',
                    'e.name as nama_pasien', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
                    'd.name as nama_dokter', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
                    'transaksi_pemeriksaan.tanggalPemeriksaan',
                    DB::raw('COALESCE(status1.totalStatus1, NULL) AS totalStatus1'),
                    DB::raw('COALESCE(status2.totalStatus2, NULL) AS totalStatus2'),
                    DB::raw('COALESCE(status3.totalStatus3, NULL) AS totalStatus3'),
                    DB::raw('COALESCE(status4.totalStatus4, NULL) AS totalStatus4'),
                    DB::raw('COALESCE(status5.totalStatus5, NULL) AS totalStatus5'),
                    DB::raw('COALESCE(status6.totalStatus6, NULL) AS totalStatus6')
                )
                ->where('a.idPasien','=', $idPasien[0]->id)
                ->orderBy('transaksi_pemeriksaan.tanggalPemeriksaan', 'asc')
                ->get();
                
            }

     
           

            // $datatransaksiperiksa = TransaksiPemeriksaan::join('pendaftaran_pemeriksaan as a', 'a.id', '=', 'transaksi_pemeriksaan.idDaftarPemeriksaan')
            // ->join('pasien as b', 'b.id', '=', 'a.idPasien')
            // ->join('dokter as c', 'c.id', '=', 'transaksi_pemeriksaan.idDokter')
            // ->join('users as d', 'd.id', '=', 'c.idUser')
            // ->join('users as e', 'e.id', '=', 'b.idUser')
            // ->select(
            //     'a.no_pendaftaran',
            //     'transaksi_pemeriksaan.id',
            //     'transaksi_pemeriksaan.no_transaksi_pemeriksaan',
            //     'e.name as nama_pasien', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
            //     'd.name as nama_dokter', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
            //     'transaksi_pemeriksaan.tanggalPemeriksaan',
            // )
            // ->where('transaksi_pemeriksaan.idDokter','=', $idDokter[0]->id)
            // ->orderBy('transaksi_pemeriksaan.tanggalPemeriksaan', 'desc')
            // ->get();

        

            // $datatransaksiperiksa = TransaksiPemeriksaan::join('pendaftaran_pemeriksaan as a', 'a.id', '=', 'transaksi_pemeriksaan.idDaftarPemeriksaan')
            // ->join('pasien as b', 'b.id', '=', 'a.idPasien')
            // ->join('dokter as c', 'c.id', '=', 'transaksi_pemeriksaan.idDokter')
            // ->join('users as d', 'd.id', '=', 'c.idUser')
            // ->join('users as e', 'e.id', '=', 'b.idUser')
            // ->select(
            //     'a.no_pendaftaran',
            //     'transaksi_pemeriksaan.id',
            //     'transaksi_pemeriksaan.no_transaksi_pemeriksaan',
            //     'e.name as nama_pasien', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
            //     'd.name as nama_dokter', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
            //     'transaksi_pemeriksaan.tanggalPemeriksaan',
            // )
            // ->where('a.idPasien','=', $idPasien[0]->id)
            // ->orderBy('transaksi_pemeriksaan.tanggalPemeriksaan', 'desc')
            // ->get();
        
            

            return view('karyawan.transaksipemeriksaan.index', compact('datatransaksiperiksa'));
    }

    public function show($id){
        // dd($id);
        $getTransaksi = TransaksiPemeriksaan::join('pendaftaran_pemeriksaan as a','a.id','=','transaksi_pemeriksaan.idDaftarPemeriksaan')
                    ->join('pasien as b','b.id','=','a.idPasien')
                    ->join('dokter as c','c.id','=','transaksi_pemeriksaan.idDokter')
                    ->join('users as d','d.id','=','b.idUser')
                    ->join('users as e','e.id','=','c.idUser')
                    ->select('d.name as namaPasien','e.name as namaDokter','transaksi_pemeriksaan.no_transaksi_pemeriksaan','transaksi_pemeriksaan.tanggalPemeriksaan')
                    ->where('transaksi_pemeriksaan.id', '=', $id)
                    ->get();

        $namapasien = $getTransaksi[0]->namaPasien;
        $tglperiksa = $getTransaksi[0]->tanggalPemeriksaan;
        $notransaksi = $getTransaksi[0]->no_transaksi_pemeriksaan;
        $namadokterradiology = "Dr. ".$getTransaksi[0]->namaDokter;

        $getDetailTransaksi =  DetailTransaksiPemeriksaan::join('transaksi_pemeriksaan', 'transaksi_pemeriksaan.id', '=', 'detail_transaksi_pemeriksaan.idTransaksiPemeriksaan')
        ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_transaksi_pemeriksaan.idJenisPemeriksaan')
        ->join('modalitas', 'modalitas.id', '=', 'jenis_pemeriksaan.idModalitas')
        ->select('jenis_pemeriksaan.namaJenisPemeriksaan', 'modalitas.namaModalitas', 'detail_transaksi_pemeriksaan.jamMulaiAlat', 'detail_transaksi_pemeriksaan.jamSelesaiAlat', 'detail_transaksi_pemeriksaan.ruangan', 'detail_transaksi_pemeriksaan.status', 'detail_transaksi_pemeriksaan.hargaTotal')
        ->where('transaksi_pemeriksaan.id', '=', $id)
        ->get();

        $html = "";
        
        foreach($getDetailTransaksi as $get){
        $html .= "
        
        <tr>
            <td>".$get->namaJenisPemeriksaan."</td>
            <td>".$get->namaModalitas."</td>
            <td>".$get->jamMulaiAlat."</td>
            <td>".$get->jamSelesaiAlat."</td>
            <td>".$get->ruangan."</td>";

            $html .= "<td>";
            $totaltidak=0;
            if ($get->status == '1') {
                $html .= "<span class='btn btn-sm btn-warning'>Dalam Antrian</span>";
                $totaltidak++;
            } else if($get->status == '2'){
                $html .= "<span class='btn btn-sm btn-primary'>Ruang Tunggu</span>";
            }else if($get->status == '3'){
                $html .= "<span class='btn btn-sm btn-danger'>Pemeriksaan</span>";
            }
            else if($get->status == '4'){
                $html .= "<span class='btn btn-sm btn-secondary'>Menunggu Hasil</span>";
            }
            else if($get->status == '5'){
                $html .= "<span class='btn btn-sm btn-success'>Hasil sudah siap</span>";
            }

            $html .= "</td>
                <td>".$get->hargaTotal ."</td>
                </tr>
            ";
        }
        // $response['html'] = $html;

        // return response()->json($response);

        return response()->json([
            'html' => $html,
            'namapasien' => $namapasien,
            'tglperiksa' => $tglperiksa,
            'notransaksi' => $notransaksi,
            'namadokterradiology' => $namadokterradiology,
            'totaltidak' => $totaltidak,
        ]);
    }

    public function edit($id){

        //select transaksi pemeriksaan
        $datatransaksiperiksa = TransaksiPemeriksaan::join('pendaftaran_pemeriksaan as a', 'a.id', '=', 'transaksi_pemeriksaan.idDaftarPemeriksaan')
        ->join('pasien as b', 'b.id', '=', 'a.idPasien')
        ->join('dokter as c', 'c.id', '=', 'transaksi_pemeriksaan.idDokter')
        ->join('users as d', 'd.id', '=', 'c.idUser')
        ->join('users as e', 'e.id', '=', 'b.idUser')
        ->select(
            'transaksi_pemeriksaan.id',
            'transaksi_pemeriksaan.no_transaksi_pemeriksaan',
            'transaksi_pemeriksaan.idDaftarPemeriksaan',
            'transaksi_pemeriksaan.idKaryawan',
            'transaksi_pemeriksaan.idDokter',
            'e.name as nama_pasien', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
            'd.name as nama_dokter', // Menggunakan alias untuk membedakan nama pasien dan nama dokter
            'transaksi_pemeriksaan.tanggalPemeriksaan',
            'transaksi_pemeriksaan.diagnosis',
            'transaksi_pemeriksaan.keteranganDokter',
            'a.namaDokterPengirim',
            'a.fileLampiran'
        )
        ->where('transaksi_pemeriksaan.id','=',$id)
        ->get();

        
        //select detail transaksi pemeriksaan

            $datadetailtransaksipemeriksaan = DetailTransaksiPemeriksaan::join('jenis_pemeriksaan as a','a.id','=','detail_transaksi_pemeriksaan.idJenisPemeriksaan')
                                            ->join('modalitas as b','b.id','=','a.idModalitas')
                                            ->select('detail_transaksi_pemeriksaan.id','detail_transaksi_pemeriksaan.idJenisPemeriksaan','a.namaJenisPemeriksaan','detail_transaksi_pemeriksaan.jamMulaiAlat','detail_transaksi_pemeriksaan.jamSelesaiAlat','detail_transaksi_pemeriksaan.ruangan','detail_transaksi_pemeriksaan.keteranganRadiografer','detail_transaksi_pemeriksaan.harga','detail_transaksi_pemeriksaan.diskon','detail_transaksi_pemeriksaan.hargaTotal','detail_transaksi_pemeriksaan.status','b.kodeRuang')
                                            ->where('detail_transaksi_pemeriksaan.idTransaksiPemeriksaan','=',$id)
                                            ->get();

        return view('karyawan.transaksipemeriksaan.edit', compact('datatransaksiperiksa','datadetailtransaksipemeriksaan'));
    }
    public function update(Request $request, $id){
        
        if(Auth::user()->role =='karyawan'){

            
            //cek jika status ==5 hasil laporan maka  bisa dilanjutkan ke proses hasil pemeriksaan
            $namaJenisPemeriksaan1 = $request->input('namaJenisPemeriksaan', []);
            $statusCek = $request->input('status', []);
            $totalDalamAntrian =0;
            $totalRuangTunggu =0;
            $totalSedangPemeriksaan =0;
            $totalMenungguHasil =0;
            $totalHasilSudahSiap =0;
            for ($dp1=0; $dp1 < count($namaJenisPemeriksaan1); $dp1++) {
                if($statusCek[$dp1]=="1"){
                    $totalDalamAntrian++;
                }else if($statusCek[$dp1]=="2"){
                    $totalRuangTunggu++;
                }else if($statusCek[$dp1]=="3"){
                    $totalSedangPemeriksaan++;
                }else if($statusCek[$dp1]=="4"){
                    $totalMenungguHasil++;
                }else if($statusCek[$dp1]=="5"){
                    $totalHasilSudahSiap++;
                }
            }
            
            if($totalMenungguHasil==count($namaJenisPemeriksaan1)){
                //jika semua status menunjukkan menunggu hasil

                // delete detail pendaftaran yang lama
                DetailTransaksiPemeriksaan::where('idTransaksiPemeriksaan', $id)->delete();

                $namaJenisPemeriksaan = $request->input('namaJenisPemeriksaan', []);
                $jamMulaiAlat = $request->input('jamMulaiAlat', []);
                $jamSelesaiAlat = $request->input('jamSelesaiAlat', []);
                $ruangan = $request->input('ruangan', []);
                $harga = $request->input('harga', []);
                $diskon = $request->input('diskon', []);
                $hargaTotal = $request->input('hargaTotal', []);
                $status = $request->input('status', []);
                $keterangan = $request->input('keterangan', []);
                for ($dp=0; $dp < count($namaJenisPemeriksaan); $dp++) {

                    $detailTransaksi=DetailTransaksiPemeriksaan::create([
                        'idTransaksiPemeriksaan' => $id,
                        'idJenisPemeriksaan' => Str::before($namaJenisPemeriksaan[$dp], '-'),//mengambil nilai paling depan dari 2-RRZZZ
                        'jamMulaiAlat' => $jamMulaiAlat[$dp],
                        'jamSelesaiAlat' => $jamSelesaiAlat[$dp],
                        'ruangan' => $ruangan[$dp],
                        'keteranganRadiografer' => $keterangan[$dp],
                        'harga' => $harga[$dp],
                        'diskon' => $diskon[$dp],
                        'hargaTotal' => $hargaTotal[$dp],
                        'status' => $status[$dp],
                    ]);
                }

                //pindah kan data ke Table Hasil Pemeriksaan
                $getTransPeriksa = TransaksiPemeriksaan::where('id','=',$id)->get();
               
                $hasilPemeriksaan=HasilPemeriksaan::create([
                    'idTransaksiPemeriksaan' => $id,
                    'no_transaksi_pemeriksaan' => $request->no_transaksi_pemeriksaan,
                    'idKaryawan' => $getTransPeriksa[0]->idKaryawan,
                    'idDokter' => $getTransPeriksa[0]->idDokter,
                ]);
                //get id transaksi pemeriksaan yang baru
                $idHasilPeriksa = HasilPemeriksaan::where('no_transaksi_pemeriksaan',$request->no_transaksi_pemeriksaan)->get();
                for ($dp=0; $dp < count($namaJenisPemeriksaan); $dp++) {

                    $detailHasilPeriksa=DetailHasilPemeriksaan::create([
                        'idHasilPemeriksaan' => $idHasilPeriksa[0]->id,
                        'idJenisPemeriksaan' => Str::before($namaJenisPemeriksaan[$dp], '-'),//mengambil nilai paling depan dari 2-RRZZZ
                        'laporan' => '',
                        'jamMulaiAlat' => $jamMulaiAlat[$dp],
                        'jamSelesaiAlat' => $jamSelesaiAlat[$dp],
                        'ruangan' => $ruangan[$dp]
                        
                    ]);
                }
                // akhir dari pemindahan data ke table hasil pemeriksaan
                return redirect()->route('karyawan.transaksipemeriksaan.index')->with('success','Transaksi Pemeriksaan berhasil diubah.');
                
            }else{
                // delete detail pendaftaran yang lama
                if($totalRuangTunggu==count($namaJenisPemeriksaan1)){
                    
                    //$this->sendDataAPI($request,$id);
                }
                
                DetailTransaksiPemeriksaan::where('idTransaksiPemeriksaan', $id)->delete();

                $namaJenisPemeriksaan = $request->input('namaJenisPemeriksaan', []);
                $jamMulaiAlat = $request->input('jamMulaiAlat', []);
                $jamSelesaiAlat = $request->input('jamSelesaiAlat', []);
                $ruangan = $request->input('ruangan', []);
                $harga = $request->input('harga', []);
                $diskon = $request->input('diskon', []);
                $hargaTotal = $request->input('hargaTotal', []);
                $status = $request->input('status', []);
                $keterangan = $request->input('keterangan', []);
                for ($dp=0; $dp < count($namaJenisPemeriksaan); $dp++) {

                    $detailTransaksi=DetailTransaksiPemeriksaan::create([
                        'idTransaksiPemeriksaan' => $id,
                        'idJenisPemeriksaan' => Str::before($namaJenisPemeriksaan[$dp], '-'),//mengambil nilai paling depan dari 2-RRZZZ
                        'jamMulaiAlat' => $jamMulaiAlat[$dp],
                        'jamSelesaiAlat' => $jamSelesaiAlat[$dp],
                        'ruangan' => $ruangan[$dp],
                        'keteranganRadiografer' => $keterangan[$dp],
                        'harga' => $harga[$dp],
                        'diskon' => $diskon[$dp],
                        'hargaTotal' => $hargaTotal[$dp],
                        'status' => $status[$dp],
                    ]);
                }
                return redirect()->route('karyawan.transaksipemeriksaan.index')->with('success','Transaksi Pemeriksaan berhasil diubah.');
            }
           
        }else if(Auth::user()->role =='dokter'){
                

            //update transaksi pemeriksaan
            $tp = TransaksiPemeriksaan::find($id);
            
            $tp->update([
                'diagnosis' => $request->diagnosis,
                'keteranganDokter' => $request->keteranganDokter
            ]);

            return redirect()->route('dokter.transaksipemeriksaan.index')->with('success','Transaksi Pemeriksaan berhasil diubah.');
        }
         

         
    }


    public function sendDataAPI($request,$id){
       
        $getDataUser = TransaksiPemeriksaan::where('transaksi_pemeriksaan.id', 3)
                    ->join('pendaftaran_pemeriksaan as b', 'b.id', '=', 'transaksi_pemeriksaan.idDaftarPemeriksaan')
                    ->join('pasien as c', 'c.id', '=', 'b.idPasien')
                    ->join('users as d', 'd.id', '=', 'c.idUser')
                    ->join('dokter as e', 'e.id', '=', 'transaksi_pemeriksaan.idDokter')
                    ->join('users as f', 'f.id', '=', 'e.idUser')
                    ->select(
                        'b.namaDokterPengirim',
                        'c.id as idPasien',
                        'd.name as namaPasien',
                        'd.id as idUser',
                        'c.tanggalLahir',
                        'c.jenisKelamin',
                        'transaksi_pemeriksaan.idDokter as idDokterRadiografi',
                        'f.name as namaDokterRadiografi'
                    )
                    ->get();

        

        $formatPatienName = str_replace(' ', '*', $getDataUser[0]->namaPasien);
        $formatBirthDate = Carbon::createFromFormat('Y-m-d', $getDataUser[0]->tanggalLahir)->format('Ymd');
        if($getDataUser[0]->jenisKelamin=='pria'){
            $formatSex = "M";
        }else{
            $formatSex = "F";
        }
        $formatNamaDokterRekomendasi = str_replace(' ', '*', $getDataUser[0]->namaDokterPengirim); 

        $namaJenisPemeriksaan = $request->input('namaJenisPemeriksaan', []);
        $jamMulai = $request->input('jamMulai', []);
        $jamSelesai = $request->input('jamSelesai', []);
        $namaModalitas = $request->input('namaModalitas', []);
        $harga = $request->input('harga', []);
        $status = $request->input('status', []);
        $keterangan = $request->input('keterangan', []);
        $data =[];
        for ($dp=0; $dp < count($namaJenisPemeriksaan); $dp++) {
            
            $getAET = JenisPemeriksaan::join('modalitas','modalitas.id','=','jenis_pemeriksaan.idModalitas')
                        ->join('dicom','dicom.alamatIP','=','modalitas.alamatIP')
                        ->select('dicom.AET','modalitas.namaModalitas')
                        ->where('jenis_pemeriksaan.id','=',Str::before($namaJenisPemeriksaan[$dp], '-'))
                        ->get();

            
            $data[] = [
                'PatientID' => $getDataUser[0]->idPasien,
                'PatientName' => str_replace(' ', '^', $getDataUser[0]->namaPasien),
                'PatientBirthDate' => $formatBirthDate,
                'PatientSex' => $formatSex,
                'StudyID' => Str::before($namaJenisPemeriksaan[$dp], '-'),
                'AccessionNumber' => '^',
                'ReferringPhysician' => $formatNamaDokterRekomendasi,
                'StudyDescription' => str_replace(' ', '^', $keterangan[$dp]),
                'ScheduledProcedureStepStartDate' => $formatBirthDate,
                'Modality' => str_replace(' ', '^', $getAET[0]->namaModalitas),
                'RequestedProcedureID' => '^',
                'RequestedProcedureDescription' => '^',
                'ScheduledStationAETitle' => str_replace(' ', '^', $getAET[0]->AET),
                'ScheduledPerformingPhysician' => str_replace(' ', '^', $getDataUser[0]->namaDokterRadiografi),
                'ScheduledProcedureStepLocation' => '^',
                'PreMedication' => '^',
                'SpecialNeeds' => '^',
            ];
            
        }
        
         // URL endpoint DICOM server (dummy untuk testing)
         $urlDicomServer = 'http://10.20.187.102:8080'; // Ganti dengan URL endpoint DICOM yang sebenarnya

         // Kirim data ke server DICOM
         $response = Http::timeout(60)->post($urlDicomServer, $data);
 
         if ($response->successful()) {
             // Mengembalikan respons sukses ke frontend atau sistem pemanggil
             return response()->json([
                 'status' => 'success',
                 'message' => 'Patient registered successfully',
                 'data' => $response->json()
             ]);
         } else {
             // Mengembalikan respons error
             return response()->json([
                 'status' => 'error',
                 'message' => 'Failed to register patient',
                 'data' => $response->json()
             ], $response->status());
         }
        
    }
}
