@extends('layouts.app')
@section('title','Edit Data Draft Laporan Pemeriksaan')
@section('setActiveDraftLaporan', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('customCSS')
<style type="text/css">
    .ck-editor__editable {
         min-height: 250px;
    }
    </style>
@endsection
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Edit Data Draft Laporan Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Draft Laporan Pemeriksaan</li>
          <li class="breadcrumb-item active">Edit Draft Laporan</li>
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
              <h5 class="card-title">Edit Draft Laporan</h5>
              
              @include('partial.dangeralert')
              <form action="{{ route('draftlaporanpemeriksaan.update', $draftlaporanpemeriksaan) }}" method="post" class="row g-3" >
                  @csrf
                  @method('PUT')
                  
                <div class="col-md-12">
                  <label for="" class="form-label">Jenis Pemeriksaan</label>
                  <select id="" name="idJenisPemeriksaan" class="form-control @error('idJenisPemeriksaan') is-invalid @enderror">
                    <option value="" selected>- Pilih -</option>
                    @foreach($getDataJenisPemeriksaan as $jp)
                        <option value="{{ $jp->id }}" {{ old('idJenisPemeriksaan') ?? $draftlaporanpemeriksaan->idJenisPemeriksaan == $jp->id ? 'selected':''  }}>{{ $jp->namaJenisPemeriksaan }}</option>
                    @endforeach
                    
                  </select>
                  <!-- Error Message untuk tempat lahir -->
                  @error('idJenisPemeriksaan')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                
                
                <div class="col-md-12">
                  <label for="" class="form-label">Laporan Normal</label>
                  <textarea name="laporanNormal" id="laporanNormal" class="form-control @error('laporanNormal') is-invalid @enderror">{{ $draftlaporanpemeriksaan->laporanNormal }}</textarea>
                  <!-- Error Message untuk tempat lahir -->
                  @error('laporanNormal')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                  @enderror
                </div>
                

                <div class="text-center mt-3">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                  <a href="{{ route('draftlaporanpemeriksaan.index') }}" class="btn btn-light">Back</a>
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
<script src="{{ asset('assets/js/ckeditor.js') }} "></script>
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
<script>
            ClassicEditor.create( document.querySelector( '#laporanNormal' ) )
                .catch( error => {
                    console.error( error );
                } );
        </script>
@endsection