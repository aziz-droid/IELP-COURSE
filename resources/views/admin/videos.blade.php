@extends('layouts.admin.main')
@section('admin')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Videos</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/admin/videos">Management Page</a></div>
                    <div class="breadcrumb-item">Videos</div>
                </div>
            </div>
            <!-- Main Content -->
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <button class="btn btn-success" id="modal-1" data-title="Tambah Video"><i
                                        class="fas fa-plus"></i>
                                    Tambah</button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table" id="data">
                                        <thead>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Video</th>
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
            <label>Judul</label>
            <input type="text" class="form-control" placeholder="Judul" name="judul">
        </div>
        <div class="form-group">
            <label>Video</label>
            <input type="text" class="form-control" placeholder="Video" name="video">
        </div>
        <button class="d-none" id="fire-modal-1-submit"></button>
    </form>
@endsection
