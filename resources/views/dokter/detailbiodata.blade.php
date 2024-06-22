@extends('layouts.app')
@section('title','Welcome to Detail Biodata Dokter')
@section('setCollapsed', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Detail Profil Dokter</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Detail Profil</li>
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
              <h5 class="card-title">Halo, {{ Auth::user()->name }}</h5>
              <h6 class="mb-4">Silahkan isi detail profil berikut sebelum melanjutkan proses pemeriksaan !</h6>
              
              @include('partial.dangeralert')
              <form action="{{ route('detailbiodokter.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                  @csrf
                <div class="col-md-6">
                  <label for="" class="form-label">No KTP</label>
                  <input type="number" name="idKTP" value="{{ old('idKTP') }}" class="form-control @error('idKTP') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('idKTP')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Jenis Kelamin</label>
                  <select id="" name="jenisKelamin" class="form-control @error('jenisKelamin') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="pria" {{ old('jenisKelamin')=='pria' ? 'selected':''  }}>Pria</option>
                    <option value="wanita" {{ old('jenisKelamin')=='wanita' ? 'selected':''  }}>Wanita</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('jenisKelamin')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Spesialis</label>
                  <input type="text" name="spesialis" value="{{ old('spesialis') }}" class="form-control @error('spesialis') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('spesialis')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Tanggal Lahir</label>
                  <input type="date" name="tanggalLahir" value="{{ old('tanggalLahir') }}" class="form-control @error('tanggalLahir') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('tanggalLahir')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Alamat</label>
                  <textarea name="alamat" id="" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                  <!-- Error Message untuk tempat lahir -->
                  @error('alamat')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Kota</label>
                  <input type="text" name="kota" value="{{ old('kota') }}" class="form-control @error('kota') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('kota')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">No HP</label>
                  <input type="number" name="noHp" value="{{ old('noHp') }}" class="form-control @error('noHp') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('noHp')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">No Telepon Rumah</label>
                  <input type="number" name="noTlpRumah" value="{{ old('noTlpRumah') }}" class="form-control @error('noTlpRumah') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('noTlpRumah')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-12">
                  <label for="" class="form-label">Foto Profil</label>
                  <input type="file" name="fotoprofil" value="{{ old('fotoprofil') }}" class="form-control @error('fotoprofil') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('fotoprofil')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>

                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
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
