<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use App\Models\Modalitas;
use App\Models\Pasien;
use App\Models\Karyawan;
use App\Models\Dokter;
use App\Models\PendaftaranPemeriksaan;
use App\Models\DetailPendaftaranPemeriksaan;
use App\Models\TransaksiPemeriksaan;
use App\Models\DetailTransaksiPemeriksaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PendaftaranPemeriksaanKaryawanController extends Controller
{
    //
    public function index(){

        $subquery = TransaksiPemeriksaan::select('idDaftarPemeriksaan');
        $detailSubquery = DetailPendaftaranPemeriksaan::select('idDaftarPemeriksaan')
            ->selectRaw('COUNT(*) AS totalStatusTidak')
            ->where('statusKetersediaan', 'Tidak')
            ->groupBy('idDaftarPemeriksaan');
        $datadaftarperiksa = PendaftaranPemeriksaan::join('pasien', 'pasien.id', '=', 'pendaftaran_pemeriksaan.idPasien')
            ->join('users', 'users.id', '=', 'pasien.idUser')
            ->leftJoinSub($detailSubquery, 'dp', function ($join) {
                $join->on('pendaftaran_pemeriksaan.id', '=', 'dp.idDaftarPemeriksaan');
            })
            ->select(
                'pendaftaran_pemeriksaan.id',
                'pendaftaran_pemeriksaan.no_pendaftaran',
                'users.name',
                'pendaftaran_pemeriksaan.namaDokterPengirim',
                'pendaftaran_pemeriksaan.tanggalDaftar',
                'pendaftaran_pemeriksaan.fileLampiran',
                \DB::raw('COALESCE(dp.totalStatusTidak, 0) AS totalStatusTidak')
            )
            ->whereNotIn('pendaftaran_pemeriksaan.id', $subquery)
            ->orderBy('pendaftaran_pemeriksaan.tanggalDaftar', 'desc')
            ->get();


        //terakhir pakai ini
        // $subquery = TransaksiPemeriksaan::select('idDaftarPemeriksaan')->get();
        // $datadaftarperiksa = PendaftaranPemeriksaan::join('pasien','pasien.id','=','pendaftaran_pemeriksaan.idPasien')
        //             ->join('users', 'users.id', '=', 'pasien.idUser')    
        //             ->select('pendaftaran_pemeriksaan.id','pendaftaran_pemeriksaan.no_pendaftaran','users.name','pendaftaran_pemeriksaan.namaDokterPengirim','pendaftaran_pemeriksaan.tanggalDaftar','pendaftaran_pemeriksaan.fileLampiran')
        //             ->orderBy('pendaftaran_pemeriksaan.tanggalDaftar', 'desc')       
        //             ->whereNotIn('pendaftaran_pemeriksaan.id', $subquery)->get();
        

        
        // $datadaftarperiksa = PendaftaranPemeriksaan::join('pasien','pasien.id','=','pendaftaran_pemeriksaan.idPasien')
        //                 ->join('users', 'users.id', '=', 'pasien.idUser')
        //                 ->select('pendaftaran_pemeriksaan.id','pendaftaran_pemeriksaan.no_pendaftaran','users.name','pendaftaran_pemeriksaan.namaDokterPengirim','pendaftaran_pemeriksaan.tanggalDaftar','pendaftaran_pemeriksaan.fileLampiran')
        //                 ->orderBy('tanggalDaftar', 'desc')->get();

        return view('karyawan.pendaftaranpemeriksaan.index', compact('datadaftarperiksa'));
        
    }

    public function create(){
        $datajenispemeriksaan = JenisPemeriksaan::join('modalitas', 'modalitas.id','=','jenis_pemeriksaan.idModalitas')
                                ->select(['modalitas.namaModalitas as namaModalitas', 'modalitas.kodeRuang as kodeRuang', 'jenis_pemeriksaan.*'])
                                ->paginate(10);
        //dd($datajenispemeriksaan);
        $no = 'REG-' . date('Ymd') . '-' . Str::upper(Str::random(6));
        // dd($no);
        $slot = PendaftaranPemeriksaan::select('pendaftaran_pemeriksaan.tanggalDaftar', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan', 'jenis_pemeriksaan.namaJenisPemeriksaan', 'detail_pendaftaran_pemeriksaan.jamMulai', 'detail_pendaftaran_pemeriksaan.jamSelesai')
                ->join('detail_pendaftaran_pemeriksaan', 'detail_pendaftaran_pemeriksaan.idDaftarPemeriksaan', '=', 'pendaftaran_pemeriksaan.id')
                ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan')
                ->get();

        return view('karyawan.pendaftaranpemeriksaan.create', compact('datajenispemeriksaan','no','slot'));
    }

    public function show($id){

        $datadaftarperiksa = PendaftaranPemeriksaan::join('pasien', 'pasien.id', '=', 'pendaftaran_pemeriksaan.idPasien')
                            ->join('users', 'users.id', '=', 'pasien.idUser')
                            ->select('pendaftaran_pemeriksaan.id','pendaftaran_pemeriksaan.no_pendaftaran','users.name as namaPasien','pendaftaran_pemeriksaan.namaDokterPengirim','pendaftaran_pemeriksaan.tanggalDaftar')
                            ->where('pendaftaran_pemeriksaan.id',$id)->get();


        $dataNama = $datadaftarperiksa[0]->namaPasien;
        $tanggaldaftar = $datadaftarperiksa[0]->tanggalDaftar;
        $noregistrasi = $datadaftarperiksa[0]->no_pendaftaran;
        $namadokterrekomendasi = $datadaftarperiksa[0]->namaDokterPengirim;

        $getDetailPendaftaran =  DetailPendaftaranPemeriksaan::join('pendaftaran_pemeriksaan', 'pendaftaran_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idDaftarPemeriksaan')
        ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan')
        ->join('modalitas', 'modalitas.id', '=', 'jenis_pemeriksaan.idModalitas')
        ->select('jenis_pemeriksaan.namaJenisPemeriksaan', 'modalitas.namaModalitas', 'jenis_pemeriksaan.kelompokJenisPemeriksaan', 'detail_pendaftaran_pemeriksaan.jamMulai', 'detail_pendaftaran_pemeriksaan.jamSelesai', 'detail_pendaftaran_pemeriksaan.statusKetersediaan', 'detail_pendaftaran_pemeriksaan.keterangan', 'jenis_pemeriksaan.harga')
        ->where('pendaftaran_pemeriksaan.id', '=', $id)
        ->get();

        $html = "";
        $totaltidak=0;
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
                $totaltidak++;
                $html .= "<span class='btn btn-danger'>Dalam Reservasi</span>";
            }

            $html .= "</td>
                    <td>".$get->keterangan."</td>
                </tr>
            ";
        }
        // $response['html'] = $html;

        // return response()->json($response);

        return response()->json([
            'html' => $html,
            'dataNama' => $dataNama,
            'tanggaldaftar' => $tanggaldaftar,
            'noregistrasi' => $noregistrasi,
            'namadokterrekomendasi' => $namadokterrekomendasi,
            'totaltidak' => $totaltidak,
        ]);
    }

    public function edit($id){
        

        // $getDaftarPemeriksaan = PendaftaranPemeriksaan::select('id','no_pendaftaran','namaDokterPengirim','tanggalDaftar','fileLampiran')
        // ->where('id', '=', $id)
        // ->get();
        $statusSave='';
        if(TransaksiPemeriksaan::where('idDaftarPemeriksaan', '=', $id)->exists()){
           $statusSave='ya';
        }else{
           
            $statusSave='tidak';
        }
        $dokterData = Dokter::join('users', 'users.id', '=', 'dokter.idUser')
                    ->select('dokter.id', 'users.name', 'dokter.spesialis')
                    ->get();

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
        return view('karyawan.pendaftaranpemeriksaan.edit', compact('getDaftarPemeriksaan','getDetailPendaftaran','datajenispemeriksaan','slot','dokterData','statusSave'));
    }

    public function update(Request $request, $id)
    {

        //cek jika status tidak maka tidak bisa dilanjutkan ke proses transaksi pemeriksaan
        $namaJenisPemeriksaan1 = $request->input('namaJenisPemeriksaan', []);
        $statusCek = $request->input('status', []);
        $totalCekTidak =0;
        for ($dp1=0; $dp1 < count($namaJenisPemeriksaan1); $dp1++) {
           if($statusCek[$dp1]=="tidak"){
                $totalCekTidak++;
           }
        }
        // dd($totalCekTidak);
        if($totalCekTidak>0){
            //jika ada status yang tidak hanya update table Pendaftaran Pemeriksaan

            //update daftar pemeriksaan
            $dp = PendaftaranPemeriksaan::find($id);
            
            $dp->update([
                'tanggalDaftar' => $request->tanggalDaftar,
            ]);
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
            return redirect()->route('karyawan.pendaftaranpemeriksaan.list')->with('success','Transaki Pemeriksaan berhasil disimpan.');
            // return redirect()->route('karyawan.pendaftaranpemeriksaan.list')->with('Danger','Daftar Pemeriksaan berhasil disimpan tetapi tidak bisa dilanjutkan prosesnya.');
        }else{
            
            // ini dipakai buat kirim data ke DICOM
            // $this->sendDataAPI($request,$id);
            // batas akhir buat kirim data ke DICOM

            //Jika semua status Iya maka lanjut ke proses transaksi pemeriksaan

            //ambil id karyawan
            $idKaryawan = Karyawan::select('karyawan.id')
            ->join('users', 'users.id', '=', 'karyawan.idUser')
            ->where('karyawan.idUser', Auth::user()->id)
            ->get();

            //create no transaksi pemeriksaan
            $no = 'TRX-' . date('Ymd') . '-' . Str::upper(Str::random(6));

            
            // dd($request);

            //update daftar pemeriksaan
            $dp = PendaftaranPemeriksaan::find($id);
            
            $dp->update([
                'tanggalDaftar' => $request->tanggalDaftar,
            ]);

            //simpan data ke transaksi pemeriksaan
            $simpanTransPemeriksaan=TransaksiPemeriksaan::create([
                'no_transaksi_pemeriksaan' => $no,
                'idDaftarPemeriksaan' => $id,
                'no_pendaftaran_pemeriksaan' => $request->no_pendaftaran,
                'idKaryawan' => $idKaryawan[0]->id,
                'tanggalPemeriksaan' => $request->tanggalDaftar,
                'idDokter' => $request->dokterRadiografi,
            ]);

            //get id transaksi pemeriksaan yang baru
            $idtransaksiperiksa = TransaksiPemeriksaan::where('no_transaksi_pemeriksaan',$no)->get();

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

                $detailTransaksi=DetailTransaksiPemeriksaan::create([
                    'uuid' => Str::uuid(),
                    'idTransaksiPemeriksaan' => $idtransaksiperiksa[0]->id,
                    'idJenisPemeriksaan' => Str::before($namaJenisPemeriksaan[$dp], '-'),//mengambil nilai paling depan dari 2-RRZZZ
                    'jamMulaiAlat' => $jamMulai[$dp],
                    'jamSelesaiAlat' => $jamSelesai[$dp],
                    'ruangan' => '',
                    'keteranganRadiografer' => '',
                    'harga' => $harga[$dp],
                    'diskon' => 0,
                    'hargaTotal' => $harga[$dp],
                    'status' => '1',
                ]);
            }

            return redirect()->route('karyawan.pendaftaranpemeriksaan.list')->with('success','Transaki Pemeriksaan berhasil dibuat.');
        }        
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
