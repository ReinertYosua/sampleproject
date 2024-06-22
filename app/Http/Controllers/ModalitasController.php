<?php

namespace App\Http\Controllers;

use App\Models\Modalitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ModalitasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datamodal = Modalitas::latest()->paginate(10);
        return view('karyawan.modalitas.index', compact('datamodal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('karyawan.modalitas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'namaModalitas' => 'required|string|min:3|max:255',
            'jenisModalitas' => 'required',
            'merekModalitas' => 'required|string|min:3|max:255',
            'tipeModalitas' => 'required|string|min:3|max:255',
            'nomorSeriModalitas' => 'required|string|min:3|max:255',
            'alamatIP' => 'required|string|min:3|max:255',
            'kodeRuang'=> 'required|string|min:3|max:255',
            
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

            $user= Modalitas::create([
                'namaModalitas' => $request->namaModalitas,
                'jenisModalitas' => $request->jenisModalitas,
                'merekModalitas' => $request->merekModalitas,
                'tipeModalitas' => $request->tipeModalitas,
                'nomorSeriModalitas' => $request->nomorSeriModalitas,
                'alamatIP' => $request->alamatIP,
                'kodeRuang' => $request->kodeRuang,
            ]);
            return redirect()->route('modalitas.index')->with('success','Input Data Modalitas '.$request->namaModalitas.' berhasil.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Modalitas $modalitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Modalitas $modalitas)
    {
        // dd($dataModal);
        return view('karyawan.modalitas.edit', compact('modalitas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modalitas $modalitas)
    {
        

        
        $rules = [
            'namaModalitas' => 'required|string|min:3|max:255',
            'jenisModalitas' => 'required',
            'merekModalitas' => 'required|string|min:3|max:255',
            'tipeModalitas' => 'required|string|min:3|max:255',
            'nomorSeriModalitas' => 'required|string|min:3|max:255',
            'alamatIP' => 'required|string|min:3|max:255',
            'kodeRuang'=> 'required|string|min:3|max:255',
            
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
            
           
            
            $modalitas->namaModalitas = $request->namaModalitas;
            $modalitas->jenisModalitas = $request->jenisModalitas;
            $modalitas->merekModalitas = $request->merekModalitas;
            $modalitas->tipeModalitas = $request->tipeModalitas;
            $modalitas->nomorSeriModalitas = $request->nomorSeriModalitas;
            $modalitas->alamatIP = $request->alamatIP;
            $modalitas->kodeRuang = $request->kodeRuang;
            $modalitas->save();
        }
        return redirect()->route('modalitas.list')->with('success','Edit Data Modalitas berhasil.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modalitas $modalitas)
    {
        //
        $modalitas->delete();
        return redirect()
            ->route('modalitas.list')
            ->with('success', 'Modalitas berhasil dihapus');
    }
}
