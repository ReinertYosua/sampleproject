@extends('layouts.app')
@section('title','Hasil Pemeriksaan')
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
<!-- @section('setActiveHasilPemeriksaan', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '') -->
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Hasil Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">Hasil Pemeriksaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Daftar Hasil Laporan Pemeriksaan</h5>

                    @include('partial.successalert')
                    

                    <table id="tabel-draftlaporan" class="table table-striped table-bordered mt-1 text-center" width="100%">
                        <thead>
                            <tr>
                                <td>No Transaksi Pemeriksaan</td>
                                <td>Tanggal Pemeriksaan</td>
                                <td>Nama Dokter Rekomendasi</td>
                                <td>Nama Dokter Radiology</td>
                                <td>Nama Pasien</td>
                                <td>Status</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hasilPemeriksaan as $hp)
                                @php
                               
                                    $totalStatus = [
                                                        $hp->totalStatus1,
                                                        $hp->totalStatus2,
                                                        $hp->totalStatus3,
                                                        $hp->totalStatus4,
                                                        $hp->totalStatus5,
                                                        $hp->totalStatus6,
                                                    ];
                                
                                    $nilaiTerkecil = min(array_filter($totalStatus, function($x) { return is_numeric($x) && $x != null; })); 
                                    $indeksTerkecil = array_search($nilaiTerkecil, $totalStatus);
                                    
                                        if($indeksTerkecil==0){
                                            $trclass="table-warning";
                                        }else if($indeksTerkecil==1){
                                            $trclass="table-primary";
                                        }else if($indeksTerkecil==2){
                                            $trclass="table-danger";
                                        }else if($indeksTerkecil==3){
                                            $trclass="table-secondary";
                                        }else if($indeksTerkecil==4){
                                            $trclass="table-info";
                                        }else if($indeksTerkecil==5){
                                            $trclass="table-success";
                                        }
                                @endphp
                                <tr class="{{ $trclass }}">
                                    <td>{{ $hp->no_transaksi_pemeriksaan }}</td>
                                    <td>{{ $hp->tanggalPemeriksaan }}</td>
                                    <td>{{ $hp->namaDokterRekomendasi }}</td>
                                    <td>Dr. {{ $hp->namaDokterRadiology }}</td>
                                    <td>{{ $hp->namaPasien }}</td>
                                    <td>
                                        @if($hp->TotalLaporanBelumAda >0)
                                            Belum Ada Hasil Laporan yang dimasukkan
                                        @else
                                            Hasil Laporan sudah dimasukkan
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::user()->role == 'dokter')
                                                @if($indeksTerkecil==0)
                                                    <span class="badge bg-warning"><i class="bi bi-person-check"></i> In Queue</span>
                                                @elseif($indeksTerkecil==1)
                                                    <span class="badge bg-primary"><i class="bi bi-people"></i> Waiting Room</span>
                                                @elseif($indeksTerkecil==2)
                                                    <span class="badge bg-danger"><i class="ri-stethoscope-line"></i> Examination</span>
                                                @elseif($indeksTerkecil==3)
                                                    <span class="badge bg-secondary"><i class="bi bi-hourglass-split"></i> Waiting Report</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                        <a href="{{ route('dokter.hasilpemeriksaan.edit', $hp->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-pencil"></i></a>
                                                    </div> 
                                                @elseif($indeksTerkecil==4)
                                                    <span class="badge bg-info"><i class="bi bi-envelope"></i> Report Ready</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                    </div> 
                                                @elseif($indeksTerkecil==5)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Finished</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                        
                                                    </div>
                                                @endif
                                            
                                        @endif
                                        @if(Auth::user()->role == 'karyawan')
                                                @if($indeksTerkecil==0)
                                                    <span class="badge bg-warning"><i class="bi bi-person-check"></i> In Queue</span>
                                                @elseif($indeksTerkecil==1)
                                                    <span class="badge bg-primary"><i class="bi bi-people"></i> Waiting Room</span>
                                                @elseif($indeksTerkecil==2)
                                                    <span class="badge bg-danger"><i class="ri-stethoscope-line"></i> Examination</span>
                                                @elseif($indeksTerkecil==3)
                                                    <span class="badge bg-secondary"><i class="bi bi-hourglass-split"></i> Waiting Report</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                    </div> 
                                                @elseif($indeksTerkecil==4)
                                                    <span class="badge bg-info"><i class="bi bi-envelope"></i> Report Ready</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                    </div> 
                                                @elseif($indeksTerkecil==5)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Finished</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                        
                                                    </div>
                                                @endif
                                            
                                        @endif
                                        @if(Auth::user()->role == 'pasien')
                                                @if($indeksTerkecil==0)
                                                    <span class="badge bg-warning"><i class="bi bi-person-check"></i> In Queue</span>
                                                @elseif($indeksTerkecil==1)
                                                    <span class="badge bg-primary"><i class="bi bi-people"></i> Waiting Room</span>
                                                @elseif($indeksTerkecil==2)
                                                    <span class="badge bg-danger"><i class="ri-stethoscope-line"></i> Examination</span>
                                                @elseif($indeksTerkecil==3)
                                                    <span class="badge bg-secondary"><i class="bi bi-hourglass-split"></i> Waiting Report</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                    </div> 
                                                @elseif($indeksTerkecil==4)
                                                    <span class="badge bg-info"><i class="bi bi-envelope"></i> Report Ready</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                        <a href="{{ route('pasien.hasilpemeriksaan.preview', $hp->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bi bi-file-earmark-medical"></i></a>
                                                    </div> 
                                                @elseif($indeksTerkecil==5)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Finished</span>
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $hp->id }}"><i class="bi bi-eye"></i></a>
                                                        <a href="{{ route('pasien.hasilpemeriksaan.preview', $hp->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bi bi-file-earmark-medical"></i></a>
                                                    </div>
                                                @endif
                                            
                                        @endif
                                        
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
                                <h5 class="modal-title">Detail Hasil Pemeriksaan <span class="badge text-white" id="totaldaftarno"></span></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        
                                        <h5 class="card-title" ><small class="text-body-secondary">Nama Pasien</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title " id="namapasien"></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title" ><small class="text-body-secondary">Tanggal Pemeriksaan</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title" id="tglperiksa"></h5>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-3">
                                        <h5 class="card-title" ><small class="text-body-secondary">Nomor Transaksi Pemeriksaan</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title" id="notransaksi"></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title" ><small class="text-body-secondary">Nama Dokter Rekomendasi</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title" id="namadokterpengirim"></h5>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tabel_detail_hasil" class="table table-smtable-striped table-bordered mt-1 text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nama jenis Pemeriksaan</th>
                                                <th>Kelompok jenis Pemeriksaan</th>
                                                <th>Laporan</th>
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
@if(Auth::user()->role=='dokter') 
<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#tabel-draftlaporan').DataTable();
    // });

    new DataTable('#tabel-draftlaporan', {
            order: [[6, 'asc']]
        });

    $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                
                 // Empty content data
                 $('#tabel_detail_hasil tbody').empty();
                 $('#namapasien').empty();
                 $('#tglperiksa').empty();
                 $('#notransaksi').empty();
                 $('#namadokterpengirim').empty();

                $.ajax({
                    url: "{{ route('dokter.hasilpemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                        
                        $('#tabel_detail_hasil tbody').html(response.html);
                        $('#namapasien').html(response.namapasien);
                        $('#tglperiksa').html(response.tglperiksa);
                        $('#notransaksi').html(response.notransaksi);
                        $('#namadokterpengirim').html(response.namadokterpengirim);

                    }
                    
                });
            });
</script>
@endif
@if(Auth::user()->role=='karyawan') 
<script type="text/javascript">
    // $(document).ready(function(){
    //     $('#tabel-draftlaporan').DataTable();
    // });
    new DataTable('#tabel-draftlaporan', {
            order: [[6, 'asc']]
        });

    $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                
                 // Empty content data
                 $('#tabel_detail_hasil tbody').empty();
                 $('#namapasien').empty();
                 $('#tglperiksa').empty();
                 $('#notransaksi').empty();
                 $('#namadokterpengirim').empty();

                $.ajax({
                    url: "{{ route('karyawan.hasilpemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                        
                        $('#tabel_detail_hasil tbody').html(response.html);
                        $('#namapasien').html(response.namapasien);
                        $('#tglperiksa').html(response.tglperiksa);
                        $('#notransaksi').html(response.notransaksi);
                        $('#namadokterpengirim').html(response.namadokterpengirim);

                    }
                    
                });
            });
</script>
@endif
@if(Auth::user()->role=='pasien') 
<script type="text/javascript">
   
    new DataTable('#tabel-draftlaporan', {
            order: [[6, 'asc']]
        });

    $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                
                 // Empty content data
                 $('#tabel_detail_hasil tbody').empty();
                 $('#namapasien').empty();
                 $('#tglperiksa').empty();
                 $('#notransaksi').empty();
                 $('#namadokterpengirim').empty();

                $.ajax({
                    url: "{{ route('pasien.hasilpemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                        
                        $('#tabel_detail_hasil tbody').html(response.html);
                        $('#namapasien').html(response.namapasien);
                        $('#tglperiksa').html(response.tglperiksa);
                        $('#notransaksi').html(response.notransaksi);
                        $('#namadokterpengirim').html(response.namadokterpengirim);

                    }
                    
                });
            });
</script>
@endif
@endsection