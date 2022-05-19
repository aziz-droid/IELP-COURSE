@extends('layouts.admin.main')
@section('admin')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Dokumen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/dokumen">Data Dokumen</a></div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <button class="btn btn-success" id="modal-1" data-title="Tambah Dokumen"><i
                                        class="fas fa-plus"></i>
                                    Tambah</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data">
                                        <thead>
                                            <th>No</th>
                                            <th>Nama File</th>
                                            <th>File</th>
                                            <th>Aksi</th>
                                        </thead>
                                        <tbody>
                                            <tr>
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
                                            </tr>
                                            <tr>
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
                                            </tr>
                                            <tr>
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
            <label>Nama File</label>
            <input type="text" class="form-control" placeholder="Nama File" name="namaFile">
        </div>
        <div class="form-group">
            <label>File</label>
            <input type="file" class="form-control" name="dokumen">
        </div>
        <button class="d-none" id="fire-modal-1-submit"></button>
    </form>
@endsection
