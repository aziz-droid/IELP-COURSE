@extends('layouts.admin.main')
@section('admin')
    @php
    $i = 1;
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Admin</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/admin">Management Akun</a></div>
                    <div class="breadcrumb-item">Admin</div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#exampleModal"><i class="fas fa-plus"></i>
                                    Tambah</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data">
                                        <thead>
                                            <th>No</th>
                                            <th>Detail Akun</th>
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
                                                    <td>{{ $d->created_at }}
                                                    </td>
                                                    <td class="d-flex">
                                                        <button class="btn btn-warning mr-2 editAdmin"
                                                            data-id="{{ $d->id }}" data-toggle="modal"
                                                            data-target="#exampleModal">Edit</button>
                                                        <form action="/admin/admin/{{ $d->id }}" method="post"
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kelola Mentor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" id="form" method="POST" action="">
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="" id="method">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama"
                                name="name" value="{{ old('name') }}" id="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" name="email" value="{{ old('email') }}" id="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                name="password_confirmation">
                            @error('password_confirmation')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No. HP</label>
                            <input type="text" class="form-control @error('noHp') is-invalid @enderror" placeholder="No. HP"
                                name="noHp" value="{{ old('noHp') }}" id="noHp">
                            @error('noHp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        @if (Session::has('error'))
            var errorToast = '{{ session('error') }}'
        @endif
        @if (Session::has('success'))
            var successToast = '{{ session('success') }}'
        @endif
        @if (Session::has('warning'))
            var warnToast = '{{ session('warning') }}'
        @endif
    </script>
    <form class="modal-part" id="modal-form" method="POST" action="">
        @csrf
        <input type="hidden" name="" id="method">
        <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Nama" name="nama">
        </div>
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" placeholder="Username" name="username">
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label>Konfirmasi Password</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="form-group">
            <label>No. HP</label>
            <input type="text" class="form-control" placeholder="No. HP" name="noHp">
        </div>
        <button class="d-none" id="fire-modal-1-submit"></button>
    </form>
@endsection
