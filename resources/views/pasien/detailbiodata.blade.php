@extends('layouts.app')
@section('title','Welcome to Detail Biodata Pasien')
@section('setCollapsed', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Detail Profil Pasien</h1>
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
              <h6 class="mb-4">Silahkan isi detail profil berikut sebelum melanjutkan proses pendaftaran pemeriksaan !</h6>
              
              @include('partial.dangeralert')
              <form action="{{ route('detailbio.store') }}" method="post" class="row g-3" enctype="multipart/form-data">
                  @csrf
                <div class="col-md-6">
                  <label class="form-label">Tempat Lahir</label>
                  <input type="text" name="tempatLahir" value="{{ old('tempatLahir') }}" class="form-control @error('tempatLahir') is-invalid @enderror" >
                  <!-- Error Message untuk tempat lahir -->
                  @error('tempatLahir')
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
                  <label for="" class="form-label">No Identitas</label>
                  <input type="number" name="noIdentitas" value="{{ old('noIdentitas') }}" class="form-control @error('noIdentitas') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('noIdentitas')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Tipe Identitas</label>
                  <select id="" name="tipeIdentitas" class="form-control @error('tipeIdentitas') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="KTP" {{ old('tipeIdentitas')=='KTP' ? 'selected':''  }}>KTP</option>
                    <option value="Paspor" {{ old('rotipeIdentitasle')=='Paspor' ? 'selected':''  }}>Paspor</option>
                    <option value="SIM" {{ old('tipeIdentitas')=='SIM' ? 'selected':''  }}>SIM</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('tipeIdentitas')
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
                  <label for="" class="form-label">Pekerjaan</label>
                  <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control @error('pekerjaan') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('pekerjaan')
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
                  <label for="" class="form-label">Status Perkawinan</label>
                  <select id="" name="statusPerkawinan" class="form-control @error('statusPerkawinan') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="belumkawin" {{ old('statusPerkawinan')=='belumkawin' ? 'selected':''  }}>Belum Kawin</option>
                    <option value="kawin" {{ old('statusPerkawinan')=='kawin' ? 'selected':''  }}>Kawin</option>
                    <option value="ceraihidup" {{ old('statusPerkawinan')=='ceraihidup' ? 'selected':''  }}>Cerai Hidup</option>
                    <option value="ceraimati" {{ old('statusPerkawinan')=='ceraimati' ? 'selected':''  }}>Cerai Mati</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('statusPerkawinan')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Agama</label>
                  <select id="" name="agama" class="form-control @error('agama') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="kristen" {{ old('agama')=='kristen' ? 'selected':''  }}>Kristen</option>
                    <option value="katholik" {{ old('agama')=='katholik' ? 'selected':''  }}>Katholik</option>
                    <option value="islam" {{ old('agama')=='islam' ? 'selected':''  }}>Islam</option>
                    <option value="hindu" {{ old('agama')=='hindu' ? 'selected':''  }}>Hindu</option>
                    <option value="budha" {{ old('agama')=='budha' ? 'selected':''  }}>Buddha</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('agama')
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
                  <label for="" class="form-label">Nama Kontak Darurat</label>
                  <input type="text" name="namaKontakDarurat" value="{{ old('namaKontakDarurat') }}" class="form-control @error('namaKontakDarurat') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('namaKontakDarurat')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">No Kontak Darurat</label>
                  <input type="number" name="noKontakDarurat" value="{{ old('noKontakDarurat') }}" class="form-control @error('noKontakDarurat') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('noKontakDarurat')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Kewarganegaraan</label>
                  <input type="text" name="kewarganegaraan" value="{{ old('kewarganegaraan') }}" class="form-control @error('kewarganegaraan') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('kewarganegaraan')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Alergi</label>
                  <input type="text" name="alergi" value="{{ old('alergi') }}" class="form-control @error('alergi') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('alergi')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-12">
                  <label for="" class="form-label">Golongan Darah</label>
                  <select id="" name="golDarah" class="form-control @error('golDarah') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="A+" {{ old('golDarah')=='A+' ? 'selected':''  }}>A+</option>
                    <option value="B+" {{ old('golDarah')=='B+' ? 'selected':''  }}>B+</option>
                    <option value="AB+" {{ old('golDarah')=='AB+' ? 'selected':''  }}>AB+</option>
                    <option value="O+" {{ old('golDarah')=='O+' ? 'selected':''  }}>O+</option>
                    <option value="A-" {{ old('golDarah')=='A-' ? 'selected':''  }}>A-</option>
                    <option value="B-" {{ old('golDarah')=='B-' ? 'selected':''  }}>B-</option>
                    <option value="AB-" {{ old('golDarah')=='AB-' ? 'selected':''  }}>AB-</option>
                    <option value="O-" {{ old('golDarah')=='O-' ? 'selected':''  }}>O-</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('golDarah')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Tinggi Badan</label>
                  <input type="number" name="tinggiBadan" value="{{ old('tinggiBadan') }}" class="form-control @error('tinggiBadan') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('tinggiBadan')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Berat Badan</label>
                  <input type="number" name="beratBadan" value="{{ old('beratBadan') }}" class="form-control @error('beratBadan') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('beratBadan')
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
