@extends('layouts.app')
@section('title','Edit Hasil Laporan')
@if(Auth::user()->role=='dokter')
    @section('setActiveDokterHasilPemeriksaan', 'active')
    @section('setShowDokterHasilPemeriksaan', 'show')
    @section('setCollapsedDokterHasilPeriksa', '')
@elseif(Auth::user()->role=='pasien')
    @section('setActivePasienHasilPemeriksaan', 'active')
    @section('setShowPasienHasilPemeriksaan', 'show')
    @section('setCollapsedPasienHasilPeriksa', '')
@elseif(Auth::user()->role=='karyawan')
    @section('setActiveKaryawanHasilPemeriksaan', 'active')
    @section('setShowKaryawanHasilPemeriksaan', 'show')
    @section('setCollapsedKaryawanHasilPeriksa', '')
    @section('setCollapsedMaster', 'collapsed')
    @section('setShowMaster', '')
@endif
<!-- @section('setActiveKaryawanPendaftaranPemeriksaan', 'active')
@section('setShowKaryawanDaftarPeriksa', 'show')
@section('setCollapsedKaryawanDaftarPeriksa', '') -->
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Report Hasil Pemeriksaan Pasien</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Hasil Pemeriksaan</li>
          <li class="breadcrumb-item active">Report Hasil Pemeriksaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          <div class="card d-print-inline-block">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Report Hasil Pemeriksaan Pasien</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title float-end">No:&nbsp;&nbsp;{{ $getHasilPemeriksaan[0]->no_transaksi_pemeriksaan }}</h5>
                </div>
              </div>
              
              
              
              @include('partial.dangeralert')
                <form id="formHasilPemeriksaan" action="{{ route('dokter.hasilpemeriksaan.update', $getHasilPemeriksaan[0]->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="col-md-6">
                        <input type="hidden" name="no_transaksi_pemeriksaan" value="{{ $getHasilPemeriksaan[0]->no_transaksi_pemeriksaan }}">
                        <input type="hidden" name="id_transaksi_pemeriksaan" value="{{ $getHasilPemeriksaan[0]->idTransaksiPemeriksaan }}">
                        <input type="hidden" name="id_hasil_pemeriksaan" value="{{ $getHasilPemeriksaan[0]->id }}">
                        <label for="" class="form-label">No Identitas</label>
                        <input type="text" id="noIdentitas" name="noIdentitas" value="{{ $getHasilPemeriksaan[0]->noIdentitas }}" class="form-control @error('noIdentitas') is-invalid @enderror" autocomplete="off" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Nama Pasien</label>
                        <input type="text" id="namaPasien" name="namaPasien" value="{{ $getHasilPemeriksaan[0]->namaPasien }}" class="form-control @error('namaPasien') is-invalid @enderror" autocomplete="off" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Tanggal Lahir</label>
                        <input type="date" id="tanggalLahir" name="tanggalLahir" value="{{ old('tanggalLahir', $getHasilPemeriksaan[0]->tanggalLahir) }}" class="form-control @error('tanggalLahir') is-invalid @enderror" autocomplete="off" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Jenis Kelamin</label>
                        <input type="text" id="jenisKelamin" name="jenisKelamin" value="{{ old('jenisKelamin', $getHasilPemeriksaan[0]->jenisKelamin) }}" class="form-control @error('jenisKelamin') is-invalid @enderror" autocomplete="off" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Telepon/Hp</label>
                        <input type="text" id="noHp" name="noHp" value="{{ old('noHp', $getHasilPemeriksaan[0]->noHp) }}" class="form-control @error('noHp') is-invalid @enderror" autocomplete="off" disabled>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Alamat</label>
                        <textarea name="alamat" id="" class="form-control @error('alamat') is-invalid @enderror" autocomplete="off" disabled>{{ old('alamat', $getHasilPemeriksaan[0]->alamat) }}</textarea>
                    </div>
                
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama Dokter Pemberi Rekomendasi</label>
                        <input type="text" id="namaDokterPengirim" name="namaDokterPengirim" value="{{ old('namaDokterPengirim', $getHasilPemeriksaan[0]->namaDokterRekomendasi) }}" class="form-control @error('namaDokterPengirim') is-invalid @enderror" autocomplete="off" disabled>
                        
                    </div>
                   
                    <div class="col-md-3">
                        <label for="" class="form-label">Tanggal Pemeriksaan</label>
                        <input type="date" id="tanggalPeriksa" name="tanggalPeriksa" value="{{ old('tanggalPeriksa', $getHasilPemeriksaan[0]->tanggalPemeriksaan) }}" class="form-control @error('tanggalPeriksa') is-invalid @enderror" autocomplete="off" disabled>
                    </div>
                    
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Detail Jenis Pemeriksaan</h3>
                                <table id="tabel_hasil_pemeriksaan" width="100%">
                                <tr>
                                    <td>
                                    Nama Jenis Pemeriksaan
                                    </td>
                                </tr>
                            
                                @php $index = 1 @endphp
                                @foreach($getDetailHasil as $gds)
                                <tr>    
                                    <td>
                                        
                                        <div class="row mb-5">
                                            <div class="col-md-3">
                                                
                                                <h5 class="card-title" ><small class="text-body-secondary">Jenis Pemeriksaan {{ $index }}</small></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5 class="card-title ">{{ $gds->namaJenisPemeriksaan }}</h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5 class="card-title float-end" ><small class="text-body-secondary">Jam: </small></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5 class="card-title">{{ $gds->jamMulaiAlat."-".$gds->jamSelesaiAlat }}</h5>
                                            </div>
                                            <div class="col-md-12">
                                                <input type="hidden" name="idDetailLaporan[]" id="idDetailLaporan{{ $index }}" value="{{ $gds->id }}">
                                                <span>
                                                {{ $gds->laporan }}
                                                </span>
                                                
                                            </div>
                                        </div>
                                        @php $index++ @endphp
                                    
                                    </td>
                                </tr>
                                @endforeach
                                </table>
                            <!-- <div class="row mt-5">
                                <div class="col-md-12">
                                    <button id="add_row"  class="btn btn-primary float-start">+ Add Row</button>
                                    <button id='delete_row' class="float-end btn btn-danger">- Delete Row</button>
                                </div>
                            </div> -->
                            <!-- vertically modal -->
                            
                            
                        </div>
                    </div>
                

                    <div class="text-center mt-3">
                    
                   
                    <a href="{{ route('pasien.hasilpemeriksaan.index') }}" class="btn btn-light">Back</a>
                    </div>
                </form><!-- End Multi Columns Form -->
                <div id="error-messages"></div>
            </div>
          </div>

          </div>
        </div><!-- End Left side columns -->

       
      </div>
    </section>

</main><!-- End #main -->
@endsection

@section('customJS')
<!-- <script src="{{ asset('assets/js/cleave.js') }}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

<script>
// <!-- validasi form -->
document.getElementById('formHasilPemeriksaan').addEventListener('submit', function(event) {
   
    event.preventDefault(); // Mencegah form submit secara default
    let isValid = true;
    let errorMessages = [];

   

    // Mendapatkan nilai input field table  ================================
    const rows = document.querySelectorAll('#tabel_hasil_pemeriksaan tr');

    let jenisPemeriksaanSet = new Set();
    let modalitasSet = new Set();

    rows.forEach((row, index) => {
      
        const laporan = row.querySelector('textarea[name="laporan[]"]');

        if (laporan) validateField(laporan, 'Laporan', index);
    });

    function validateField(field, fieldName, index) {
        if (!field.value.trim()) {
            isValid = false;
            errorMessages.push(`${fieldName} di baris ${index} harus diisi.`);
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
        }
    }

    function validateUniqueField(field, fieldSet, fieldName, index) {
        if (!field.value.trim()) {
            isValid = false;
            errorMessages.push(`${fieldName} di baris ${index} harus diisi.`);
            field.classList.add('is-invalid');
        } else if (fieldSet.has(field.value.trim())) {
            isValid = false;
            errorMessages.push(`${fieldName} di baris ${index} tidak boleh sama dengan baris lainnya.`);
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
            fieldSet.add(field.value.trim());
        }
    }

    function validateTime(field, fieldName, index) {
        if (!field.value.trim()) {
            isValid = false;
            errorMessages.push(`${fieldName} di baris ${index} harus diisi.`);
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
        }
    }

    function validateNumber(field, fieldName, index) {
        if (!field.value.trim() || isNaN(field.value)) {
            isValid = false;
            errorMessages.push(`${fieldName} di baris ${index} harus diisi dengan angka.`);
            field.classList.add('is-invalid');
        } else {
            field.classList.remove('is-invalid');
        }
    }

    function validateTimeOrder(startTimeField, endTimeField, index) {
        if (startTimeField.value.trim() && endTimeField.value.trim()) {
            if (new Date(`1970-01-01T${endTimeField.value}`) <= new Date(`1970-01-01T${startTimeField.value}`)) {
                isValid = false;
                errorMessages.push(`Jam Selesai di baris ${index} harus lebih besar dari Jam Mulai.`);
                endTimeField.classList.add('is-invalid');
            } else {
                endTimeField.classList.remove('is-invalid');
            }
        }
    }

    const errorContainer = document.getElementById('error-messages');
    errorContainer.innerHTML = '';
    if (!isValid) {
        errorMessages.forEach(message => {
            const errorDiv = document.createElement('div');
            errorDiv.classList.add('alert', 'alert-danger');
            errorDiv.textContent = message;
            errorContainer.appendChild(errorDiv);
        });
    } else {
        // Jika valid, submit form
        this.submit();
    }
});
</script>

@endsection