@extends('layouts.app')
@section('title','Master Modalitas')
@section('setActiveModalitas', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Modalitas</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">Modalitas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Daftar Modalitas</h5>

                    @include('partial.successalert')
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            <a href="{{ route('modalitas.create') }}" class="btn btn-md btn-success mb-3 float-end">Add New Modalitas</a>
                            </div>
                        </div>
                    </div>

                    <table id="tabel-modalitas" class="table table-striped table-bordered mt-1 text-center" width="100%">
                        <thead>
                            <tr>
                                <td>Nama Modalitas</td>
                                <td>Jenis Modalitas</td>
                                <td>Merek Modalitas</td>
                                <td>Tipe Modalitas</td>
                                <td>No Seri Modalitas</td>
                                <td>Alamat IP</td>
                                <td>Ruangan</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datamodal as $dm)
                                <tr>
                                    <td>{{ $dm->namaModalitas }}</td>
                                    <td>{{ $dm->jenisModalitas }}</td>
                                    <td>{{ $dm->merekModalitas }}</td>
                                    <td>{{ $dm->tipeModalitas }}</td>
                                    <td>{{ $dm->nomorSeriModalitas }}</td>
                                    <td>{{ $dm->alamatIP }}</td>
                                    <td>{{ $dm->kodeRuang }}</td>
                                    <td>
                                        <a href="{{ route('modalitas.edit', $dm->id)  }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('modalitas.destroy', $dm->id)  }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datamodal->links() }}
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
        $('#tabel-modalitas').DataTable();
    });
</script>
@endsection