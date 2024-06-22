@extends('layouts.app')
@section('title','Master Jenis Pemeriksaan')
@section('setActiveJenisPemeriksaan', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Edit Data Jenis Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Jenis Pemeriksaan</li>
          <li class="breadcrumb-item active">Edit Jenis Pemeriksaan</li>
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
              <h5 class="card-title">Edit Jenis Pemeriksaan Baru</h5>
              
              @include('partial.dangeralert')
              <form action="{{ route('jenispemeriksaan.update', $jenispemeriksaan) }}" method="post" class="row g-3" >
                  @csrf
                  @method('PUT')
                <div class="col-md-6">
                  <label for="" class="form-label">Modalitas</label>
                  <input type="hidden" id="idModalitas" name="idModalitas" value="{{ old('idModalitas', $jenispemeriksaan->idModalitas) }}">
                  <input type="text" readonly id="namaModalitas" placeholder="Silahkan Pilih Data" name="namaModalitas" value="{{ old('namaModalitas', $datamodal->namaModalitas) }}" class="form-control @error('namaModalitas') is-invalid @enderror" data-bs-toggle="modal" data-bs-target="#verticalycentered" autocomplete="off">
                  <!-- Error Message untuk tempat lahir -->
                  @error('namaModalitas')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Nama Jenis Pemeriksaan</label>
                  <input type="text" name="namaJenisPemeriksaan" value="{{ old('namaJenisPemeriksaan', $jenispemeriksaan->namaJenisPemeriksaan) }}" class="form-control @error('namaJenisPemeriksaan') is-invalid @enderror">
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
                    <option value="CT" {{ old('kelompokJenisPemeriksaan') ?? $jenispemeriksaan->kelompokJenisPemeriksaan =='CT' ? 'selected':''  }}>CT</option>
                    <option value="MR" {{ old('kelompokJenisPemeriksaan') ?? $jenispemeriksaan->kelompokJenisPemeriksaan =='MR' ? 'selected':''  }}>MR</option>
                    <option value="XP-R" {{ old('kelompokJenisPemeriksaan') ?? $jenispemeriksaan->kelompokJenisPemeriksaan =='XP-R' ? 'selected':''  }}>XP-R</option>
                    <option value="XP-F" {{ old('kelompokJenisPemeriksaan') ?? $jenispemeriksaan->kelompokJenisPemeriksaan =='XP-F' ? 'selected':''  }}>XP-F</option>
                    <option value="XP-WH" {{ old('kelompokJenisPemeriksaan') ?? $jenispemeriksaan->kelompokJenisPemeriksaan =='XP-WH' ? 'selected':''  }}>XP-WH</option>
                    <option value="USG" {{ old('kelompokJenisPemeriksaan') ?? $jenispemeriksaan->kelompokJenisPemeriksaan =='USG' ? 'selected':''  }}>USG</option>
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
                    <option value="ya" {{ old('pemakaianKontras') ?? $jenispemeriksaan->pemakaianKontras =='ya' ? 'selected':''  }}>Ya</option>
                    <option value="tidak" {{ old('pemakaianKontras') ?? $jenispemeriksaan->pemakaianKontras =='tidak' ? 'selected':''  }}>Tidak</option>
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
                  <input type="number" name="harga" value="{{ old('harga', $jenispemeriksaan->harga) }}" class="form-control @error('harga') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('harga')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Lama Pemeriksaan (Menit)</label>
                  <input type="number" name="lamaPemeriksaan" value="{{ old('lamaPemeriksaan', $jenispemeriksaan->lamaPemeriksaan) }}" class="form-control @error('lamaPemeriksaan') is-invalid @enderror">
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
                  <a href="{{ route('jenispemeriksaan.list') }}" class="btn btn-light">Back</a>
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

@endsection