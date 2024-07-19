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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class APIDICOMController extends Controller
{
    //

    /*
    StudyID: StudyID adalah identifier unik yang digunakan untuk mengidentifikasi satu studi atau pemeriksaan medis tertentu yang telah dilakukan. StudyID berfungsi untuk mengelompokkan semua data gambar dan informasi yang dihasilkan selama suatu studi medis.
    RequestedProcedureID: RequestedProcedureID adalah identifier unik yang digunakan untuk mengidentifikasi prosedur medis yang diminta sebelum pemeriksaan dilakukan. Ini digunakan untuk mengaitkan permintaan prosedur dari dokter dengan pelaksanaan dan hasil dari prosedur tersebut.
    */

    /*
    StudyID dan StudyInstanceUID

    StudyID:
    Definisi: Identifier unik yang digunakan untuk mengidentifikasi satu studi atau pemeriksaan medis tertentu.
    Penggunaan: Mengelompokkan semua data gambar dan informasi terkait dalam satu studi.
    StudyInstanceUID:
    Definisi: Identifier unik yang lebih global dan standar yang digunakan untuk mengidentifikasi satu studi atau pemeriksaan medis tertentu di seluruh sistem DICOM.
    Penggunaan: Memastikan bahwa setiap studi memiliki pengenal yang benar-benar unik di seluruh sistem DICOM, yang memungkinkan interoperabilitas dan integrasi data medis.
    Hubungan: StudyID adalah pengenal yang mungkin digunakan secara internal dalam suatu fasilitas kesehatan atau sistem tertentu, sementara StudyInstanceUID adalah pengenal unik secara global yang memastikan konsistensi dan interoperabilitas dalam pertukaran data DICOM di berbagai sistem dan organisasi.

    RequestedProcedureID dan ScheduledProcedureStepID

    RequestedProcedureID:
    Definisi: Identifier unik yang digunakan untuk mengidentifikasi prosedur medis yang diminta oleh dokter sebelum pemeriksaan dilakukan.
    Penggunaan: Mengaitkan permintaan prosedur dengan pelaksanaan dan hasil dari prosedur tersebut.
    ScheduledProcedureStepID:
    Definisi: Identifier unik yang digunakan untuk mengidentifikasi langkah-langkah prosedur yang dijadwalkan.
    Penggunaan: Mengelola dan melacak status serta detail dari setiap langkah prosedur medis yang telah dijadwalkan.
    Hubungan: RequestedProcedureID digunakan pada tahap awal untuk mencatat permintaan prosedur medis dari dokter, sementara ScheduledProcedureStepID digunakan untuk merinci dan menjadwalkan langkah-langkah spesifik yang diperlukan untuk melaksanakan prosedur tersebut. Keduanya saling terkait dalam mengelola alur kerja prosedur medis dari permintaan awal hingga pelaksanaan.
    */
    public function receiveStatus(Request $request){
        $data = $request->all();
        Log::info('Received registration status from DICOM', $data);
        
        $StudyID = $request->input('StudyID');
        $SOPClassUID = $request->input('SOPClassUID');
        $SOPInstanceUID = $request->input('SOPInstanceUID');
        $PerformedProcedureStepStatus = $request->input('PerformedProcedureStepStatus');
        $RequestedProcedureID = $request->input('RequestedProcedureID');
        // $PatientID = $request->input('PatientID');
        // $PatientName = $request->input('PatientName');
        // $PatientBirthDate = $request->input('PatientBirthDate');
        // $PatientSex = $request->input('PatientSex');
        // $StudyID = $request->input('StudyID');
        // $PerformedProcedureStepID = $request->input('PerformedProcedureStepID');
        // $PerformedStationAETitle = $request->input('PerformedStationAETitle');
        // $PerformedStationName = $request->input('PerformedStationName');
        // $PerformedLocation = $request->input('PatienPerformedLocationtName');
        // $PerformedProcedureStepStartDate = $request->input('PerformedProcedureStepStartDate');
        // $PerformedProcedureStepStartTime = $request->input('PerformedProcedureStepStartTime');
        // $PerformedProcedureStepStatus = $request->input('PerformedProcedureStepStatus');
        // $PerformedProcedureStepDescription = $request->input('PerformedProcedureStepDescription');
        // $PerformedProcedureTypeDescription = $request->input('PerformedProcedureTypeDescription');
        // $PerformedProcedureCodeSequence = $request->input('PerformedProcedureCodeSequence');
        // $PerformedProcedureStepEndDate = $request->input('PerformedProcedureStepEndDate');
        // $PerformedProcedureStepEndTime = $request->input('PerformedProcedureStepEndTime');

        Log::info('StudyID: ' . $StudyID );
        Log::info('SOPClassUID: ' . $SOPClassUID );
        Log::info('SOPInstanceUID: ' . $SOPInstanceUID );
        Log::info('PerformedProcedureStepStatus: ' . $PerformedProcedureStepStatus );
        Log::info('RequestedProcedureID: ' . $RequestedProcedureID );
        // Log::info('PatientID: ' . $PatientID );
        // Log::info('PatientName: ' . $PatientName );
        // Log::info('PatientBirthDate: ' . $PatientBirthDate );
        // Log::info('PatientSex: ' . $PatientSex );
        // Log::info('StudyID: ' . $StudyID );
        // Log::info('PerformedProcedureStepID: ' . $PerformedProcedureStepID );
        // Log::info('PerformedStationAETitle: ' . $PerformedStationAETitle);
        // Log::info('PerformedStationName: ' . $PerformedStationName);
        // Log::info('PerformedLocation: ' . $PerformedLocation);
        // Log::info('PerformedProcedureStepStartDate: ' . $PerformedProcedureStepStartDate);
        // Log::info('PerformedProcedureStepStartTime: ' . $PerformedProcedureStepStartTime);
        // Log::info('PerformedProcedureStepStatus: ' . $PerformedProcedureStepStatus);
        // Log::info('PerformedProcedureStepDescription: ' . $PerformedProcedureStepDescription);
        // Log::info('PerformedProcedureTypeDescription: ' . $PerformedProcedureTypeDescription);
        // Log::info('PerformedProcedureCodeSequence: ' . $PerformedProcedureCodeSequence);
        // Log::info('PerformedProcedureStepStartDate: ' . $PerformedProcedureStepEndDate);
        // Log::info('PerformedProcedureStepEndTime: ' . $PerformedProcedureStepEndTime);

        $statusPemeriksaan='';
        if($PerformedProcedureStepStatus=="IN PROGRESS"){
            $statusPemeriksaan='3';
            $user = DetailTransaksiPemeriksaan::where('uuid','=', $RequestedProcedureID)
            ->update([
                'performedInstanceUID' => $SOPInstanceUID,
                'status' => $statusPemeriksaan,
                'updated_at' => Carbon::now(),
            ]);
        }else if($PerformedProcedureStepStatus=="COMPLETED"){
            $statusPemeriksaan='4';
            $user = DetailTransaksiPemeriksaan::where('performedInstanceUID','=', $SOPInstanceUID)
            ->where('uuid','=', $RequestedProcedureID)
            ->update([
                'status' => $statusPemeriksaan,
                'updated_at' => Carbon::now(),
            ]);
        }

    
        



        //new
        // // Menerima data JSON dari request body
        // $jsonData = $request->getContent();

        // // Mendekode JSON menjadi array PHP
        // $dicomData = json_decode($jsonData, true);

        // // Cek apakah JSON berhasil didekode
        // if (json_last_error() !== JSON_ERROR_NONE) {
        //     return response()->json(['error' => 'Invalid JSON data'], 400);
        // }

        // // Akses data sesuai kebutuhan
        // $SOPInstanceUID = $dicomData['SOPInstanceUID'] ?? 'N/A';
        // $patientID = $dicomData['PatientID'] ?? 'N/A';
        // $patientName = $dicomData['PatientName'] ?? 'N/A';
        // $patientBirthDate = $dicomData['PatientBirthDate'] ?? 'N/A';
        // $patientSex = $dicomData['PatientSex'] ?? 'N/A';
        // $studyID = $dicomData['StudyID'] ?? 'N/A';
        // $PerformedProcedureStepID = $dicomData['PerformedProcedureStepID'] ?? 'N/A';
        // $PerformedStationAETitle = $dicomData['PerformedStationAETitle'] ?? 'N/A';
        // $PerformedStationName = $dicomData['PerformedStationName'] ?? 'N/A';
        // $PerformedLocation = $dicomData['PerformedLocation'] ?? 'N/A';
        // $PerformedProcedureStepStartDate = $dicomData['PerformedProcedureStepStartDate'] ?? 'N/A';
        // $PerformedProcedureStepStartTime = $dicomData['PerformedProcedureStepStartTime'] ?? 'N/A';
        // $PerformedProcedureStepStatus = $dicomData['PerformedProcedureStepStatus'] ?? 'N/A';
        // $PerformedProcedureStepDescription = $dicomData['PerformedProcedureStepDescription'] ?? 'N/A';
        // $PerformedProcedureTypeDescription = $dicomData['PerformedProcedureTypeDescription'] ?? 'N/A';
        // $PerformedProcedureCodeSequence = $dicomData['PerformedProcedureCodeSequence'] ?? 'N/A';
        // $PerformedProcedureStepEndDate = $dicomData['PerformedProcedureStepEndDate'] ?? 'N/A';
        // $PerformedProcedureStepEndTime = $dicomData['PerformedProcedureStepEndTime'] ?? 'N/A';

        // Log::info('SOPInstanceUID: ' . $SOPInstanceUID );
        // Log::info('PatientID: ' . $PatientID );
        // Log::info('PatientName: ' . $PatientName );
        // Log::info('PatientBirthDate: ' . $PatientBirthDate );
        // Log::info('PatientSex: ' . $PatientSex );
        // Log::info('StudyID: ' . $StudyID );
        // Log::info('PerformedProcedureStepID: ' . $PerformedProcedureStepID );
        // Log::info('PerformedStationAETitle: ' . $PerformedStationAETitle);
        // Log::info('PerformedStationName: ' . $PerformedStationName);
        // Log::info('PerformedLocation: ' . $PerformedLocation);
        // Log::info('PerformedProcedureStepStartDate: ' . $PerformedProcedureStepStartDate);
        // Log::info('PerformedProcedureStepStartTime: ' . $PerformedProcedureStepStartTime);
        // Log::info('PerformedProcedureStepStatus: ' . $PerformedProcedureStepStatus);
        // Log::info('PerformedProcedureStepDescription: ' . $PerformedProcedureStepDescription);
        // Log::info('PerformedProcedureTypeDescription: ' . $PerformedProcedureTypeDescription);
        // Log::info('PerformedProcedureCodeSequence: ' . $PerformedProcedureCodeSequence);
        // Log::info('PerformedProcedureStepStartDate: ' . $PerformedProcedureStepEndDate);
        // Log::info('PerformedProcedureStepEndTime: ' . $PerformedProcedureStepEndTime);



        // old
        // $data = $request->input('data');
        // foreach ($data as $item) {
            
        //     $SOPInstanceUID = $item['SOPInstanceUID'];
        //     $PerformedProcedureStepID = $item['PerformedProcedureStepID'];
        //     $PerformedStationAETitle = $item['PerformedStationAETitle'];
        //     $PerformedStationName = $item['PerformedStationName'];
        //     $PerformedLocation = $item['PerformedLocation'];
        //     $PerformedProcedureStepStartDate = $item['PerformedProcedureStepStartDate'];
        //     $PerformedProcedureStepStartTime = $item['PerformedProcedureStepStartTime'];
        //     $PerformedProcedureStepStatus = $item['PerformedProcedureStepStatus'];
        //     $PerformedProcedureStepDescription = $item['PerformedProcedureStepDescription'];
        //     $PerformedProcedureTypeDescription = $item['PerformedProcedureTypeDescription'];
        //     $PerformedProcedureCodeSequence = $item['PerformedProcedureCodeSequence'];
        //     $PerformedProcedureStepEndDate = $item['PerformedProcedureStepEndDate'];
        //     $PerformedProcedureStepEndTime = $item['PerformedProcedureStepEndTime'];
            
        //     Log::info('SOPInstanceUID: ' . $SOPInstanceUID );
        //     Log::info('PerformedProcedureStepID: ' . $PerformedProcedureStepID );
        //     Log::info('PerformedStationAETitle: ' . $PerformedStationAETitle);
        //     Log::info('PerformedStationName: ' . $PerformedStationName);
        //     Log::info('PerformedLocation: ' . $PerformedLocation);
        //     Log::info('PerformedProcedureStepStartDate: ' . $PerformedProcedureStepStartDate);
        //     Log::info('PerformedProcedureStepStartTime: ' . $PerformedProcedureStepStartTime);
        //     Log::info('PerformedProcedureStepStartTime: ' . $PerformedProcedureStepStartTime);
        //     Log::info('PerformedProcedureStepStatus: ' . $PerformedProcedureStepStatus);
        //     Log::info('PerformedProcedureStepDescription: ' . $PerformedProcedureStepDescription);
        //     Log::info('PerformedProcedureTypeDescription: ' . $PerformedProcedureTypeDescription);
        //     Log::info('PerformedProcedureCodeSequence: ' . $PerformedProcedureCodeSequence);
        //     Log::info('PerformedProcedureStepEndTime: ' . $PerformedProcedureStepEndTime);
        //     // Contoh: Simpan ke database atau lakukan proses lain
        // }

        return response()->json([
            'status' => 'success',
            'message' => 'Status received successfully',
            'data' => $request->all()
        ]);
    }

    public function submitHasilPemeriksaan(){
        // $hasilPemeriksaan=HasilPemeriksaan::create([
        //     'idTransaksiPemeriksaan' => $id,
        //     'no_transaksi_pemeriksaan' => $request->no_transaksi_pemeriksaan,
        //     'idKaryawan' => $getTransPeriksa[0]->idKaryawan,
        //     'idDokter' => $getTransPeriksa[0]->idDokter,
        // ]);
    }
}
