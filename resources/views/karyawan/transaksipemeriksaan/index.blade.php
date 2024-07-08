@extends('layouts.app')
@section('title','Transaksi Pemeriksaan')
@if(Auth::user()->role=='pasien')
    @section('setActivePasienTransaksiPemeriksaan', 'active')
    @section('setShowPasienTransaksiPeriksa', 'show')
    @section('setCollapsedPasienTransaksiPeriksa', '')
@elseif(Auth::user()->role=='karyawan')
    @section('setActiveKaryawanTransaksiPemeriksaan', 'active')
    @section('setShowKaryawanTransaksiPeriksa', 'show')
    @section('setCollapsedKaryawanTransaksiPeriksa', '')
@elseif(Auth::user()->role=='dokter')
    @section('setActiveDokterTransaksiPemeriksaan', 'active')
    @section('setShowDokterTransaksiPeriksa', 'show')
    @section('setCollapsedDokterTransaksiPeriksa', '')
@endif

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Transaksi Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Transaksi</li>
          <li class="breadcrumb-item active">Transaksi Pemeriksaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">List Transaksi Pemeriksaan</h5>

                    @include('partial.successalert')
                    @include('partial.dangeralert')
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            
                            </div>
                        </div>
                    </div>
                    
                    <table id="tabel-transaksi-pemeriksaan" class="table table-bordered mt-1 text-center" width="100%">
                        <thead>
                            <tr>
                                <td>No Transaksi Pendaftaran</td>
                                <td>No Registrasi Pendaftaran</td>
                                <td>Nama Pasien</td>
                                <td>Nama Dokter Radiologi</td>
                                <td>Tanggal Pemeriksaan</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datatransaksiperiksa as $dtp)
                                @php
                               
                                $totalStatus = [
                                                    $dtp->totalStatus1,
                                                    $dtp->totalStatus2,
                                                    $dtp->totalStatus3,
                                                    $dtp->totalStatus4,
                                                    $dtp->totalStatus5,
                                                    $dtp->totalStatus6
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
                                    <td>{{ $dtp->no_transaksi_pemeriksaan }}</td>
                                    <td>{{ $dtp->no_pendaftaran }}</td>
                                    <td>{{ $dtp->nama_pasien }}</td>
                                    <td>Dr. {{ $dtp->nama_dokter }}</td>
                                    <td>{{ $dtp->tanggalPemeriksaan }}</td>
                                    <td>
                                        @if(Auth::user()->role == 'karyawan')
                                            @if($indeksTerkecil==0)
                                                <span class="badge bg-warning"><i class="bi bi-people"></i> In Queue</span>
                                                <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                    <a href="{{ route('karyawan.transaksipemeriksaan.edit', $dtp->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-pencil"></i></a>
                                                    <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                            @elseif($indeksTerkecil==1)
                                                <span class="badge bg-primary"><i class="bi bi-people-check"></i> Waiting Room</span>
                                                <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                    <a href="{{ route('karyawan.transaksipemeriksaan.edit', $dtp->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-pencil"></i></a>
                                                    <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                            @elseif($indeksTerkecil==2)
                                                <span class="badge bg-danger"><i class="ri-stethoscope-line"></i> Examination</span>
                                                <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                    <a href="{{ route('karyawan.transaksipemeriksaan.edit', $dtp->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-pencil"></i></a>
                                                    <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                            @elseif($indeksTerkecil==3)
                                                    <span class="badge bg-secondary"><i class="bi bi-hourglass-split"></i> Waiting Report</span>    
                                                    <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                        <a href="{{ route('karyawan.transaksipemeriksaan.edit', $dtp->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-pencil"></i></a>
                                                        <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                    </div>
                                            @elseif($indeksTerkecil==4)
                                                    <span class="badge bg-info"><i class="bi bi-envelope"></i> Report Ready</span>
                                            @elseif($indeksTerkecil==5)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Finished</span>
                                            @endif
                                           
                                        @endif
                                       
                                        @if(Auth::user()->role == 'dokter')
                                            @if($indeksTerkecil==0)
                                                <span class="badge bg-warning"><i class="bi bi-people"></i> In Queue</span>
                                            @elseif($indeksTerkecil==1)
                                                <span class="badge bg-primary"><i class="bi bi-people-check"></i> Waiting Room</span>
                                                <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                    <a href="{{ route('dokter.transaksipemeriksaan.edit', $dtp->id)  }}" class="btn btn-sm btn-primary me-2"><i class="bx bx-pencil"></i></a>
                                                    <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                            @elseif($indeksTerkecil==2)
                                                <span class="badge bg-danger"><i class="ri-stethoscope-line"></i> Examination</span>
                                            @elseif($indeksTerkecil==3)
                                                    <span class="badge bg-secondary"><i class="bi bi-hourglass-split"></i> Waiting Report</span>    
                                            @elseif($indeksTerkecil==4)
                                                    <span class="badge bg-info"><i class="bi bi-envelope"></i> Report Ready</span>
                                            @elseif($indeksTerkecil==5)
                                                    <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Finished</span>
                                            @endif
                                        @endif
                                        @if(Auth::user()->role == 'pasien')
                                            @if($indeksTerkecil==0)
                                                <span class="badge bg-warning"><i class="bi bi-people"></i> In Queue</span>
                                            @elseif($indeksTerkecil==1)
                                                <span class="badge bg-primary"><i class="bi bi-people-check"></i> Waiting Room</span>
                                                <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                    <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                            @elseif($indeksTerkecil==2)
                                                <span class="badge bg-danger"><i class="ri-stethoscope-line"></i> Examination</span>
                                                <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                    <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                            @elseif($indeksTerkecil==3)
                                                <span class="badge bg-secondary"><i class="bi bi-hourglass-split"></i> Waiting Report</span>  
                                                <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                    <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                </div>  
                                            @elseif($indeksTerkecil==4)
                                                <span class="badge bg-info"><i class="bi bi-envelope"></i> Report Ready</span>
                                                <div class="btn-group mt-2" role="group" aria-label="Aksi">
                                                    <a href="#" class="btn btn-sm btn-success me-2 detailBtn" data-bs-toggle="modal" data-bs-target="#detailModal" data-id="{{ $dtp->id }}"><i class="bi bi-eye"></i></a>
                                                </div>
                                            @elseif($indeksTerkecil==5)
                                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i> Finished</span>
                                            @endif
                                        
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   

                    <!-- vertically modal -->
                    <div class="modal fade" id="detailModal" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Detail Transaksi Pemeriksaan</h5>
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
                                        <h5 class="card-title" ><small class="text-body-secondary">Nama Dokter Radiology</small></h5>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="card-title" id="namadokterradiology"></h5>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="tabel_detail_transaksi" class="table table-smtable-striped table-bordered mt-1 text-center" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nama jenis Pemeriksaan</th>
                                                <th>Nama Modalitas</th>
                                                <th>Jam Mulai Alat</th>
                                                <th>Jam Selesai Alat</th>
                                                <th>Ruangan</th>
                                                <th>Status</th>
                                                <th>Harga</th>
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

@if(Auth::user()->role == 'karyawan')
<script type="text/javascript">
    $(document).ready(function(){
        // $('#tabel-daftar-pemeriksaan').DataTable();

        new DataTable('#tabel-transaksi-pemeriksaan', {
            order: [[5, 'asc']]
        });

        $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                 // Empty modal data
                 $('#tabel_detail_transaksi tbody').empty();
                 $('#namapasien').empty();
                 $('#tglperiksa').empty();
                 $('#notransaksi').empty();
                 $('#namadokterradiology').empty();

                $.ajax({
                    url: "{{ route('karyawan.transaksipemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                        $('#tabel_detail_transaksi tbody').html(response.html);
                        $('#namapasien').html(response.namapasien);
                        $('#tglperiksa').html(response.tglperiksa);
                        $('#notransaksi').html(response.notransaksi);
                        $('#namadokterradiology').html(response.namadokterradiology);
                        // $('#totaldaftarno').html(response.totaltidak);

                   
                    }
                    
                });
            });
    });
</script>
@endif

@if(Auth::user()->role == 'dokter')
<script type="text/javascript">
    $(document).ready(function(){
        // $('#tabel-transaksi-pemeriksaan').DataTable();
        new DataTable('#tabel-transaksi-pemeriksaan', {
            order: [[5, 'asc']]
        });

        $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                 // Empty modal data
                 $('#tabel_detail_transaksi tbody').empty();
                 $('#namapasien').empty();
                 $('#tglperiksa').empty();
                 $('#notransaksi').empty();
                 $('#namadokterradiology').empty();

                $.ajax({
                    url: "{{ route('dokter.transaksipemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                        $('#tabel_detail_transaksi tbody').html(response.html);
                        $('#namapasien').html(response.namapasien);
                        $('#tglperiksa').html(response.tglperiksa);
                        $('#notransaksi').html(response.notransaksi);
                        $('#namadokterradiology').html(response.namadokterradiology);

                   
                    }
                    
                });
            });
    });

</script>
@endif
@if(Auth::user()->role == 'pasien')
<script type="text/javascript">
    $(document).ready(function(){
        // $('#tabel-transaksi-pemeriksaan').DataTable();
        new DataTable('#tabel-transaksi-pemeriksaan', {
            order: [[5, 'asc']]
        });

        $('.detailBtn').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                 // Empty modal data
                 $('#tabel_detail_transaksi tbody').empty();
                 $('#namapasien').empty();
                 $('#tglperiksa').empty();
                 $('#notransaksi').empty();
                 $('#namadokterradiology').empty();

                $.ajax({
                    url: "{{ route('pasien.transaksipemeriksaan.show', ':id') }}".replace(':id', id),
                    dataType: 'json',
                    success: function(response) {

                        $('#tabel_detail_transaksi tbody').html(response.html);
                        $('#namapasien').html(response.namapasien);
                        $('#tglperiksa').html(response.tglperiksa);
                        $('#notransaksi').html(response.notransaksi);
                        $('#namadokterradiology').html(response.namadokterradiology);

                   
                    }
                    
                });
            });
    });

</script>
@endif
@endsection