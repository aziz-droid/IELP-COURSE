@extends('layouts.admin.main')
@section('admin')
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
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                                <td>1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
    <form class="modal-part" id="modal-form" method="POST" action="">
        @csrf
        <div class="form-group">
            <label>Pertemuan</label>
            <input type="text" class="form-control" placeholder="Pertemuan" name="pertemuan">
        </div>
        <div class="form-group">
            <label>Materi</label>
            <input type="text" class="form-control" placeholder="Materi" name="materi">
        </div>
        <div class="form-group">
            <label>Jadwal</label>
            <input type="text" class="form-control" placeholder="Jadwal" name="jadwal">
        </div>
        <div class="form-group">
            <label>Link Kelas</label>
            <input type="text" class="form-control" placeholder="Link Kelas" name="link">
        </div>
        <button class="d-none" id="fire-modal-1-submit"></button>
    </form>
@endsection
