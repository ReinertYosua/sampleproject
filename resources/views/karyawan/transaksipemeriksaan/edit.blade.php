@extends('layouts.app')
@section('title','Edit Transaksi Pemeriksaan')

@if(Auth::user()->role=='karyawan')
    @section('setActiveKaryawanTransaksiPemeriksaan', 'active')
    @section('setShowKaryawanTransaksiPeriksa', 'show')
    @section('setCollapsedKaryawanTransaksiPeriksa', '')
@elseif(Auth::user()->role=='dokter')
    @section('setActiveDokterTransaksiPemeriksaan', 'active')
    @section('setShowDokterTransaksiPeriksa', 'show')
    @section('setCollapsedDokterTransaksiPeriksa', '')
@elseif(Auth::user()->role=='pasien')
    @section('setActivePasienTransaksiPemeriksaan', 'active')
    @section('setShowPasienTransaksiPeriksa', 'show')
    @section('setCollapsedPasienTransaksiPeriksa', '')
@endif


@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Edit Data Transaksi Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Daftar Transaksi Pemeriksaan</li>
          <li class="breadcrumb-item active">Edit Transaksi Pemeriksaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title">Edit Transaksi Pemeriksaan</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title float-end">No:&nbsp;&nbsp;{{ $datatransaksiperiksa[0]->no_transaksi_pemeriksaan }}</h5>
                </div>
              </div>
              
              
              
              @include('partial.dangeralert')
                <form id="formPemeriksaan" action="@if(Auth::user()->role !='karyawan') {{ route('dokter.transaksipemeriksaan.update', $datatransaksiperiksa[0]->id) }} @else {{ route('karyawan.transaksipemeriksaan.update', $datatransaksiperiksa[0]->id) }} @endif" method="post" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="col-md-6">
                        <input type="hidden" name="no_transaksi_pemeriksaan" value="{{ $datatransaksiperiksa[0]->no_transaksi_pemeriksaan }}">
                        <input type="hidden" name="id_transaksi_pemeriksaan" value="{{ $datatransaksiperiksa[0]->id }}">
                        <label for="" class="form-label">Nama Pasien</label>
                        <input type="text" id="namaPasien" name="namaPasien" value="{{ $datatransaksiperiksa[0]->nama_pasien }}" class="form-control @error('namaPasien') is-invalid @enderror" autocomplete="off" disabled>
                   
                    </div>
                
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama Dokter Radiografi</label>
                        <input type="text" id="namaDokterRadiografi" name="namaDokterRadiografi" value="Dr. {{ old('namaDokterRadiografi', $datatransaksiperiksa[0]->nama_dokter) }}" class="form-control @error('namaDokterRadiografi') is-invalid @enderror" autocomplete="off" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama Dokter Rekomendasi</label>
                        <input type="text" id="namaDokterPengirim" name="namaDokterPengirim" value="{{ old('namaDokterPengirim', $datatransaksiperiksa[0]->namaDokterPengirim) }}" class="form-control @error('namaDokterRadiografi') is-invalid @enderror" autocomplete="off" disabled>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">File Lampiran</label></br>
                        @if(Auth::user()->role=="dokter")
                        <a href="{{ route('dokter.file.download', basename($datatransaksiperiksa[0]->fileLampiran)) }}" class="btn btn-primary"><i class="bi bi-cloud-download"></i> {{ basename($datatransaksiperiksa[0]->fileLampiran) }}</a>
                        @elseif(Auth::user()->role=="karyawan")
                        <a href="{{ route('karyawan.file.download', basename($datatransaksiperiksa[0]->fileLampiran)) }}" class="btn btn-primary"><i class="bi bi-cloud-download"></i> {{ basename($datatransaksiperiksa[0]->fileLampiran) }}</a>
                        @endif
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Tanggal Pemeriksaan</label>
                        <input type="date" id="tanggalPeriksa" name="tanggalPeriksa" value="{{ old('tanggalPeriksa', $datatransaksiperiksa[0]->tanggalPemeriksaan) }}" class="form-control @error('tanggalPemeriksaan') is-invalid @enderror" autocomplete="off" readonly>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Diagnosis</label>
                        <textarea name="diagnosis" id="diagnosis" class="form-control @error('diagnosis') is-invalid @enderror" >{{ old('diagnosis', ($datatransaksiperiksa[0]->diagnosis!='') ? $datatransaksiperiksa[0]->diagnosis : '-' ) }}</textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="" class="form-label">Keterangan Dokter</label>
                        <textarea name="keteranganDokter" id="keteranganDokter" class="form-control @error('keteranganDokter') is-invalid @enderror" >{{ old('keteranganDokter', ($datatransaksiperiksa[0]->keteranganDokter!='') ? $datatransaksiperiksa[0]->keteranganDokter : '-' ) }}</textarea>
                    </div>
                    
                   
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Detail Transaksi Pemeriksaan</h3>

                            <table id="tabel_daftar_pemeriksaan" class="table table-bordered mt-1 text-center" width="100%">
                                <thead>
                                    <tr>
                                        <td>UID</td>
                                        <td>Jenis Pemeriksaan</td>
                                        <td>Jam Mulai</td>
                                        <td>Jam Selesai</td>
                                        <td>Ruangan</td>
                                        <td>Harga</td>
                                        <td>Diskon</td>
                                        <td>Harga Total</td>
                                        <td>Status</td>
                                        <td>Keterangan</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 0 @endphp
                                    @foreach($datadetailtransaksipemeriksaan as $gdp)
                                        <tr id="daftar{{ $index }}" data-row="{{ $index }}">
                                            <td>
                                                <input @if(Auth::user()->role !='karyawan') disabled @endif type="text" value="{{ $gdp->uuid }}" name="uuid[]" id="uuid{{ $index }}" class="form-control @error('uuid.{{ $index }}') is-invalid @enderror" autocomplete="off" >
                                            
                                            </td>
                                            <td>
                                                <!-- <input type="hidden" name="idJenisPemeriksaan[]" id="idJenisPemeriksaan0"> -->
                                                <input @if(Auth::user()->role !='karyawan') disabled @endif type="text" value="{{ $gdp->idJenisPemeriksaan.'-'.$gdp->namaJenisPemeriksaan }}" name="namaJenisPemeriksaan[]" data-value1="{{ $gdp->id }}" id="namaJenisPemeriksaan{{ $index }}" class="form-control jenisPemeriksaan @error('namaJenisPemeriksaan.0') is-invalid @enderror" data-bs-toggle="modal" data-bs-target="#verticalycentered" placeholder="Silahkan Pilih Jenis Pemeriksaan" autocomplete="off" readonly>
                                                
                                            </td>
                                            <td>
                                                <input @if(Auth::user()->role !='karyawan') disabled @endif type="time" value="{{ $gdp->jamMulaiAlat }}" name="jamMulaiAlat[]" id="jamMulaiAlat{{ $index }}" class="form-control @error('jamMulaiAlat.{{ $index }}') is-invalid @enderror" autocomplete="off" >
                                            
                                            </td>
                                            <td>
                                                <input @if(Auth::user()->role !='karyawan') disabled @endif type="time" value="{{ $gdp->jamSelesaiAlat }}" name="jamSelesaiAlat[]" id="jamSelesaiAlat{{ $index }}" class="form-control @error('jamSelesaiAlat.{{ $index }}') is-invalid @enderror" autocomplete="off" >
                                            
                                            </td>
                                            <td>
                                                <input @if(Auth::user()->role !='karyawan') disabled @endif type="text" value="{{ $gdp->kodeRuang }}" name="ruangan[]" id="ruangan{{ $index }}" class="form-control @error('ruangan.{{ $index }}') is-invalid @enderror" autocomplete="off" >
                                            
                                            </td>
                                            <td>
                                                <input @if(Auth::user()->role !='karyawan') disabled @endif type="number" value="{{ $gdp->harga }}" name="harga[]" id="harga{{ $index }}" class="form-control @error('harga.{{ $index }}') is-invalid @enderror" autocomplete="off" > 
                                            </td>
                                            <td>
                                                <input @if(Auth::user()->role !='karyawan') disabled @endif type="number" value="{{ $gdp->diskon }}" name="diskon[]" id="diskon{{ $index }}" class=" form-control @error('diskon.{{ $index }}') is-invalid @enderror" autocomplete="off" > 
                                            </td>
                                            <td>
                                                <input @if(Auth::user()->role !='karyawan') disabled @endif type="number" value="{{ $gdp->hargaTotal }}" name="hargaTotal[]" id="hargaTotal{{ $index }}" class=" form-control @error('hargaTotal.{{ $index }}') is-invalid @enderror" autocomplete="off" > 
                                            </td>
                                            <td>
                                                <select @if(Auth::user()->role !='karyawan') disabled @endif id="status{{ $index }}" name="status[]" class="form-control @error('status.{{ $index }}') is-invalid @enderror">
                                                    <option value="" selected>- Pilih -</option>
                                                    <option value="1" {{ $gdp->status =='1' ? 'selected':''  }}>Dalam Antrian</option>
                                                    <option value="2" {{ $gdp->status =='2' ? 'selected':''  }}>Ruang Tunggu</option>
                                                    <option value="3" {{ $gdp->status =='3' ? 'selected':''  }}>Pemeriksaan</option>
                                                    <option value="4" {{ $gdp->status =='4' ? 'selected':''  }}>Menunggu Hasil</option>
                                                    <option value="5" {{ $gdp->status =='5' ? 'selected':''  }}>Hasil Sudah Siap</option>
                                                </select> 
                                            </td>
                                            <td>
                                                <textarea @if(Auth::user()->role !='karyawan') disabled @endif name="keterangan[]" id="keterangan{{ $index }}" class="form-control @error('keterangan.{{ $index }}') is-invalid @enderror">{{ ($gdp->keteranganRadiografer!='') ? $gdp->keteranganRadiografer : '-'  }}</textarea>
                                            </td>
                                            
                                        </tr>
                                        @php $index++ @endphp
                                    @endforeach
                                    
                                        <tr id="daftar{{ $index }}" data-row="{{ $index }}"></tr>
                                        
                                <tfoot>
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <th id="totalPrice">0</th>
                                    </tr>
                                </tfoot>
                            </table>
                            
                            
                        </div>
                    </div>
                

                    <div class="text-center mt-3">
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                   
                    <a href="{{ route('karyawan.transaksipemeriksaan.index') }}" class="btn btn-light">Back</a>
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

<script type="text/javascript">
     // ambil no urut baris table
    var baris = "";
     document.addEventListener("DOMContentLoaded", function() {

        // Event delegation pada tabel
        document.querySelector('#tabel_daftar_pemeriksaan').addEventListener('click', function(event) {
            // Pastikan klik terjadi pada input jenisPemeriksaan
            if (event.target.classList.contains('jenisPemeriksaan')) {
                let rowElement = event.target.closest('tr');
                let rowIndex = rowElement.getAttribute('id');
                baris = rowIndex.slice(-1);
                console.log('Baris yang diklik: ' + baris);
                // Lakukan sesuatu dengan rowIndex, misalnya simpan dalam hidden input atau panggil fungsi lainnya
            }
        });
    });
    
    // memindahkan data data dari modal ke field baris yang dipilih
    $(document).ready(function(){
       
        var table = $('#tabel-jenis-pemeriksaan').DataTable();
        var table1 = $('#tabel-slot-pemeriksaan').DataTable();
        
    });
</script>
<!-- <script type="text/javascript">
    new Cleave('#harga', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand',
        numeralDecimalMark: '.',
        delimiter: ',',
        numeralDecimalScale: 2
    });
</script> -->

<script type="text/javascript">
    // add row table daftar pemeriksaan
    $(document).ready(function(){
        var totalRows = $('#tabel_daftar_pemeriksaan tbody tr').length;
        console.log('Total banyak <tr> pada tbody: ' + totalRows);

        let row_number = totalRows-1;

        $("#add_row").click(function(e){
            e.preventDefault();
           
            let new_row_number = row_number - 1;
           
            console.log(new_row_number+'-'+row_number);


            // Mengganti konten dari baris <tr> saat ini dengan konten dari baris <tr> sebelumnya
            $('#daftar' + row_number).html($('#daftar' + new_row_number).html()).find('td:first-child');

            // Menghapus data dari input teks dalam baris <tr> sebelumnya
            $('#daftar' + row_number + ' input[type="text"]').val('');
            $('#daftar' + row_number + ' input[type="time"]').val('');

            // Menambahkan baris <tr> baru setelah baris <tr> saat ini
            $('#tabel_daftar_pemeriksaan').append('<tr id="daftar' + (row_number + 1) + '"></tr>');

            $('#daftar' + row_number  + ' td').each(function(){
                let input = $(this).find('input');
                if(input.length){
                    let id = input.attr('id');
                    let new_id = id.replace(/\d+$/, '') + row_number;
                    input.attr('id', new_id);
                }
            });
            row_number++;
        });

        $("#delete_row").click(function(e){
        e.preventDefault();
        // alert(row_number);
        if(row_number > 1){
            $("#daftar" + (row_number - 1)).html('');
            row_number--;
        }
        });
    });
</script>

<script>
// <!-- validasi form -->
document.getElementById('formPemeriksaan').addEventListener('submit', function(event) {
   
    event.preventDefault(); // Mencegah form submit secara default
    let isValid = true;
    let errorMessages = [];

    // Mendapatkan nilai input form ================================
    // const namaDokterPengirim = document.getElementById('namaDokterPengirim');
    // const fileLampiran = document.getElementById('fileLampiran');
    // const tanggalDaftar = document.getElementById('tanggalDaftar');
    // const dokterRadiografi = document.getElementById('dokterRadiografi');
    const diagnosis = document.getElementById('diagnosis');
    const keteranganDokter = document.getElementById('keteranganDokter');


    // Validasi namaDokterPengirim
    if (!diagnosis.value.trim()) {
        isValid = false;
        errorMessages.push('Dianogis harus diisi oleh Dokter.');
        diagnosis.classList.add('is-invalid');
    } else {
        diagnosis.classList.remove('is-invalid');
    }

    // Validasi namaDokterRadiografi
    if (!keteranganDokter.value.trim()) {
        isValid = false;
        errorMessages.push('Keterangan harus diisi oleh Dokter.');
        keteranganDokter.classList.add('is-invalid');
    } else {
        keteranganDokter.classList.remove('is-invalid');
    }
    // Validasi fileLampiran
    // if (!fileLampiran.value) {
    //     isValid = false;
    //     errorMessages.push('File Lampiran harus diunggah.');
    //     fileLampiran.classList.add('is-invalid');
    // } else {
    //     fileLampiran.classList.remove('is-invalid');
    // }

    // Validasi tanggalDaftar
    // if (!tanggalDaftar.value) {
    //     isValid = false;
    //     errorMessages.push('Tanggal Pendaftaran harus diisi.');
    //     tanggalDaftar.classList.add('is-invalid');
    // } else {
    //     tanggalDaftar.classList.remove('is-invalid');
    // }

    // Mendapatkan nilai input field table  ================================
    const rows = document.querySelectorAll('#tabel_daftar_pemeriksaan tr');

    let jenisPemeriksaanSet = new Set();
    let modalitasSet = new Set();

    rows.forEach((row, index) => {
        const namaJenisPemeriksaan = row.querySelector('input[name="namaJenisPemeriksaan[]"]');
        // const namaModalitas = row.querySelector('input[name="namaModalitas[]"]');
        const ruangan = row.querySelector('input[name="ruangan[]"]');
        const jamMulai = row.querySelector('input[name="jamMulaiAlat[]"]');
        const jamSelesai = row.querySelector('input[name="jamSelesaiAlat[]"]');
        const harga = row.querySelector('input[name="harga[]"]');
        const diskon = row.querySelector('input[name="diskon[]"]');
        const hargaTotal = row.querySelector('input[name="hargaTotal[]"]');
        const keterangan = row.querySelector('textarea[name="keterangan[]"]');
        const status = row.querySelector('select[name="status[]"]');

        
        if (keterangan) validateField(keterangan, 'Keterangan', index);
        if (ruangan) validateField(ruangan, 'Ruangan', index);
        if (status) validateField(status, 'Status', index);
        if (jamMulai) validateTime(jamMulai, 'Jam Mulai', index);
        if (jamSelesai) validateTime(jamSelesai, 'Jam Selesai', index);
        if (harga) validateNumber(harga, 'Harga', index);
        if (diskon) validateNumber(diskon, 'Diskon', index);
        if (hargaTotal) validateNumber(hargaTotal, 'Harga Total', index);
        if (jamMulai && jamSelesai) validateTimeOrder(jamMulai, jamSelesai, index);
        // if (namaModalitas) validateUniqueField(namaModalitas, modalitasSet, 'Modalitas', index);
        // if (namaJenisPemeriksaan) validateUniqueField(namaJenisPemeriksaan, jenisPemeriksaanSet, 'Jenis Pemeriksaan', index);
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