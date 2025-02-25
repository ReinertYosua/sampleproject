@extends('layouts.app')
@section('title','Welcome to Dashboard Dokter')
@section('setCollapsedDash', '')
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
      @include('partial.successalert')
        
      <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title text-capitalize">{{ Auth::user()->role }} <span>| {{ Auth::user()->status }}</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>Hello, {{ Auth::user()->name }}  </h6>
                      <h5>Welcome to the Radiology Queue dashboard page! We're glad you're here.</h5>
                      <!-- <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span> -->

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

          
          </div>
        </div><!-- End Left side columns -->
      
      </div>
    </section>

</main><!-- End #main -->
@endsection
