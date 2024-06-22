@extends('layouts.app')
@section('title','Master DICOM')
@section('setActiveDicom', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar DICOM</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">DICOM</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Daftar DICOM</h5>

                    @include('partial.successalert')
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            <a href="{{ route('dicom.create') }}" class="btn btn-md btn-success mb-3 float-end">Add New DICOM</a>
                            </div>
                        </div>
                    </div>

                    <table id="tabel-dicom" class="table table-striped table-bordered mt-1 text-center" width="100%">
                        <thead>
                            <tr>
                                <td>Alamat IP</td>
                                <td>Net Mask</td>
                                <td>Layanan DICOM</td>
                                <td>Peran</td>
                                <td>AET</td>
                                <td>Port</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datadicom as $dc)
                                <tr>
                                    <td>{{ $dc->alamatIP }}</td>
                                    <td>{{ $dc->netMask }}</td>
                                    <td>{{ $dc->layananDICOM }}</td>
                                    <td>{{ $dc->peran }}</td>
                                    <td>{{ $dc->AET }}</td>
                                    <td>{{ $dc->port }}</td>
                                    <td>
                                        <a href="{{ route('dicom.edit', $dc->id)  }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('dicom.destroy', $dc->id)  }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datadicom->links() }}
                </div>

            </div>
        </div>

      </div>
    </section>

</main><!-- End #main -->
@endsection

@section('customJS')
<script type="text/javascript">
    $(document).ready(function(){
        $('#tabel-dicom').DataTable();
    });
</script>
@endsection