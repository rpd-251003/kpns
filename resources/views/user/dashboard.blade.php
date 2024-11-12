@extends('layout.main')

@section('content')
    <style>
        #profilePicture:hover+#uploadIcon {
            display: block;
        }
    </style>
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white mr-2">
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
        <div class="col-xl-3 grid-marrgin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="position-relative d-inline-block" id="profileContainer" style="cursor: pointer;">
                            <img src="https://buffer.com/library/content/images/2022/03/amina.png" id="profilePicture"
                                class="rounded-circle img-fluid mb-3" alt="Profile Picture">
                            <span id="uploadIcon" class="position-absolute top-50 start-50 translate-middle text-white"
                                style="display: none; font-size: 2rem; font-weight: bold;">+</span>
                        </div>
                        <input type="file" id="profilePictureInput" style="display: none;">
                        <a href="" class="btn mb-2 col-12 btn-secondary">Nomor ID : KPNS00001</a>
                        <a href="" class="btn mb-2 col-12 btn-secondary">Nama Lengkap</a>
                        <a href="" class="btn mb-2 col-12 btn-secondary"> Total Simpanan</a>
                        <a href="" class="btn mb-2 col-12 btn-secondary"> Total Terima Bagi Hasil Harian</a>
                        <a href="" class="btn mb-2 col-12 btn-secondary"> Total Terima Bagi Hasil Bulanan</a>
                        <a href="" class="btn mb-2 col-12 btn-secondary"> Total Terima Bagi Hasil Tahunan</a>
                        <a href="" class="btn mb-2 col-12 btn-secondary"> Total Sudah Ditarik</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-7 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
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
                                <div class="col-xl-6 mb-3">
                                    <label for="rt" class="form-label">RT</label>
                                    <input type="text" class="form-control" id="rt" name="rt">
                                </div>
                                <div class="col-xl-6 mb-3">
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
                            <br>
                            <p class="fw-bold">Data Bank Untuk Bagi Hasil</p>
                            <hr>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-2 grid-marrgin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <a href="" class="btn mb-2 col-12 btn-secondary">Ubah Password</a>
                        <a href="" class="btn mb-2 col-12 btn-secondary">Ubah no.Wa / Rek Bank</a>
                        <a href="" class="btn mb-2 col-12 btn-success">Simpan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            // Tampilkan input file saat gambar diklik
            $('#profileContainer').on('click', function() {
                $('#profilePictureInput').click();
            });

            // Ketika file dipilih, unggah dengan AJAX
            $('#profilePictureInput').on('change', function(event) {
                let formData = new FormData();
                formData.append('picture', event.target.files[0]);

                // Ambil token JWT dari localStorage
                let token = localStorage.getItem('token');

                $.ajax({
                    url: '{{ config('app.api_url') }}/api/user/profile-picture',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content') // Hanya jika CSRF diperlukan
                    },
                    success: function(response) {
                        // Update gambar profil jika upload berhasil
                        if (response.picture_url) {
                            $('#profilePicture').attr('src', response.picture_url);
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            });
        });
    </script>
@endpush
