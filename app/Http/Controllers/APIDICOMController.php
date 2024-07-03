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
        $data1 = $request->all();
        Log::info('Received registration status from DICOM', $data1);
        $data = $request->input('data');
        foreach ($data as $item) {
            
            $PerformedProcedureStepID = $item['PerformedProcedureStepID'];
            $PerformedStationAETitle = $item['PerformedStationAETitle'];
            $PerformedStationName = $item['PerformedStationName'];
            $PerformedLocation = $item['PerformedLocation'];
            $PerformedProcedureStepStartDate = $item['PerformedProcedureStepStartDate'];
            $PerformedProcedureStepStartTime = $item['PerformedProcedureStepStartTime'];
            $PerformedProcedureStepStatus = $item['PerformedProcedureStepStatus'];
            $PerformedProcedureStepDescription = $item['PerformedProcedureStepDescription'];
            $PerformedProcedureTypeDescription = $item['PerformedProcedureTypeDescription'];
            $PerformedProcedureCodeSequence = $item['PerformedProcedureCodeSequence'];
            $PerformedProcedureStepEndDate = $item['PerformedProcedureStepEndDate'];
            $PerformedProcedureStepEndTime = $item['PerformedProcedureStepEndTime'];
            
            Log::info('PerformedProcedureStepID: ' . $PerformedProcedureStepID );
            Log::info('PerformedStationAETitle: ' . $PerformedStationAETitle);
            Log::info('PerformedStationName: ' . $PerformedStationName);
            Log::info('PerformedLocation: ' . $PerformedLocation);
            Log::info('PerformedProcedureStepStartDate: ' . $PerformedProcedureStepStartDate);
            Log::info('PerformedProcedureStepStartTime: ' . $PerformedProcedureStepStartTime);
            Log::info('PerformedProcedureStepStartTime: ' . $PerformedProcedureStepStartTime);
            Log::info('PerformedProcedureStepStatus: ' . $PerformedProcedureStepStatus);
            Log::info('PerformedProcedureStepDescription: ' . $PerformedProcedureStepDescription);
            Log::info('PerformedProcedureTypeDescription: ' . $PerformedProcedureTypeDescription);
            Log::info('PerformedProcedureCodeSequence: ' . $PerformedProcedureCodeSequence);
            Log::info('PerformedProcedureStepEndTime: ' . $PerformedProcedureStepEndTime);
            // Contoh: Simpan ke database atau lakukan proses lain
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Status received successfully',
            'data' => $request->all()
        ]);
    }
}
