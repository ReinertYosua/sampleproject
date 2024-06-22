@extends('layouts.app')
@section('title','Edit Data DICOM')
@section('setActiveDicom', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Edit Data DICOM</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">DICOM</li>
          <li class="breadcrumb-item active">Edit DICOM</li>
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
              <h5 class="card-title">Edit DICOM {{ $dicom->layananDICOM}}</h5>
              
              @include('partial.dangeralert')
              <form action="{{ route('dicom.update', $dicom) }}" method="post" class="row g-3" >
                  @csrf
                  @method('PUT')
                <div class="col-md-6">
                  <label for="" class="form-label">Alamat IP</label>
                  <input type="text" readonly id="alamatIP" placeholder="Silahkan Pilih Data" name="alamatIP" value="{{ old('alamatIP', $dicom->alamatIP) }}" class="ipv4 form-control @error('alamatIP') is-invalid @enderror" data-bs-toggle="modal" data-bs-target="#verticalycentered" autocomplete="off">
                  <!-- Error Message untuk tempat lahir -->
                  @error('alamatIP')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                
                <div class="col-md-6">
                  <label for="" class="form-label">Net Mask</label>
                  <input type="text" name="netMask" value="{{ old('netMask', $dicom->netMask) }}" class="ipv4 form-control @error('netMask') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('netMask')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Layanan DICOM</label>
                  <select id="" name="layananDICOM" class="form-control @error('layananDICOM') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="MWL" {{ old('layananDICOM') ?? $dicom->layananDICOM =='MWL' ? 'selected':''  }}>MWL</option>
                    <option value="MPPS" {{ old('layananDICOM') ?? $dicom->layananDICOM =='MPPS' ? 'selected':''  }}>MPPS</option>
                    <option value="query" {{ old('layananDICOM') ?? $dicom->layananDICOM =='query' ? 'selected':''  }}>Query</option>
                    <option value="send" {{ old('layananDICOM') ?? $dicom->layananDICOM =='send' ? 'selected':''  }}>Send</option>
                    <option value="print" {{ old('layananDICOM') ?? $dicom->layananDICOM =='print' ? 'selected':''  }}>Print</option>
                    <option value="store" {{ old('layananDICOM') ?? $dicom->layananDICOM =='store' ? 'selected':''  }}>Store</option>
                    <option value="retrieve" {{ old('layananDICOM')=='retrieve' ? 'selected':''  }}>Retrieve</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('layananDICOM')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Peran</label>
                  <select id="" name="peran" class="form-control @error('peran') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    <option value="SCU" {{ old('peran') ?? $dicom->peran =='SCU' ? 'selected':''  }}>SCU</option>
                    <option value="SCP" {{ old('peran') ?? $dicom->peran =='SCP' ? 'selected':''  }}>SCP</option>
                    <option value="query" {{ old('peran') ?? $dicom->peran =='query' ? 'selected':''  }}>Query</option>
                    <option value="send" {{ old('peran') ?? $dicom->peran =='send' ? 'selected':''  }}>Send</option>
                    <option value="print" {{ old('peran') ?? $dicom->peran =='print' ? 'selected':''  }}>Print</option>
                    <option value="store" {{ old('peran') ?? $dicom->peran =='store' ? 'selected':''  }}>Store</option>
                    <option value="retrieve" {{ old('peran') ?? $dicom->peran =='retrieve' ? 'selected':''  }}>Retrieve</option>
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('peran')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">AET</label>
                  <input type="text" name="AET" value="{{ old('AET', $dicom->AET) }}" class="form-control @error('AET') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('AET')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Port</label>
                  <input type="number" name="port" value="{{ old('port', $dicom->port) }}" class="form-control @error('port') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('port')
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

@endsection