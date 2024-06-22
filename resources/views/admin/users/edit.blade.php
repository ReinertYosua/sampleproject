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
          <li class="breadcrumb-item ">Dashboard</li>
          <li class="breadcrumb-item active">Edit User</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <div class="col-md-12">
            
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <h1 class="mt-3 mb-3">Edit User</h1>

                    <form action="{{ route('user.update', $user) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ old('name', $user->name ) }}" id="" class="form-control @error('name') is-invalid @enderror" required>

                            <!-- Error Message untuk name -->
                            @error('name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" id="" class="form-control @error('email') is-invalid @enderror" required>

                            <!-- Error Message untuk email -->
                            @error('email')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Password</label>
                            <input type="password" name="password" value="{{ old('password' , $user->password) }}" id="" class="form-control @error('password') is-invalid @enderror" required>

                            <!-- Error Message untuk password -->
                            @error('password')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="name">Role</label>
                            <select name="role" id="" class="form-control @error('role') is-invalid @enderror" required>
                                <option value="">Pilih Role</option>
                                <option value="admin" {{ (old('role') ?? $user->role)  =='admin' ? 'selected':''  }}>Admin</option>
                                <option value="dokter" {{ (old('role') ?? $user->role) == 'dokter' ? 'selected':''  }}>Dokter</option>
                                <option value="karyawan" {{ (old('role') ?? $user->role) == 'karyawan' ? 'selected':''  }}>Karyawan</option>
                                <option value="pasien" {{ (old('role') ?? $user->role) == 'pasien' ? 'selected':''  }}>Pasien</option>
                            </select>

                            <!-- Error Message untuk role -->
                            @error('role')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <button type="submit" class="btn btn-md btn-primary">Save</button>
                        <a href="{{ route('user.index') }}">Back</a>

                    </form>
                    
                </div>

            </div>
        </div>

      </div>
    </section>

</main><!-- End #main -->
@endsection