@extends('layouts.admin.main')
@section('admin')
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
                                <button class="btn btn-success" id="modal-1" data-title="Tambah Harga"><i
                                        class="fas fa-plus"></i>
                                    Tambah</button>
                                <button class="btn btn-warning ml-1" id="modal-2" data-title="Ubah Deskripsi"><i
                                        class="fas fa-pencil-alt"></i>
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
            <label>Mata Pelajaran</label>
            <input type="text" class="form-control" placeholder="Mata Pelajaran" name="pelajaran">
        </div>
        <div class="form-group">
            <label>Jam Pelajaran (T)</label>
            <input type="text" class="form-control" placeholder="Jam Pelajaran (T)" name="jamT">
        </div>
        <div class="form-group">
            <label>Jam Pelajaran (P)</label>
            <input type="text" class="form-control" placeholder="Jam Pelajaran (P)" name="jamP">
        </div>
        <button class="d-none" id="fire-modal-1-submit"></button>
    </form>
    <form class="modal-part" id="modal-form-desk" method="POST" action="">
        @csrf
        <div class="form-group">
            <label>Deskrispsi</label>
            <textarea type="text" class="form-control" placeholder="Deskripsi" name="deskrispsi" style="height: 100px"></textarea>
        </div>

        <button class="d-none" id="fire-modal-1-submit"></button>
    </form>
@endsection
