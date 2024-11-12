@extends('layout.main')

@section('content')
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>
            </span> Dashboard Anggota
        </h3>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <h4 class="card-title float-left">Profile Anggota</h4>
                        <form>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_ktp" class="form-label">Nomor KTP</label>
                                <input type="text" class="form-control" id="nomor_ktp" name="nomor_ktp" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <input type="text" class="form-control" id="rt" name="rt">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="rw" class="form-label">RW</label>
                                    <input type="text" class="form-control" id="rw" name="rw">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                            </div>
                            <div class="mb-3">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                            </div>
                            <div class="mb-3">
                                <label for="kabupaten_kota" class="form-label">Kabupaten/Kota</label>
                                <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota">
                            </div>
                            <div class="mb-3">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi">
                            </div>
                            <div class="mb-3">
                                <label for="kode_pos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos">
                            </div>
                            <div class="mb-3">
                                <label for="nomor_wa" class="form-label">Nomor WA</label>
                                <input type="text" class="form-control" id="nomor_wa" name="nomor_wa">
                            </div>
                            <div class="mb-3">
                                <label for="nama_bank" class="form-label">Nama Bank</label>
                                <input type="text" class="form-control" id="nama_bank" name="nama_bank">
                            </div>
                            <div class="mb-3">
                                <label for="nama_pemilik" class="form-label">Nama Pemilik Rekening</label>
                                <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik">
                            </div>
                            <div class="mb-3">
                                <label for="nomor_bank" class="form-label">Nomor Rekening Bank</label>
                                <input type="text" class="form-control" id="nomor_bank" name="nomor_bank">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <canvas id="visit-sale-chart" class="mt-4"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
