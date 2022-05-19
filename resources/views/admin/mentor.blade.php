@extends('layouts.admin.main')
@section('admin')
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
                                <button class="btn btn-success" id="modal-1" data-title="Tambah Mentor"><i
                                        class="fas fa-plus"></i>
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
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" placeholder="Nama Lengkap" name="namaLengkap">
        </div>
        <div class="form-group">
            <label>Materi</label>
            <input type="text" class="form-control" placeholder="Biodata" name="biodata">
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <button class="d-none" id="fire-modal-1-submit"></button>
    </form>
@endsection
