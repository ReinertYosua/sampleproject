<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Models\Pasien as PasienModel;

class PasienController extends Controller
{
    //
    public function index(){
        if(PasienModel::where('idUser', '=', Auth::user()->id)->exists()){
            session()->put('status', 'yes');
            return view('dashboard');
        }else{
            return view('pasien.detailbiodata'); 
        }
    }

    public function create(){
        return view('pasien.create');
    }

    public function storedetailbio(Request $request){

        // dd($request);

        $rules = [
            'tempatLahir' => 'required|min:3|max:255',
            'tanggalLahir' => 'required|date',
            'noIdentitas' => 'required|numeric|min:10|unique:pasien,noIdentitas',
            'tipeIdentitas' => 'required',
            'jenisKelamin' => 'required',
            'pekerjaan' => 'required|string|min:3|max:255',
            'alamat' => 'required|string|min:3|max:255',
            'kota' => 'required|string|min:3|max:255',
            'statusPerkawinan'=> 'required|string|min:3|max:255',
            'agama' => 'required|string|min:3|max:255',
            'noTlpRumah'=> 'required|numeric',
            'noHp' => 'required|numeric',
            'namaKontakDarurat' => 'required|string|min:3|max:255',
            'noKontakDarurat' => 'required|numeric',
            'kewarganegaraan' => 'required|string|min:3|max:255',
            'alergi' => 'required|string|min:3|max:255',
            'golDarah' => 'required|string',
            'tinggiBadan'=> 'required|numeric',
            'beratBadan' => 'required|numeric',
            // 'fotoprofil' => 'required|image',
            // 'fotoprofil.*' => 'mimes:jpg,jpeg,png|max:2048',
           
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


        // $validator = Validator::make($request->all(), [
        //     'nomor_telepon' => 'required|numeric',
        // ], [
        //     'nomor_telepon.required' => 'Nomor telepon wajib diisi.',
        //     'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka.',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()
        //                      ->withErrors($validator)
        //                      ->withInput();
        // }

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
                $pathFotoProfil = Storage::disk('public')->putFileAs('fotoprofil/pasien', $imageProfil,$imageNameProfil);
            }else{
                $imageNameProfil="no pict";
            }
            

            $user=PasienModel::create([
                'idUser' => Auth::user()->id,
                'tempatLahir' => $request->tempatLahir,
                'tanggalLahir' => $request->tanggalLahir,
                'noIdentitas' => $request->noIdentitas,
                'tipeIdentitas' => $request->tipeIdentitas,
                'jenisKelamin' => $request->jenisKelamin,
                'pekerjaan' => $request->pekerjaan,
                'alamat' => $request->alamat,
                'kota' => $request->kota,
                'statusPerkawinan' => $request->statusPerkawinan,
                'agama' => $request->agama,
                'noTeleponRumah' => $request->noTlpRumah,
                'noHp' => $request->noHp,
                'namaKontakDarurat' => $request->namaKontakDarurat,
                'noKontakDarurat' => $request->noKontakDarurat,
                'kewarganegaraan' => $request->kewarganegaraan,
                'alergi' => $request->alergi,
                'golonganDarah' => $request->golDarah,
                'tinggiBadan' => $request->tinggiBadan,
                'beratBadan' => $request->beratBadan,
                'filefoto' => $imageNameProfil,
            ]);
            return redirect()->route('dashboard')->with('success','Input Data Pasien '.Auth::user()->name.' berhasil.');
        }
        
    }

}
