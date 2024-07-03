@extends('layouts.app')
@section('title','Draft Laporan Pemeriksaan')
@if(Auth::user()->role=='dokter')
    @section('setActiveDokterDraftLaporanPemeriksaan', 'active')
    @section('setShowDokterDraftLaporanPemeriksaan', 'show')
    @section('setCollapsedDokterDraftLaporan', '')
@endif
@section('setActiveDraftLaporan', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Draft Laporan Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">Draft Laporan Pemeriksaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Daftar Draft Laporan Pemeriksaan</h5>

                    @include('partial.successalert')
                    <div class="container">
                    @if(Auth::user()->role=='karyawan')
                        <div class="row">
                            <div class="col-lg-12">
                            <a href="{{ route('draftlaporanpemeriksaan.create') }}" class="btn btn-md btn-success mb-3 float-end"><i class="bi bi-plus-lg"></i> Buat Draft Laporan Pemeriksaan</a>
                            </div>
                        </div>
                    @endif
                    </div>

                    <table id="tabel-draftlaporan" class="table table-striped table-bordered mt-1 text-center" width="100%">
                        <thead>
                            <tr>
                                <td>Jenis Pemeriksaan</td>
                                <td>Laporan Normal</td>
                                <td>Tanggal Buat</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datadraftlaporan as $dl)
                                <tr>
                                    <td>{{ $dl->namaJenisPemeriksaan }}</td>
                                    <td>{{ substr($dl->laporanNormal, 0, 50) }}...</td>
                                    <td>{{ $dl->created_at }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Aksi">
                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dl->id }}"><i class="bi bi-eye"></i></a>
                                            @if(Auth::user()->role=='karyawan') 
                                            <a href="{{ route('draftlaporanpemeriksaan.edit', $dl->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-pencil"></i></a>
                                            <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('draftlaporanpemeriksaan.destroy', $dl->id)  }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   <!-- vertically modal -->
                   <div class="modal fade" id="detailModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Draft Laporan <span class="badge text-white" id="totaldaftarno"></span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title text-center" ><small class="text-body-secondary">Nama Jenis Pemeriksaan:</small> <a id="namaJenisPemeriksaan"></a></h5>
                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title" ><small class="text-body-secondary">Laporan Normal</small></h5>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="card-title" id="laporanNormal"></h5>
                                        </div>
                                    
                                    </div>
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
@if(Auth::user()->role=='dokter') 
<script type="text/javascript">
    $(document).ready(function(){
        $('#tabel-draftlaporan').DataTable();
    });

    $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                 // Empty content data
                 $('#namaJenisPemeriksaan').empty();
                 $('#laporanNormal').empty();

                $.ajax({
                    url: "{{ route('dokter.draftlaporanpemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                      
                        $('#namaJenisPemeriksaan').html(response.namaJenisPemeriksaan);
                        $('#laporanNormal').html(response.laporanNormal);

                    }
                    
                });
            });
</script>
@endif
@if(Auth::user()->role=='karyawan') 
<script type="text/javascript">
    $(document).ready(function(){
        $('#tabel-draftlaporan').DataTable();
    });

    $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');

                 // Empty content data
                 $('#namaJenisPemeriksaan').empty();
                 $('#laporanNormal').empty();

                $.ajax({
                    url: "{{ route('draftlaporanpemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                      
                        $('#namaJenisPemeriksaan').html(response.namaJenisPemeriksaan);
                        $('#laporanNormal').html(response.laporanNormal);

                    }
                    
                });
            });
</script>
@endif
@endsection