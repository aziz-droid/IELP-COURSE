@extends('layouts.admin.main')
@section('admin')
    @php
    $i = 1;
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Mentor</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/mentor">Management Page</a></div>
                    <div class="breadcrumb-item">Mentor</div>
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
                                            <th>Nama Lengkap</th>
                                            <th>Biodata</th>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $d->name }}</td>
                                                    <td>{{ $d->biodata }}</td>
                                                    <td>
                                                        <a href="{{ asset('uploads/mentor/' . $d->foto) }}"
                                                            target="_blank" rel="noopener noreferrer">
                                                            <img src="{{ asset('uploads/mentor/' . $d->foto) }}" alt=""
                                                                style="width: 100px">
                                                        </a>
                                                    </td>
                                                    <td class="d-flex">
                                                        <button class="btn btn-warning mr-2 editMentor"
                                                            data-id="{{ $d->id }}" data-toggle="modal"
                                                            data-target="#exampleModal">Edit</button>
                                                        <form action="/admin/mentor/{{ $d->id }}" method="post"
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
                <form class="" id="form" method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="" id="method">
                        @csrf
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama Lengkap" name="name" id="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Biodata</label>
                            <input type="text" class="form-control @error('biodata') is-invalid @enderror"
                                placeholder="Biodata" name="biodata" id="biodata" value="{{ old('biodata') }}">
                            @error('biodata')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                            @error('foto')
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
@endsection
