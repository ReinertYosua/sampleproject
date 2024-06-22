<?php

namespace App\Http\Controllers;

use App\Models\Dicom;
use App\Models\Modalitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DicomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datadicom = Dicom::latest()->paginate(10);
        return view('karyawan.dicom.index', compact('datadicom'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $datamodal = Modalitas::latest()->paginate(10);
        return view('karyawan.dicom.create', compact('datamodal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'alamatIP' => 'required|string|min:3|max:255',
            'netMask' => 'required|string|min:3|max:255',
            'layananDICOM' => 'required|string|min:3|max:255',
            'peran' => 'required|string|min:3|max:255',
            'AET' => 'required|string|min:3|max:255',
            'port' => 'required|numeric',
            
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
            // dd($request);

            $user= Dicom::create([
                'alamatIP' => $request->alamatIP,
                'netMask' => $request->netMask,
                'layananDICOM' => $request->layananDICOM,
                'peran' => $request->peran,
                'AET' => $request->AET,
                'port' => $request->port,
            ]);
            return redirect()->route('dicom.index')->with('success','Input Data DICOM '.$request->layananDICOM.' berhasil.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Dicom $dicom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dicom $dicom)
    {
        //
        return view('karyawan.dicom.edit', compact('dicom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dicom $dicom)
    {
        //
        $rules = [
            'alamatIP' => 'required|string|min:3|max:255',
            'netMask' => 'required|string|min:3|max:255',
            'layananDICOM' => 'required|string|min:3|max:255',
            'peran' => 'required|string|min:3|max:255',
            'AET' => 'required|string|min:3|max:255',
            'port' => 'required|numeric',
            
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
            // dd($request);

            
            $dicom->alamatIP = $request->alamatIP;
            $dicom->netMask = $request->netMask;
            $dicom->layananDICOM = $request->layananDICOM;
            $dicom->peran = $request->peran;
            $dicom->AET = $request->AET;
            $dicom->port = $request->port;
            $dicom->save();
           
            return redirect()->route('dicom.index')->with('success','Update Data DICOM '.$request->layananDICOM.' berhasil.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dicom $dicom)
    {
        //
        $dicom->delete();
        return redirect()
            ->route('dicom.list')
            ->with('success', 'DICOM berhasil dihapus');
    }
}
