@extends('layouts.admin.main')
@section('admin')
    @php
    $i = 1;
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/users">Management Akun</a></div>
                    <div class="breadcrumb-item">Users</div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <button class="btn btn-primary"><i class="fas fa-plane"></i>
                                    Users</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data">
                                        <thead>
                                            <th>No</th>
                                            <th>Detail Akun</th>
                                            <th>Status Akun</th>
                                            <th>Tanggal Daftar</th>
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
                                                    <td>{{ $d->verified }}</td>
                                                    <td>{{ $d->created_at }}</td>
                                                    <td class="d-flex">
                                                        <form action="/admin/users/{{ $d->id }}" method="post"
                                                            onsubmit="return confirm('Apakah Anda yakin menghapus Item ini ?')">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class="btn btn-danger" type="submit">Hapus</button>
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
        @if (Session::has('warning'))
            var warnToast = '{{ session('warning') }}'
        @endif
    </script>
@endsection
