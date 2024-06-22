@extends('layouts.app')
@section('title','Master Jenis Pemeriksaan')
@section('setActiveJenisPemeriksaan', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Tambah Data Jenis Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Jenis Pemeriksaan</li>
          <li class="breadcrumb-item active">Tambah Jenis Pemeriksaan</li>
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
              <h5 class="card-title">Tambah Jenis Pemeriksaan Baru</h5>
              
              @include('partial.dangeralert')
              <form action="{{ route('jenispemeriksaan.store') }}" method="post" class="row g-3" >
                  @csrf
                <div class="col-md-6">
                  <label for="" class="form-label">Modalitas</label>
                  <input type="hidden" id="idModalitas" name="idModalitas" value="{{ old('idModalitas') }}">
                  <input type="text" id="namaModalitas" placeholder="Silahkan Pilih Data" name="namaModalitas" value="{{ old('namaModalitas') }}" class="form-control @error('namaModalitas') is-invalid @enderror" data-bs-toggle="modal" data-bs-target="#verticalycentered" autocomplete="off">
                  <!-- Error Message untuk tempat lahir -->
                  @error('namaModalitas')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <!-- vertically modal -->
                <div class="modal fade" id="verticalycentered" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Data Modalitas</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table id="tabel-modalitas" class="table table-smtable-striped table-bordered mt-1 text-center" width="100%">
                                    <thead>
                                        <tr>
                                            <td>Nama Modalitas</td>
                                            <td>Jenis Modalitas</td>
                                            <td>Merek Modalitas</td>
                                            <td>Tipe Modalitas</td>
                                            <td>No Seri Modalitas</td>
                                            <td>Alamat IP</td>
                                            <td>Ruangan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($datamodal as $dm)
                                            <tr>
                                                <td><a href="#" class="select-data" data-value1="{{ $dm->id }}" data-value2="{{ $dm->namaModalitas }}">{{ $dm->namaModalitas }}</a></td>
                                                <td>{{ $dm->jenisModalitas }}</td>
                                                <td>{{ $dm->merekModalitas }}</td>
                                                <td>{{ $dm->tipeModalitas }}</td>
                                                <td>{{ $dm->nomorSeriModalitas }}</td>
                                                <td>{{ $dm->alamatIP }}</td>
                                                <td>{{ $dm->kodeRuang }}</td>
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
                <div class="col-md-6">
                  <label for="" class="form-label">Nama Jenis Pemeriksaan</label>
                  <input type="text" name="namaJenisPemeriksaan" value="{{ old('namaJenisPemeriksaan') }}" class="form-control @error('namaJenisPemeriksaan') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('namaJenisPemeriksaan')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Kelompok Jenis Pemeriksaan</label>
                  <select id="" name="kelompokJenisPemeriksaan" class="form-control @error('kelompokJenisPemeriksaan') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="CT" {{ old('kelompokJenisPemeriksaan')=='CT' ? 'selected':''  }}>CT</option>
                    <option value="MR" {{ old('kelompokJenisPemeriksaan')=='MR' ? 'selected':''  }}>MR</option>
                    <option value="XP-R" {{ old('kelompokJenisPemeriksaan')=='XP-R' ? 'selected':''  }}>XP-R</option>
                    <option value="XP-F" {{ old('kelompokJenisPemeriksaan')=='XP-F' ? 'selected':''  }}>XP-F</option>
                    <option value="XP-WH" {{ old('kelompokJenisPemeriksaan')=='XP-WH' ? 'selected':''  }}>XP-WH</option>
                    <option value="USG" {{ old('kelompokJenisPemeriksaan')=='USG' ? 'selected':''  }}>USG</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('kelompokJenisPemeriksaan')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Pemakaian Kontras</label>
                  <select id="" name="pemakaianKontras" class="form-control @error('pemakaianKontras') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="ya" {{ old('pemakaianKontras')=='ya' ? 'selected':''  }}>Ya</option>
                    <option value="tidak" {{ old('pemakaianKontras')=='tidak' ? 'selected':''  }}>Tidak</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('pemakaianKontras')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Harga</label>
                  <input type="number" name="harga" value="{{ old('harga') }}" class="form-control @error('harga') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('harga')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Lama Pemeriksaan (Menit)</label>
                  <input type="number" name="lamaPemeriksaan" value="{{ old('lamaPemeriksaan') }}" class="form-control @error('lamaPemeriksaan') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('lamaPemeriksaan')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                
                

                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <a href="{{ route('dicom.list') }}" class="btn btn-light">Back</a>
                </div>
              </form><!-- End Multi Columns Form -->

            </div>
          </div>

          </div>
        </div><!-- End Left side columns -->

       
      </div>
    </section>

</main><!-- End #main -->
@endsection

@section('customJS')
<script src="{{ asset('assets/js/inputip4.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#tabel-modalitas').DataTable();
        $('.select-data').click(function(event) {
            event.preventDefault(); // Mencegah aksi default dari link
            var dataValue2 = $(this).data('value2'); // Ambil nilai dari data-value
            $('#namaModalitas').val(dataValue2); // Masukkan nilai ke dalam input text

            var dataValue1 = $(this).data('value1'); // Ambil nilai dari data-value
            $('#idModalitas').val(dataValue1); // Masukkan nilai ke dalam input text
            $('#verticalycentered').modal('hide'); // Tutup modal
        });
    });
</script>
@endsection