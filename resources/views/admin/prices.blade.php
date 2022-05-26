@extends('layouts.admin.main')
@section('admin')
    @php
    $i = 1;
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Prices</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/prices">Management Page</a></div>
                    <div class="breadcrumb-item">Prices</div>
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
                                <button type="button" class="btn btn-warning ml-1" id="desk" data-toggle="modal"
                                    data-target="#modalDesk"><i class="fas fa-pencil-alt"></i>
                                    Ubah Deskripsi</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data">
                                        <thead class="text-center">
                                            <tr>
                                                <th rowspan="2">No</th>
                                                <th rowspan="2">Mata Pelajaran</th>
                                                <th colspan="2">Jam Pelajaran</th>
                                                <th rowspan="2">Aksi</th>
                                            </tr>
                                            <tr>
                                                <th>T</th>
                                                <th>P</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $d->pelajaran }}</td>
                                                    <td>{{ $d->jamT }}</td>
                                                    <td>{{ $d->jamP }}</td>
                                                    <td class="d-flex">
                                                        <button class="btn btn-warning mr-2 editPrice"
                                                            data-id="{{ $d->id }}" data-toggle="modal"
                                                            data-target="#exampleModal">Edit</button>
                                                        <form action="/admin/prices/{{ $d->id }}" method="post"
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
                    <h5 class="modal-title" id="exampleModalLabel">Kelola Harga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" id="form" method="POST" action="">
                    <div class="modal-body">
                        <input type="hidden" name="" id="method">
                        @csrf
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" class="form-control @error('pelajaran') is-invalid @enderror"
                                placeholder="Mata Pelajaran" name="pelajaran" id="pelajaran">
                            @error('pelajaran')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jam Pelajaran (T)</label>
                            <input type="text" class="form-control @error('jamT') is-invalid @enderror"
                                placeholder="Jam Pelajaran (T)" name="jamT" id="jamT">
                            @error('jamT')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jam Pelajaran (P)</label>
                            <input type="text" class="form-control @error('jamP') is-invalid @enderror"
                                placeholder="Jam Pelajaran (P)" name="jamP" id="jamP">
                            @error('jamP')
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

    <div class="modal fade" id="modalDesk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kelola Deskripsi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" method="POST" action="/admin/desc">
                    <div class="modal-body">
                        <input type="hidden" name="" id="method">
                        @csrf
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea type="text" class="form-control @error('deskripsi') is-invalid @enderror" placeholder="Deskripsi"
                                name="deskripsi" style="height: 100px"
                                id="deskripsi">{{ $desc->deskripsi }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Mulai Kelas</label>
                            <input type="text" class="form-control datepicker @error('dateMulai') is-invalid @enderror"
                                placeholder="" name="dateMulai" id="dateMulai" value="{{ $desc->dateMulai }}">
                            @error('dateMulai')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Tanggal Akhir Kelas</label>
                            <input type="text" class="form-control datepicker @error('dateAkhir') is-invalid @enderror"
                                placeholder="" name="dateAkhir" id="dateAkhir" value="{{ $desc->dateAkhir }}">
                            @error('dateAkhir')
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
