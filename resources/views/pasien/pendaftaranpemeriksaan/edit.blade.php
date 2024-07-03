@extends('layouts.app')
@section('title','Edit Daftar Pemeriksaan')
@section('setActivePendaftaranPemeriksaan', 'active')
@section('setShowDaftarPeriksa', 'show')
@section('setCollapsedDaftarPeriksa', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Edit Data Jenis Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Daftar Pemeriksaan Pemeriksaan</li>
          <li class="breadcrumb-item active">Edit Daftar Pemeriksaan</li>
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
                    <h5 class="card-title">Edit Daftar Pemeriksaan Baru</h5>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title float-end">No:&nbsp;&nbsp;{{ $getDaftarPemeriksaan[0]->no_pendaftaran }}</h5>
                </div>
              </div>
              
              
              
              @include('partial.dangeralert')
                <form id="formPemeriksaan" action="{{ route('pendaftaranpemeriksaan.update', $getDaftarPemeriksaan[0]->id) }}" method="post" class="row g-3" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="col-md-6">
                        <input type="hidden" name="no_pendaftaran" value="{{ $getDaftarPemeriksaan[0]->no_pendaftaran }}">
                        <input type="hidden" name="id_pendaftaran_pemeriksaan" value="{{ $getDaftarPemeriksaan[0]->id }}">
                        <label for="" class="form-label">Nama Pasien</label>
                        <input type="text" id="namaPasien" name="namaPasien" value="{{ Auth::user()->name }}" class="form-control @error('namaPasien') is-invalid @enderror" autocomplete="off" disabled>
                   
                    </div>
                
                    <div class="col-md-6">
                        <label for="" class="form-label">Nama Dokter Pemberi Rekomendasi</label>
                        <input type="text" id="namaDokterPengirim" name="namaDokterPengirim" value="{{ old('namaDokterPengirim', $getDaftarPemeriksaan[0]->namaDokterPengirim) }}" class="form-control @error('namaDokterPengirim') is-invalid @enderror">
                        
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">File Lampiran</label>
                        <input type="file" id="fileLampiran" name="fileLampiran" value="{{ old('fileLampiran') }}" class="form-control @error('fileLampiran') is-invalid @enderror">
                        
                    </div>
                    <div class="col-md-3">
                        <label for="" class="form-label">Tanggal Pendaftaran</label>
                        <input type="date" id="tanggalDaftar" name="tanggalDaftar" value="{{ old('tanggalDaftar', $getDaftarPemeriksaan[0]->tanggalDaftar) }}" class="form-control @error('tanggalDaftar') is-invalid @enderror">
                    </div>
                    <div class="col-md-3">
                         <label for="" class="form-label">Cek Jadwal Pemeriksaan</label>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cekSlot">Lihat Slot <i class="bi bi-binoculars"></i></button>
                    </div>
                    <!-- vertically modal -->
                    <div class="modal fade" id="cekSlot" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Slot Jadwal Pemeriksaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <p><b>Dalam Reservasi</b>: Status ini menunjukkan bahwa slot waktu tersebut sudah dibooking, tetapi pemeriksaan belum dimulai dan tidak bisa diambil oleh pasien lain.</p>
                                    <p>Pasien dapat reservasi di waktu yang lain </p>
                                    <table id="tabel-slot-pemeriksaan" class="table table-smtable-striped table-bordered mt-1 text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <td>Nama jenis Pemeriksaan</td>
                                                <td>Tanggal Daftar</td>
                                                <td>Jam Mulai</td>
                                                <td>Jam Selesai</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($slot as $s)
                                                <tr>
                                                    <td>{{ $s->namaJenisPemeriksaan }}</td>
                                                    <td>{{ $s->tanggalDaftar }}</td>
                                                    <td>{{ $s->jamMulai }}</td>
                                                    <td>{{ $s->jamSelesai }}</td>
                                                    <td> <span class="btn btn-danger">Dalam Reservasi</span></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                        </div>
                    </div><!-- End Vertically centered Modal-->
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Tambah Jenis Pemeriksaan</h3>

                            <table id="tabel_daftar_pemeriksaan" class="table table-bordered mt-1 text-center" width="100%">
                                <thead>
                                    <tr>
                                        <td>Jenis Pemeriksaan</td>
                                        <td>Modalitas</td>
                                        <td>Jam Mulai</td>
                                        <td>Jam Selesai</td>
                                        <td>Harga</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $index = 0 @endphp
                                    @foreach($getDetailPendaftaran as $gdp)
                                        <tr id="daftar{{ $index }}" data-row="{{ $index }}">
                                            <td>
                                                <!-- <input type="hidden" name="idJenisPemeriksaan[]" id="idJenisPemeriksaan0"> -->
                                                <input type="text" value="{{ $gdp->idJenisPemeriksaan.'-'.$gdp->namaJenisPemeriksaan }}" name="namaJenisPemeriksaan[]" data-value1="{{ $gdp->id }}" id="namaJenisPemeriksaan{{ $index }}" class="form-control jenisPemeriksaan @error('namaJenisPemeriksaan.0') is-invalid @enderror" data-bs-toggle="modal" data-bs-target="#verticalycentered" placeholder="Silahkan Pilih Jenis Pemeriksaan" autocomplete="off" readonly>
                                                
                                            </td>
                                            <td>
                                                <input type="text" value="{{ $gdp->namaModalitas }}" name="namaModalitas[]" id="namaModalitas{{ $index }}" class="form-control @error('namaModalitas.{{ $index }}') is-invalid @enderror" autocomplete="off" readonly>
                                                
                                            </td>
                                            <td>
                                                <input type="time" value="{{ $gdp->jamMulai }}" name="jamMulai[]" id="jamMulai{{ $index }}" class="form-control @error('jamMulai.{{ $index }}') is-invalid @enderror">
                                            
                                            </td>
                                            <td>
                                                <input type="time" value="{{ $gdp->jamSelesai }}" name="jamSelesai[]" id="jamSelesai{{ $index }}" class="form-control @error('jamSelesai.{{ $index }}') is-invalid @enderror">
                                            
                                            </td>
                                            <td>
                                                <input type="text" value="{{ $gdp->harga }}" name="harga[]" id="harga{{ $index }}" class="price form-control @error('harga.{{ $index }}') is-invalid @enderror" readonly>
                                                
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
                            <div class="row">
                                <div class="col-md-12">
                                    <button id="add_row" data-index="{{ $index }}" class="btn btn-primary float-start">+ Add Row</button>
                                    <button id='delete_row' class="float-end btn btn-danger">- Delete Row</button>
                                </div>
                            </div>
                            <!-- vertically modal -->
                            <div class="modal fade" id="verticalycentered" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Data Jenis Pemeriksaan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table id="tabel-jenis-pemeriksaan" class="table table-smtable-striped table-bordered mt-1 text-center" width="100%">
                                                <thead>
                                                    <tr>
                                                        <td>Nama jenis Pemeriksaan</td>
                                                        <td>Nama Modalitas</td>
                                                        <td>Kelompok Jenis Pemeriksaan</td>
                                                        <td>Pemakaian Kontras</td>
                                                        <td>Harga</td>
                                                        <td>Lama Pemeriksaan (Menit)</td>
                                                        <td>Ruangan</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($datajenispemeriksaan as $dp)
                                                        <tr>
                                                            <td><a href="#" class="select-data" data-value1="{{ $dp->id }}" data-value2="{{ $dp->id.'-'.$dp->namaJenisPemeriksaan }}" data-value3="{{ $dp->namaModalitas }}" data-value4="{{ $dp->harga }}">{{ $dp->namaJenisPemeriksaan }}</a></td>
                                                            <td>{{ $dp->namaModalitas }}</td>
                                                            <td>{{ $dp->kelompokJenisPemeriksaan }}</td>
                                                            <td>{{ $dp->pemakaianKontras }}</td>
                                                            <td>{{ $dp->harga }}</td>
                                                            <td>{{ $dp->lamaPemeriksaan }}</td>
                                                            <td>{{ $dp->kodeRuang }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button> -->
                                    </div>
                                </div>
                                </div>
                            </div><!-- End Vertically centered Modal-->
                        </div>
                    </div>
                

                    <div class="text-center mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="{{ route('pendaftaranpemeriksaan.list') }}" class="btn btn-light">Back</a>
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
        $('.select-data').click(function(event) {
            event.preventDefault(); // Mencegah aksi default dari link

            var nextRowIndex =baris;

            var dataValue1 = $(this).data('value1'); // Ambil nilai id jenis pemeriksaan
            $('#idJenisPemeriksaan'+ nextRowIndex).val(dataValue1); // Masukkan nilai ke dalam input text

            var dataValue2 = $(this).data('value2'); // Ambil nilai nama jenis pemeriksaan
            $('#namaJenisPemeriksaan'+ nextRowIndex).val(dataValue2); // Masukkan nilai ke dalam input text

            var dataValue3 = $(this).data('value3'); // Ambil nilai nama modalitas
            $('#namaModalitas'+ nextRowIndex).val(dataValue3); // Masukkan nilai ke dalam input text
            
            var dataValue4 = $(this).data('value4'); // Ambil nilai harga
            $('#harga'+ nextRowIndex).val(dataValue4); // Masukkan nilai ke dalam input text

            
            $('#verticalycentered').modal('hide'); // Tutup modal

            
        });
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
<!-- validasi form -->
document.getElementById('formPemeriksaan').addEventListener('submit', function(event) {
    
    event.preventDefault(); // Mencegah form submit secara default
    let isValid = true;
    let errorMessages = [];

    // Mendapatkan nilai input form ================================
    const namaDokterPengirim = document.getElementById('namaDokterPengirim');
    const fileLampiran = document.getElementById('fileLampiran');
    const tanggalDaftar = document.getElementById('tanggalDaftar');

    // Validasi namaDokterPengirim
    if (!namaDokterPengirim.value.trim()) {
        isValid = false;
        errorMessages.push('Nama Dokter Pemberi Rekomendasi harus diisi.');
        namaDokterPengirim.classList.add('is-invalid');
    } else {
        namaDokterPengirim.classList.remove('is-invalid');
    }

    // Validasi fileLampiran
    if (!fileLampiran.value) {
        isValid = false;
        errorMessages.push('File Lampiran harus diunggah.');
        fileLampiran.classList.add('is-invalid');
    } else {
        fileLampiran.classList.remove('is-invalid');
    }

    // Validasi tanggalDaftar
    if (!tanggalDaftar.value) {
        isValid = false;
        errorMessages.push('Tanggal Pendaftaran harus diisi.');
        tanggalDaftar.classList.add('is-invalid');
    } else {
        tanggalDaftar.classList.remove('is-invalid');
    }

    // Mendapatkan nilai input field table  ================================
    const rows = document.querySelectorAll('#tabel_daftar_pemeriksaan tr');

    let jenisPemeriksaanSet = new Set();
    let modalitasSet = new Set();

    rows.forEach((row, index) => {
        const namaJenisPemeriksaan = row.querySelector('input[name="namaJenisPemeriksaan[]"]');
        // const namaModalitas = row.querySelector('input[name="namaModalitas[]"]');
        const jamMulai = row.querySelector('input[name="jamMulai[]"]');
        const jamSelesai = row.querySelector('input[name="jamSelesai[]"]');
        const harga = row.querySelector('input[name="harga[]"]');

        if (namaJenisPemeriksaan) validateUniqueField(namaJenisPemeriksaan, jenisPemeriksaanSet, 'Jenis Pemeriksaan', index);
        // if (namaModalitas) validateUniqueField(namaModalitas, modalitasSet, 'Modalitas', index);
        if (jamMulai) validateTime(jamMulai, 'Jam Mulai', index);
        if (jamSelesai) validateTime(jamSelesai, 'Jam Selesai', index);
        if (harga) validateNumber(harga, 'Harga', index);
        if (jamMulai && jamSelesai) validateTimeOrder(jamMulai, jamSelesai, index);
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