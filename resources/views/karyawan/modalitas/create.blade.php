@extends('layouts.app')
@section('title','Tambah Modalitas Baru')
@section('setActiveModalitas', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Tambah Data Modalitas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Modalitas</li>
          <li class="breadcrumb-item active">Tambah Modalitas</li>
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
              <h5 class="card-title">Tambah Modalitas Baru</h5>
              
              @include('partial.dangeralert')
              <form action="{{ route('modalitas.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                  @csrf
                <div class="col-md-6">
                  <label for="" class="form-label">Nama Modalitas</label>
                  <input type="text" name="namaModalitas" value="{{ old('namaModalitas') }}" class="form-control @error('namaModalitas') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('namaModalitas')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Jenis Modalitas</label>
                  <select id="" name="jenisModalitas" class="form-control @error('jenisModalitas') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="ctscan" {{ old('jenisModalitas')=='ctscan' ? 'selected':''  }}>CT Scan</option>
                    <option value="radiografi" {{ old('jenisModalitas')=='radiografi' ? 'selected':''  }}>Radiografi</option>
                    <option value="fluoroskopi" {{ old('jenisModalitas')=='fluoroskopi' ? 'selected':''  }}>Fluoroskopi</option>
                    <option value="angiografi" {{ old('jenisModalitas')=='angiografi' ? 'selected':''  }}>Angiografi</option>
                    <option value="mamografi" {{ old('jenisModalitas')=='mamografi' ? 'selected':''  }}>Mamografi</option>
                    <option value="usg" {{ old('jenisModalitas')=='usg' ? 'selected':''  }}>USG</option>
                    <option value="mri" {{ old('jenisModalitas')=='mri' ? 'selected':''  }}>MRI</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('jenisModalitas')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Merek Modalitas</label>
                  <input type="text" name="merekModalitas" value="{{ old('merekModalitas') }}" class="form-control @error('merekModalitas') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('merekModalitas')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Tipe Modalitas</label>
                  <input type="text" name="tipeModalitas" value="{{ old('tipeModalitas') }}" class="form-control @error('tipeModalitas') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('tipeModalitas')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Nomor Seri Modalitas</label>
                  <input type="text" name="nomorSeriModalitas" value="{{ old('nomorSeriModalitas') }}" class="form-control @error('nomorSeriModalitas') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('nomorSeriModalitas')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Alamat IP</label>
                  <input type="text" name="alamatIP" id="" class="ipv4 form-control @error('alamatIP') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('alamatIP')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <label for="" class="form-label">Kode Ruangan</label>
                  <input type="text" name="kodeRuang" value="{{ old('kodeRuang') }}" class="form-control @error('kodeRuang') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('kodeRuang')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                

                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <a href="{{ route('modalitas.list') }}" class="btn btn-light">Back</a>
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