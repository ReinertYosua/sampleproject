<?php

namespace App\Http\Controllers;

use App\Models\JenisPemeriksaan;
use App\Models\Modalitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class JenisPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datajenispemeriksaan = JenisPemeriksaan::join('modalitas', 'modalitas.id','=','jenis_pemeriksaan.idModalitas')
                                ->select(['modalitas.namaModalitas as namaModalitas', 'jenis_pemeriksaan.*'])
                                ->paginate(10);
        // dd($datajenispemeriksaan);
        return view('karyawan.jenispemeriksaan.index', compact('datajenispemeriksaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datamodal = Modalitas::latest()->paginate(10);
        return view('karyawan.jenispemeriksaan.create', compact('datamodal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'namaModalitas' => 'required|string|min:3|max:255',
            'namaJenisPemeriksaan' => 'required',
            'kelompokJenisPemeriksaan' => 'required|string',
            'pemakaianKontras' => 'required|string',
            'harga' => 'required|numeric',
            'lamaPemeriksaan'=> 'required|numeric',
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
        // dd($validator);
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator)
            ->with('danger', 'Pastikan semua field diisi');
		}else{
            // dd($request);

            $user= JenisPemeriksaan::create([
                'idModalitas' => $request->idModalitas,
                'namaJenisPemeriksaan' => $request->namaJenisPemeriksaan,
                'kelompokJenisPemeriksaan' => $request->kelompokJenisPemeriksaan,
                'pemakaianKontras' => $request->pemakaianKontras,
                'harga' => $request->harga,
                'lamaPemeriksaan' => $request->lamaPemeriksaan,
            ]);
            return redirect()->route('jenispemeriksaan.index')->with('success','Input Data Jenis Pemeriksaan '.$request->namaJenisPemeriksaan.' berhasil.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisPemeriksaan $jenisPemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisPemeriksaan $jenispemeriksaan)
    {
        //
        $datamodal = Modalitas::select('namaModalitas')
                    ->where('id','=',$jenispemeriksaan->idModalitas)
                    ->first();
        
        return view('karyawan.jenispemeriksaan.edit', compact('jenispemeriksaan','datamodal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisPemeriksaan $jenispemeriksaan)
    {
        //
        $rules = [
            'namaModalitas' => 'required|string|min:3|max:255',
            'namaJenisPemeriksaan' => 'required',
            'kelompokJenisPemeriksaan' => 'required|string',
            'pemakaianKontras' => 'required|string',
            'harga' => 'required|numeric',
            'lamaPemeriksaan'=> 'required|numeric',
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
        // dd($validator);
        if ($validator->fails()) {
			return redirect()->back()
			->withInput()
			->withErrors($validator)
            ->with('danger', 'Pastikan semua field diisi');
		}else{
            // dd($request);

            
            $jenispemeriksaan->idModalitas = $request->idModalitas;
            $jenispemeriksaan->namaJenisPemeriksaan = $request->namaJenisPemeriksaan;
            $jenispemeriksaan->kelompokJenisPemeriksaan = $request->kelompokJenisPemeriksaan;
            $jenispemeriksaan->pemakaianKontras = $request->pemakaianKontras;
            $jenispemeriksaan->harga = $request->harga;
            $jenispemeriksaan->lamaPemeriksaan = $request->lamaPemeriksaan;
            $jenispemeriksaan->save();
           
            return redirect()->route('jenispemeriksaan.index')->with('success','Update Data Jenis Pemeriksaan '.$request->namaJenisPemeriksaan.' berhasil.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisPemeriksaan $jenispemeriksaan)
    {
        //
        $jenispemeriksaan->delete();
        return redirect()
            ->route('jenispemeriksaan.index')
            ->with('success', 'Jenis Pemeriksaan berhasil dihapus');
    }
}
