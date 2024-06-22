@extends('layouts.app')
@section('title','Pendaftaran Pemeriksaan')
@section('setActiveKaryawanPendaftaranPemeriksaan', 'active')
@section('setShowKaryawanDaftarPeriksa', 'show')
@section('setCollapsedKaryawanDaftarPeriksa', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Pendaftaran Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Transaksi</li>
          <li class="breadcrumb-item active">Pendaftaran Pemeriksaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">List Daftar Pemeriksaan</h5>

                    @include('partial.successalert')
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            <a href="{{ route('pendaftaranpemeriksaan.create') }}" class="btn btn-md btn-success mb-3 float-end">Add New Daftar Pemeriksaan</a>
                            </div>
                        </div>
                    </div>

                    <table id="tabel-daftar-pemeriksaan" class="table table-striped table-bordered mt-1 text-center" width="100%">
                        <thead>
                            <tr>
                                <td>No Registrasi Pendaftaran</td>
                                <td>Nama Pasien</td>
                                <td>Nama Dokter Rekomendasi</td>
                                <td>Tanggal Daftar</td>
                                <td>File Lampiran Dokter</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datadaftarperiksa as $dp)
                                <tr>
                                    <td>{{ $dp->no_pendaftaran }}</td>
                                    <td>{{ $dp->name }}</td>
                                    <td>{{ $dp->namaDokterPengirim }}</td>
                                    <td>{{ $dp->tanggalDaftar }}</td>
                                    <td><a href="{{ route('karyawan.file.download', basename($dp->fileLampiran)) }}" class="btn btn-sm btn-primary">Download {{ basename($dp->fileLampiran) }}</a></td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Aksi">
                                            <a href="{{ route('karyawan.pendaftaranpemeriksaan.edit', $dp->id)  }}" class="btn btn-sm btn-primary me-2">Edit</a>
                                            <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dp->id }}">Detail</a>
                                            
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   

                    <!-- vertically modal -->
                    <div class="modal fade" id="detailModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Pendaftaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table id="tabel_detail_pendaftaran" class="table table-smtable-striped table-bordered mt-1 text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nama jenis Pemeriksaan</th>
                                                <th>Nama Modalitas</th>
                                                <th>Kelompok Jenis Pemeriksaan</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
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
        </div>

      </div>
    </section>

</main><!-- End #main -->
@endsection

@section('customJS')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tabel-daftar-pemeriksaan').DataTable();

        $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                 // Empty modal data
                 $('#tabel_detail_pendaftaran tbody').empty();
                $.ajax({
                    url: "{{ route('karyawan.pendaftaranpemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                        $('#tabel_detail_pendaftaran tbody').html(response.html);

                   
                    }
                    
                });
            });
    });
</script>
@endsection