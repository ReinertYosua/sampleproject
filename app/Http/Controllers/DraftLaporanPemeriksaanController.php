<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use App\Models\Karyawan;
use App\Models\DraftLaporanPemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DraftLaporanPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datadraftlaporan = DraftLaporanPemeriksaan::join('jenis_pemeriksaan as a','a.id','=','draft_laporan_pemeriksaan.idJenisPemeriksaan')
                            ->join('karyawan as b','b.id','=','draft_laporan_pemeriksaan.idKaryawan')
                            ->join('users as c','c.id','=','b.idUser')
                            ->select('draft_laporan_pemeriksaan.id','a.namaJenisPemeriksaan','c.name as namaKaryawan', 'draft_laporan_pemeriksaan.laporanNormal','draft_laporan_pemeriksaan.created_at')
                            ->get();                    
        ;
        return view('karyawan.draftlaporan.index',compact('datadraftlaporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $getDataJenisPemeriksaan=JenisPemeriksaan::all();

        return view('karyawan.draftlaporan.create', compact('getDataJenisPemeriksaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request);
        $rules = [
            'idJenisPemeriksaan' => 'required',
            'laporanNormal' => 'required|string|min:3',
            
		];
        $id=
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':attribute harus diisi dengan alamat email yang valid.',
            'numeric' => ':attribute harus diisi dengan angka.',
            'unique' => ':attribute sudah digunakan.'
        ]; 
        $validator = Validator::make($request->all(),$rules,$id);
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator)
            ->with('danger', 'Pastikan semua field diisi');
		}else{
            // 
            $getIdKaryawan = Karyawan::join('users','users.id','=','karyawan.idUser')
                            ->where('users.id','=', Auth::user()->id)
                            ->select('karyawan.id as idKaryawan','users.name as namaKaryawan')
                            ->get();
                            
                            //dd($getIdKaryawan);
            $user= DraftLaporanPemeriksaan::create([
                'idKaryawan' => $getIdKaryawan[0]->idKaryawan,
                'idJenisPemeriksaan' => $request->idJenisPemeriksaan,
                'laporanNormal' => $request->laporanNormal,
            ]);
            return redirect()->route('draftlaporanpemeriksaan.index')->with('success','Input Data Draft Laporan Pemeriksaan berhasil.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $dataDraftLaporan = DraftLaporanPemeriksaan::join('jenis_pemeriksaan','jenis_pemeriksaan.id','=','draft_laporan_pemeriksaan.idJenisPemeriksaan')
                            ->select('draft_laporan_pemeriksaan.laporanNormal','jenis_pemeriksaan.namaJenisPemeriksaan')
                            ->where('draft_laporan_pemeriksaan.id','=',$id)
                            ->get();
        
        $namaJenisPemeriksaan = $dataDraftLaporan[0]->namaJenisPemeriksaan;
        $laporanNormal = $dataDraftLaporan[0]->laporanNormal;

        return response()->json([
            
            'namaJenisPemeriksaan' => $namaJenisPemeriksaan,
            'laporanNormal' => $laporanNormal,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DraftLaporanPemeriksaan $draftlaporanpemeriksaan)
    {
        //
        $getDataJenisPemeriksaan=JenisPemeriksaan::all();
        return view('karyawan.draftlaporan.edit',compact('draftlaporanpemeriksaan','getDataJenisPemeriksaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DraftLaporanPemeriksaan $draftlaporanpemeriksaan)
    {
        //
        $rules = [
            'idJenisPemeriksaan' => 'required',
            'laporanNormal' => 'required|string|min:3',
            
		];
        $id=
        [
            'required' => ':attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => ':attribute harus diisi dengan alamat email yang valid.',
            'numeric' => ':attribute harus diisi dengan angka.',
            'unique' => ':attribute sudah digunakan.'
        ]; 
        $validator = Validator::make($request->all(),$rules,$id);
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator)
            ->with('danger', 'Pastikan semua field diisi');
		}else{
            // 
            $getIdKaryawan = Karyawan::join('users','users.id','=','karyawan.idUser')
                            ->where('users.id','=', Auth::user()->id)
                            ->select('karyawan.id as idKaryawan','users.name as namaKaryawan')
                            ->get();
                            
                            //dd($getIdKaryawan);
            $draftlaporanpemeriksaan->idJenisPemeriksaan = $request->idJenisPemeriksaan;
            $draftlaporanpemeriksaan->laporanNormal = $request->laporanNormal;
            $draftlaporanpemeriksaan->save();
           
            return redirect()->route('draftlaporanpemeriksaan.index')->with('success','Update Data Draft Laporan Pemeriksaan berhasil.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DraftLaporanPemeriksaan $draftlaporanpemeriksaan)
    {
        //
        $draftlaporanpemeriksaan->delete();
        return redirect()
            ->route('draftlaporanpemeriksaan.index')
            ->with('success', 'Draft Laporan Pemeriksaan berhasil dihapus');
    }
}
