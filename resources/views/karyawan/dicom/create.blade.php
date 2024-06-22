@extends('layouts.app')
@section('title','Tambah Data DICOM')
@section('setActiveDicom', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Tambah Data DICOM</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">DICOM</li>
          <li class="breadcrumb-item active">Tambah DICOM</li>
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
              <h5 class="card-title">Tambah DICOM Baru</h5>
              
              @include('partial.dangeralert')
              <form action="{{ route('dicom.store') }}" method="post" class="row g-3" >
                  @csrf
                <div class="col-md-6">
                  <label for="" class="form-label">Alamat IP</label>
                  <input type="text" id="alamatIP" placeholder="Silahkan Pilih Data" name="alamatIP" value="{{ old('alamatIP') }}" class="ipv4 form-control @error('alamatIP') is-invalid @enderror" data-bs-toggle="modal" data-bs-target="#verticalycentered" autocomplete="off">
                  <!-- Error Message untuk tempat lahir -->
                  @error('alamatIP')
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
                                                <td><a href="#" class="select-data" data-value="{{ $dm->alamatIP }}">{{ $dm->namaModalitas }}</a></td>
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
                  <label for="" class="form-label">Net Mask</label>
                  <input type="text" name="netMask" value="{{ old('netMask') }}" class="ipv4 form-control @error('netMask') is-invalid @enderror">
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
                    <option value="MWL" {{ old('layananDICOM')=='MWL' ? 'selected':''  }}>MWL</option>
                    <option value="MPPS" {{ old('layananDICOM')=='MPPS' ? 'selected':''  }}>MPPS</option>
                    <option value="query" {{ old('layananDICOM')=='query' ? 'selected':''  }}>Query</option>
                    <option value="send" {{ old('layananDICOM')=='send' ? 'selected':''  }}>Send</option>
                    <option value="print" {{ old('layananDICOM')=='print' ? 'selected':''  }}>Print</option>
                    <option value="store" {{ old('layananDICOM')=='store' ? 'selected':''  }}>Store</option>
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
                    <option value="SCU" {{ old('peran')=='SCU' ? 'selected':''  }}>SCU</option>
                    <option value="SCP" {{ old('peran')=='SCP' ? 'selected':''  }}>SCP</option>
                    <option value="query" {{ old('peran')=='query' ? 'selected':''  }}>Query</option>
                    <option value="send" {{ old('peran')=='send' ? 'selected':''  }}>Send</option>
                    <option value="print" {{ old('peran')=='print' ? 'selected':''  }}>Print</option>
                    <option value="store" {{ old('peran')=='store' ? 'selected':''  }}>Store</option>
                    <option value="retrieve" {{ old('peran')=='retrieve' ? 'selected':''  }}>Retrieve</option>
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
                  <input type="text" name="AET" value="{{ old('AET') }}" class="form-control @error('AET') is-invalid @enderror">
                  <!-- Error Message untuk tempat lahir -->
                  @error('AET')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="" class="form-label">Port</label>
                  <input type="number" name="port" value="{{ old('port') }}" class="form-control @error('port') is-invalid @enderror">
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
<script type="text/javascript">
    $(document).ready(function(){
        var table = $('#tabel-modalitas').DataTable();
        $('.select-data').click(function(event) {
            event.preventDefault(); // Mencegah aksi default dari link
            var dataValue = $(this).data('value'); // Ambil nilai dari data-value
            $('#alamatIP').val(dataValue); // Masukkan nilai ke dalam input text
            $('#verticalycentered').modal('hide'); // Tutup modal
        });
    });
</script>
@endsection