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

class APIDICOMController extends Controller
{
    //
    public function receiveStatus(Request $request){
        $data = $request->all();
        Log::info('Received registration status from DICOM', $data);
        
        $SOPInstanceUID = $request->input('SOPInstanceUID');
        $PatientID = $request->input('PatientID');
        $PatientName = $request->input('PatientName');
        $PatientBirthDate = $request->input('PatientBirthDate');
        $PatientSex = $request->input('PatientSex');
        $StudyID = $request->input('StudyID');
        $PerformedProcedureStepID = $request->input('PerformedProcedureStepID');
        $PerformedStationAETitle = $request->input('PerformedStationAETitle');
        $PerformedStationName = $request->input('PerformedStationName');
        $PerformedLocation = $request->input('PatienPerformedLocationtName');
        $PerformedProcedureStepStartDate = $request->input('PerformedProcedureStepStartDate');
        $PerformedProcedureStepStartTime = $request->input('PerformedProcedureStepStartTime');
        $PerformedProcedureStepStatus = $request->input('PerformedProcedureStepStatus');
        $PerformedProcedureStepDescription = $request->input('PerformedProcedureStepDescription');
        $PerformedProcedureTypeDescription = $request->input('PerformedProcedureTypeDescription');
        $PerformedProcedureCodeSequence = $request->input('PerformedProcedureCodeSequence');
        $PerformedProcedureStepEndDate = $request->input('PerformedProcedureStepEndDate');
        $PerformedProcedureStepEndTime = $request->input('PerformedProcedureStepEndTime');

        Log::info('SOPInstanceUID: ' . $SOPInstanceUID );
        Log::info('PatientID: ' . $PatientID );
        Log::info('PatientName: ' . $PatientName );
        Log::info('PatientBirthDate: ' . $PatientBirthDate );
        Log::info('PatientSex: ' . $PatientSex );
        Log::info('StudyID: ' . $StudyID );
        Log::info('PerformedProcedureStepID: ' . $PerformedProcedureStepID );
        Log::info('PerformedStationAETitle: ' . $PerformedStationAETitle);
        Log::info('PerformedStationName: ' . $PerformedStationName);
        Log::info('PerformedLocation: ' . $PerformedLocation);
        Log::info('PerformedProcedureStepStartDate: ' . $PerformedProcedureStepStartDate);
        Log::info('PerformedProcedureStepStartTime: ' . $PerformedProcedureStepStartTime);
        Log::info('PerformedProcedureStepStatus: ' . $PerformedProcedureStepStatus);
        Log::info('PerformedProcedureStepDescription: ' . $PerformedProcedureStepDescription);
        Log::info('PerformedProcedureTypeDescription: ' . $PerformedProcedureTypeDescription);
        Log::info('PerformedProcedureCodeSequence: ' . $PerformedProcedureCodeSequence);
        Log::info('PerformedProcedureStepStartDate: ' . $PerformedProcedureStepEndDate);
        Log::info('PerformedProcedureStepEndTime: ' . $PerformedProcedureStepEndTime);



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
}
