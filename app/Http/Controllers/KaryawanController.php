<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Karyawan as KaryawanModel;

class KaryawanController extends Controller
{
    //
    public function index(){
        if(KaryawanModel::where('idUser', '=', Auth::user()->id)->exists()){
            session()->put('status', 'yes');
            return view('karyawan.dashboard');
        }else{
           
            return view('karyawan.detailbiodata'); 
        }
    }

    public function storedetailbio(Request $request){
        $rules = [
            'idKTP' => 'required|numeric|digits_between:10,20|unique:karyawan,idKTP',
            'jenisKelamin' => 'required',
            'tanggalLahir' => 'required|date',
            'alamat' => 'required|string|min:3|max:255',
            'kota' => 'required|string|min:3|max:255',
            'noHp' => 'required|numeric',
            'noTlpRumah'=> 'required|numeric',
            'fotoprofil' => 'required|image',
            'fotoprofil.*' => 'mimes:jpg,jpeg,png|max:2048',

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
            //upload image
            $imageProfil = $request->file('fotoprofil');
            $imageNameProfil = time().".".$imageProfil->getClientOriginalExtension();
            $pathFotoProfil = Storage::disk('public')->putFileAs('fotoprofil/karyawan', $imageProfil,$imageNameProfil);

            $user=KaryawanModel::create([
                'idUser' => Auth::user()->id,
                'idKTP' => $request->idKTP,
                'jenisKelamin' => $request->jenisKelamin,
                'tanggalLahir' => $request->tanggalLahir,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'noHp' => $request->noHp,
                'noTeleponRumah'=> $request->noTlpRumah,
                'filefoto' => $imageNameProfil ,
            ]);
            return redirect()->route('karyawan.dashboard')->with('success','Input Data Karyawan '.Auth::user()->name.' berhasil.');
        }
    }
}
