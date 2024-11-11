<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('dist/assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/css/style.css') }}">
</head>
<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row flex-grow">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <h4>Welcome! Let's create your account</h4>
                        <h6 class="font-weight-light">Sign up to get started.</h6>
                        <form id="registerForm" class="pt-3">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="password_confirmation" placeholder="Confirm Password" required>
                            </div>
                            <div class="mt-3 d-grid gap-2">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="/login" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#registerForm').submit(function(e) {
            e.preventDefault();

            let name = $('#name').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let password_confirmation = $('#password_confirmation').val();

            // Validasi di JavaScript untuk konfirmasi password
            if (password !== password_confirmation) {
                alert('Password dan Konfirmasi Password tidak cocok.');
                return; // Hentikan proses jika password tidak cocok
            }

            // Lanjutkan dengan AJAX jika password cocok
            $.ajax({
                url: '/api/register', // Endpoint API untuk registrasi
                type: 'POST',
                contentType: 'application/json',
                dataType: 'json',
                data: JSON.stringify({
                    name: name,
                    email: email,
                    password: password,
                    password_confirmation: password_confirmation
                }),
                success: function(response) {
                    alert('Registrasi berhasil! Silakan login.');
                    window.location.href = '/';
                },
                error: function(xhr, status, error) {
                    alert('Registrasi gagal! Silakan coba lagi.');
                }
            });
        });
    });
</script>
</body>
</html>
