<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Dokter as DokterModel;

class DokterController extends Controller
{
    //
    public function index(){
        if(DokterModel::where('idUser', '=', Auth::user()->id)->exists()){
            session()->put('status', 'yes');
            return view('dokter.dashboard');
        }else{
            return view('dokter.detailbiodata'); 
        }
    }
    public function storedetailbio(Request $request){
        $rules = [
            'idKTP' => 'required|numeric|digits_between:10,20|unique:karyawan,idKTP',
            'jenisKelamin' => 'required',
            'spesialis' => 'required|string|min:3|max:255',
            'tanggalLahir' => 'required|date',
            'alamat' => 'required|string|min:3|max:255',
            'kota' => 'required|string|min:3|max:255',
            'noHp' => 'required|numeric',
            'noTlpRumah'=> 'required|numeric',
            //'fotoprofil' => 'required|image',
            //'fotoprofil.*' => 'mimes:jpg,jpeg,png|max:2048',

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
            if($imageProfil!=""){
                $imageNameProfil = time().".".$imageProfil->getClientOriginalExtension();
                $pathFotoProfil = Storage::disk('public')->putFileAs('fotoprofil/dokter', $imageProfil,$imageNameProfil);
            }else{
                $imageNameProfil="no pict";
            }
            

            $user=DokterModel::create([
                'idUser' => Auth::user()->id,
                'idKTP' => $request->idKTP,
                'jenisKelamin' => $request->jenisKelamin,
                'spesialis' => $request->spesialis,
                'tanggalLahir' => $request->tanggalLahir,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'noHp' => $request->noHp,
                'noTeleponRumah'=> $request->noTlpRumah,
                'filefoto' => $imageNameProfil ,
            ]);
            return redirect()->route('dokter.dashboard')->with('success','Input Data Dokter '.Auth::user()->name.' berhasil.');
        }
    }
}
