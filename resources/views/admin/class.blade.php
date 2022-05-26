@extends('layouts.admin.main')
@section('admin')
    @php
    $i = 1;
    @endphp
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Class</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/class">Class</a></div>
                    <!-- <div class="breadcrumb-item">Profile</div> -->
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
                                            <th>Pertemuan</th>
                                            <th>Materi</th>
                                            <th>Jadwal</th>
                                            <th>Link Kelas</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $d->pertemuan }}</td>
                                                    <td>{{ $d->materi }}</td>
                                                    <td>{{ $d->jadwal }}</td>
                                                    <td>{{ $d->link }}</td>
                                                    <td class="d-flex">
                                                        <button class="btn btn-warning mr-2 edit"
                                                            data-id="{{ $d->id }}" data-toggle="modal"
                                                            data-target="#exampleModal">Edit</button>
                                                        <form action="/admin/class/{{ $d->id }}" method="post"
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Kelola Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="" method="POST" action="" id="form">
                    <div class="modal-body">
                        <input type="hidden" name="" id="method">
                        @csrf
                        <div class="form-group">
                            <label>Pertemuan</label>
                            <input type="text" class="form-control @error('pertemuan') is-invalid @enderror"
                                placeholder="Pertemuan" name="pertemuan" id="pertemuan">
                            @error('pertemuan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Materi</label>
                            <input type="text" class="form-control @error('materi') is-invalid @enderror"
                                placeholder="Materi" name="materi" id="materi">
                            @error('materi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jadwal</label>
                            <input type="text" class="form-control datepicker @error('jadwal') is-invalid @enderror"
                                placeholder="Jadwal" name="jadwal" id="jadwal">
                            @error('jadwal')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Link Kelas</label>
                            <input type="text" class="form-control @error('link') is-invalid @enderror"
                                placeholder="Link Kelas" name="link" id="link">
                            @error('link')
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
