@extends('layouts.admin.main')
@section('admin')
    @php
    $i = 1;
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Belum Verifikasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/verif/belum">Payment</a></div>
                    <div class="breadcrumb-item">Belum Verifikasi</div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <button class="btn btn-primary"><i class="fas fa-plane"></i>
                                    Belum Verifikasi</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data">
                                        <thead>
                                            <th>No</th>
                                            <th>Detail Akun</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Tanggal Expired</th>
                                            <th>Bukti Pembayaran</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>
                                                        <p class="m-0">Nama : {{ $d->name }}</p>
                                                        <p class="m-0">Email : {{ $d->email }}</p>
                                                        <p class="m-0">Alamat : {{ $d->address }}</p>
                                                        <p class="m-0">No. HP : {{ $d->noHp }}</p>
                                                        <p class="m-0">Profesi : {{ $d->profesi }}</p>
                                                    </td>
                                                    <td>{{ $d->created_at }}</td>
                                                    <td>{{ $d->created_at }}</td>
                                                    <td>
                                                        <a href="{{ asset('uploads/' . $d->payment->foto) }}"
                                                            target="_blank" rel="noopener noreferrer">
                                                            <img src="{{ asset('uploads/' . $d->payment->foto) }}" alt=""
                                                                style="width: 100px">
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form action="/admin/verif/belum/{{ $d->id }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="btn btn-primary">Verifikasi</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <script>
        @if (Session::has('success'))
            var successToast = '{{ session('success') }}'
        @endif
    </script>
@endsection
