@extends('layouts.admin.main')
@section('admin')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>IELP TRAINING FOR POLTEKBANG SURABAYA</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
                    <!-- <div class="breadcrumb-item">Profile</div> -->
                </div>
            </div>
            <!-- Main Content -->
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <button class="btn btn-icon btn-primary"><i class="fas fa-plane"></i> Dashboard</button>
                            </div>
                            <div class="card-body">
                                <div class="d-flex flex-column justify-content-center">
                                    <img src="{{ asset('img/logo.png') }}" class="w-50 mx-auto">
                                    <h5 class="text-center">IELP
                                        TRAINING FOR POLTEKBANG SURABAYA</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
@endsection
