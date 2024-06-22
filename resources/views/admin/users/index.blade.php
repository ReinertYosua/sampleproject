@extends('layouts.app')
@section('title','Daftar User')
@section('setCollapsedUser', '')
@section('setActiveUser', 'active')
@section('setShowUser', 'show')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h1 class="mt-3 mb-3">User List</h1>

                    @include('partial.successalert')
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <a href="{{ route('user.create') }}" class="btn btn-md btn-success mb-3 float-end">Add New User</a>
                            </div>
                        </div>
                    </div>

                    <!-- <a href="{{ route('user.create') }}" class="btn btn-md btn-success mb-3 float-end">Add New User</a> -->
                    <table id="tabel-user" class="table table-striped table-bordered mt-1 text-center" width="100%">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Role</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user as $u)
                                <tr>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email }}</td>
                                    <td>{{ $u->role }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $u->id)  }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form onsubmit="return confirm('Apakah Anda Yakin?')" action="{{ route('user.destroy', $u->id)  }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                            <tr class="text-center text-mute"><td colspan="4">Data User tidak ada</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $user->links() }}
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
        $('#tabel-user').DataTable();
    });
</script>
@endsection