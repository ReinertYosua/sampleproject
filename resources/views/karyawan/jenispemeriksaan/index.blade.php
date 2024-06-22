@extends('layouts.app')
@section('title','Master Jenis Pemeriksaan')
@section('setActiveJenisPemeriksaan', 'active')
@section('setShowMaster', 'show')
@section('setCollapsedMaster', '')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Daftar Jenis Pemeriksaan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Master</li>
          <li class="breadcrumb-item active">Jenis Pemeriksaan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h5 class="card-title">Daftar Jenis Pemeriksaan</h5>

                    @include('partial.successalert')
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                            <a href="{{ route('jenispemeriksaan.create') }}" class="btn btn-md btn-success mb-3 float-end">Add New Jenis Pemeriksaan</a>
                            </div>
                        </div>
                    </div>

                    <table id="tabel-modalitas" class="table table-striped table-bordered mt-1 text-center" width="100%">
                        <thead>
                            <tr>
                                <td>Nama Modalitas</td>
                                <td>Nama Jenis Pemeriksaan</td>
                                <td>Kelompok Jenis Pemeriksaan</td>
                                <td>Pemakaian Kontras</td>
                                <td>Harga</td>
                                <td>Lama Pemeriksaan</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datajenispemeriksaan as $jp)
                                <tr>
                                    <td>{{ $jp->namaModalitas }}</td>
                                    <td>{{ $jp->namaJenisPemeriksaan }}</td>
                                    <td>{{ $jp->kelompokJenisPemeriksaan }}</td>
                                    <td>{{ $jp->pemakaianKontras }}</td>
                                    <td>{{ $jp->harga }}</td>
                                    <td>{{ $jp->lamaPemeriksaan }}</td>
                                    <td>
                                        <a href="{{ route('jenispemeriksaan.edit', $jp->id)  }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('jenispemeriksaan.destroy', $jp->id)  }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datajenispemeriksaan->links() }}
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