<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use App\Models\Modalitas;
use App\Models\Pasien;
use App\Models\PendaftaranPemeriksaan;
use App\Models\DetailPendaftaranPemeriksaan;
use App\Models\TransaksiPemeriksaan;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PendaftaranPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $idPasien = Pasien::select('pasien.id')
        //         ->join('users', 'users.id', '=', 'pasien.idUser')
        //         ->where('pasien.idUser', Auth::user()->id)
        //         ->get();

        // $datadaftarperiksa = PendaftaranPemeriksaan::where('idPasien',$idPasien[0]->id)
        //                     ->orderBy('tanggalDaftar', 'desc')->get();

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
            ->where('users.id', Auth::user()->id)
            ->orderBy('pendaftaran_pemeriksaan.tanggalDaftar', 'desc')
            ->get();
        return view('pasien.pendaftaranpemeriksaan.index', compact('datadaftarperiksa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datajenispemeriksaan = JenisPemeriksaan::join('modalitas', 'modalitas.id','=','jenis_pemeriksaan.idModalitas')
                                ->select(['modalitas.namaModalitas as namaModalitas', 'modalitas.kodeRuang as kodeRuang', 'jenis_pemeriksaan.*'])
                                ->get();
        //dd($datajenispemeriksaan);
        $no = 'REG-' . date('Ymd') . '-' . Str::upper(Str::random(6));
        // dd($no);
        $slot = PendaftaranPemeriksaan::select('pendaftaran_pemeriksaan.tanggalDaftar', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan', 'jenis_pemeriksaan.namaJenisPemeriksaan', 'detail_pendaftaran_pemeriksaan.jamMulai', 'detail_pendaftaran_pemeriksaan.jamSelesai')
                ->join('detail_pendaftaran_pemeriksaan', 'detail_pendaftaran_pemeriksaan.idDaftarPemeriksaan', '=', 'pendaftaran_pemeriksaan.id')
                ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan')
                ->get();

        return view('pasien.pendaftaranpemeriksaan.create', compact('datajenispemeriksaan','no','slot'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $idPasien = Pasien::select('pasien.id')
                ->join('users', 'users.id', '=', 'pasien.idUser')
                ->where('pasien.idUser', Auth::user()->id)
                ->get();

        //upload file
        $fileLampiran = $request->file('fileLampiran');
        $namaFileLampiran = time().".".$fileLampiran->getClientOriginalExtension();
        $pathFileLampiran = Storage::disk('public')->putFileAs('filelampiranpasien', $fileLampiran,$namaFileLampiran);

        $daftarPeriksa=PendaftaranPemeriksaan::create([
            'no_pendaftaran' => $request->no_pendaftaran,
            'idPasien' => $idPasien[0]->id,
            'namaDokterPengirim' => $request->namaDokterPengirim,
            'fileLampiran' => $namaFileLampiran,
            'tanggalDaftar' => $request->tanggalDaftar,
        ]);

        $iddaftarperiksa = PendaftaranPemeriksaan::where('no_pendaftaran',$request->no_pendaftaran)->get();

        $idJenisPemeriksaan = $request->input('idJenisPemeriksaan', []);
        $namaJenisPemeriksaan = $request->input('namaJenisPemeriksaan', []);
        $jamMulai = $request->input('jamMulai', []);
        $jamSelesai = $request->input('jamSelesai', []);
        $harga = $request->input('harga', []);
        for ($dp=0; $dp < count($namaJenisPemeriksaan); $dp++) {

            $detailDaftar=DetailPendaftaranPemeriksaan::create([
                'idDaftarPemeriksaan' => $iddaftarperiksa[0]->id,
                'idJenisPemeriksaan' => Str::before($namaJenisPemeriksaan[$dp], '-'),//mengambil nilai paling depan dari 2-RRZZZ
                'jamMulai' => $jamMulai[$dp],
                'jamSelesai' => $jamSelesai[$dp],
                'statusKetersediaan' => 'tidak',
                'keterangan' => 'Menunggu Approval',
            ]);
        }


        return redirect()->route('pendaftaranpemeriksaan.list')->with('success','Input Pendaftaran Pemeriksaan berhasil.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
       
        //

        $dataPasien = Pasien::select('pasien.id','users.name as namaPasien')
                ->join('users', 'users.id', '=', 'pasien.idUser')
                ->where('pasien.idUser', Auth::user()->id)
                ->get();

        $datadaftarperiksa = PendaftaranPemeriksaan::where('id',$id)->get();
        $dataNama = $dataPasien[0]->namaPasien;
        $tanggaldaftar = $datadaftarperiksa[0]->tanggalDaftar;
        $noregistrasi = $datadaftarperiksa[0]->no_pendaftaran;
        $namadokterrekomendasi = $datadaftarperiksa[0]->namaDokterPengirim;
        
        $getDetailPendaftaran =  DetailPendaftaranPemeriksaan::join('pendaftaran_pemeriksaan', 'pendaftaran_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idDaftarPemeriksaan')
                        ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan')
                        ->join('modalitas', 'modalitas.id', '=', 'jenis_pemeriksaan.idModalitas')
                        ->select('jenis_pemeriksaan.namaJenisPemeriksaan', 'modalitas.namaModalitas', 'jenis_pemeriksaan.kelompokJenisPemeriksaan', 'detail_pendaftaran_pemeriksaan.jamMulai', 'detail_pendaftaran_pemeriksaan.jamSelesai', 'detail_pendaftaran_pemeriksaan.statusKetersediaan', 'detail_pendaftaran_pemeriksaan.keterangan', 'jenis_pemeriksaan.harga')
                        ->where('pendaftaran_pemeriksaan.id', '=', $id)
                        ->orderby('detail_pendaftaran_pemeriksaan.jamMulai','asc')
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //

        $getDaftarPemeriksaan = PendaftaranPemeriksaan::select('id','no_pendaftaran','namaDokterPengirim','tanggalDaftar')
                            ->where('id', '=', $id)
                            ->get();

        $getDetailPendaftaran =  DetailPendaftaranPemeriksaan::join('pendaftaran_pemeriksaan', 'pendaftaran_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idDaftarPemeriksaan')
                        ->join('jenis_pemeriksaan', 'jenis_pemeriksaan.id', '=', 'detail_pendaftaran_pemeriksaan.idJenisPemeriksaan')
                        ->join('modalitas', 'modalitas.id', '=', 'jenis_pemeriksaan.idModalitas')
                        ->select('jenis_pemeriksaan.id as idJenisPemeriksaan', 'jenis_pemeriksaan.namaJenisPemeriksaan', 'modalitas.namaModalitas', 'jenis_pemeriksaan.kelompokJenisPemeriksaan', 'detail_pendaftaran_pemeriksaan.id', 'detail_pendaftaran_pemeriksaan.jamMulai', 'detail_pendaftaran_pemeriksaan.jamSelesai', 'detail_pendaftaran_pemeriksaan.statusKetersediaan', 'detail_pendaftaran_pemeriksaan.keterangan', 'jenis_pemeriksaan.harga')
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
        return view('pasien.pendaftaranpemeriksaan.edit', compact('getDaftarPemeriksaan','getDetailPendaftaran','datajenispemeriksaan','slot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
      
        // $value1 = $request->input[0]('data-value1');
        // dd($dataValue1);

        //cari id pasien
        $idPasien = Pasien::select('pasien.id')
                ->join('users', 'users.id', '=', 'pasien.idUser')
                ->where('pasien.idUser', Auth::user()->id)
                ->get();


        //upload file
        $fileLampiran = $request->file('fileLampiran');
        $namaFileLampiran = time().".".$fileLampiran->getClientOriginalExtension();
        $pathFileLampiran = Storage::disk('public')->putFileAs('filelampiranpasien', $fileLampiran,$namaFileLampiran);

        //cari nama file lama
        $file = PendaftaranPemeriksaan::findOrFail($id);
       
        // Menghapus file lama dari storage/public
        if ($file->fileLampiran!="") {
            Storage::delete('public/filelampiranpasien/'.$file->fileLampiran);
        }


        //update daftar pemeriksaan
        $dp = PendaftaranPemeriksaan::find($id);
            //  if($request->active==""){
            //     $request->merge(['active' => "N"]);
            //  }
        $dp->update([
            'namaDokterPengirim' => $request->namaDokterPengirim,
            'fileLampiran' => $namaFileLampiran,
            'tanggalDaftar' => $request->tanggalDaftar,
        ]);


        // $iddaftarperiksa = PendaftaranPemeriksaan::where('no_pendaftaran',$request->no_pendaftaran)->get();

        // delete detail pendaftaran yang lama
        DetailPendaftaranPemeriksaan::where('idDaftarPemeriksaan', $id)->delete();

        $namaJenisPemeriksaan = $request->input('namaJenisPemeriksaan', []);
        $jamMulai = $request->input('jamMulai', []);
        $jamSelesai = $request->input('jamSelesai', []);
        $harga = $request->input('harga', []);
        for ($dp=0; $dp < count($namaJenisPemeriksaan); $dp++) {

            $detailDaftar=DetailPendaftaranPemeriksaan::create([
                'idDaftarPemeriksaan' => $id,
                'idJenisPemeriksaan' => Str::before($namaJenisPemeriksaan[$dp], '-'),//mengambil nilai paling depan dari 2-RRZZZ
                'jamMulai' => $jamMulai[$dp],
                'jamSelesai' => $jamSelesai[$dp],
                'statusKetersediaan' => 'tidak',
                'keterangan' => 'Menunggu Approval',
            ]);
        }

        return redirect()->route('pendaftaranpemeriksaan.list')->with('success','Update Pendaftaran Pemeriksaan berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        PendaftaranPemeriksaan::where('id', $id)->delete();
        DetailPendaftaranPemeriksaan::where('idDaftarPemeriksaan', $id)->delete();
        return redirect()->route('pendaftaranpemeriksaan.list')->with('success','Delete Pendaftaran Pemeriksaan berhasil.');
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
