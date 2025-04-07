<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Qalcuity ERP</title>

    <!-- Tabler.io CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">

    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css">

    <style>
        body,
        html {
            height: 100%;
        }

        .page {
            display: flex;
            min-height: 100vh;
        }

        .split-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .form-side {
            width: 50%;
            padding: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            background-color: #fff;
            overflow-y: auto;
        }

        .image-side {
            width: 50%;
            background: linear-gradient(135deg, #0061f2 0%, #6610f2 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .image-side::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.unsplash.com/photo-1588964895597-cfccd6e2dbf9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1974&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
        }

        .image-content {
            position: relative;
            z-index: 1;
            max-width: 80%;
        }

        .brand-text {
            background: linear-gradient(135deg, #0061f2 0%, #6610f2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .card {
            border: none;
            box-shadow: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #0061f2 0%, #6610f2 100%);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .login-image {
            max-width: 80px;
            margin-bottom: 1rem;
        }

        .password-strength {
            height: 5px;
            margin-top: 8px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }

            .form-side,
            .image-side {
                width: 100%;
            }

            .image-side {
                min-height: 250px;
                order: -1;
            }
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="split-container">
            <div class="form-side">
                <div class="container-tight py-4">
                    <div class="text-center mb-4 d-block d-md-none">
                        <a href="." class="navbar-brand navbar-brand-autodark">
                            <h1 class="h3 brand-text">Qalcuity ERP</h1>
                        </a>
                    </div>

                    <div class="card">
                        <div class="card-body p-4">
                            <h2 class="h2 text-center mb-4">Create new account</h2>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div class="d-flex">
                                        <div>
                                            <i class="ti ti-alert-circle me-2"></i>
                                        </div>
                                        <div>
                                            <ul class="mb-0 ps-3">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <form action="{{ route('register.post') }}" method="post" autocomplete="off" novalidate
                                id="registerForm">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="ti ti-user me-1"></i> Full Name
                                    </label>
                                    <input type="text" name="name" class="form-control" placeholder="Your name"
                                        value="{{ old('name') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="ti ti-mail me-1"></i> Email address
                                    </label>
                                    <input type="email" name="email" class="form-control"
                                        placeholder="your@email.com" value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="ti ti-lock me-1"></i> Password
                                    </label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" name="password" id="password" class="form-control"
                                            placeholder="Your password" autocomplete="off"
                                            onkeyup="checkPasswordStrength()">
                                        <span class="input-group-text">
                                            <a href="#" class="link-secondary" title="Show password"
                                                data-bs-toggle="tooltip"
                                                onclick="togglePassword('password', 'toggleIcon1')">
                                                <i class="ti ti-eye" id="toggleIcon1"></i>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="password-strength bg-muted" id="passwordStrength"></div>
                                    <div class="text-muted mt-1 small" id="passwordFeedback">Password should be at least
                                        8 characters</div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="ti ti-check me-1"></i> Confirm Password
                                    </label>
                                    <div class="input-group input-group-flat">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" placeholder="Confirm your password" autocomplete="off"
                                            onkeyup="checkPasswordMatch()">
                                        <span class="input-group-text">
                                            <a href="#" class="link-secondary" title="Show password"
                                                data-bs-toggle="tooltip"
                                                onclick="togglePassword('password_confirmation', 'toggleIcon2')">
                                                <i class="ti ti-eye" id="toggleIcon2"></i>
                                            </a>
                                        </span>
                                    </div>
                                    <div class="text-muted mt-1 small" id="passwordMatch"></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check">
                                        <input type="checkbox" class="form-check-input" id="termsCheck" />
                                        <span class="form-check-label">I agree to the <a href="#"
                                                tabindex="-1">terms and
                                                policy</a>.</span>
                                    </label>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100" id="registerBtn">
                                        <i class="ti ti-user-plus me-2"></i> Create new account
                                    </button>
                                </div>
                            </form>

                            <div class="text-center text-muted mt-3">
                                Already have an account? <a href="{{ route('login') }}"
                                    class="text-primary text-decoration-none">Sign in</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-5">
                        <p class="text-muted small">
                            &copy; {{ date('Y') }} Qalcuity ERP. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>

            <div class="image-side">
                <div class="image-content text-center">
                    {{-- <img src="https://cdn-icons-png.flaticon.com/512/2910/2910791.png" alt="ERP Logo"
                        class="login-image mb-4"> --}}
                    <h1 class="display-6 text-white mb-3">Qalcuity ERP</h1>
                    <p class="lead mb-4">Sistem Manajemen Pabrik Beton Terpadu</p>

                    <div class="row g-3 mt-4">
                        <div class="col-12">
                            <div class="p-3  bg-opacity-10 rounded text-start">
                                <h4 class="h5 mb-3"><i class="ti ti-list-check me-2"></i> Fitur Utama</h4>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="ti ti-circle-check me-2"></i> Manajemen produksi dan
                                        kualitas</li>
                                    <li class="mb-2"><i class="ti ti-circle-check me-2"></i> Pengelolaan bahan baku
                                        dan inventaris</li>
                                    <li class="mb-2"><i class="ti ti-circle-check me-2"></i> Manajemen keuangan dan
                                        akuntansi</li>
                                    <li class="mb-2"><i class="ti ti-circle-check me-2"></i> Pengelolaan pelanggan
                                        dan penjualan</li>
                                    <li><i class="ti ti-circle-check me-2"></i> Laporan analitik dan business
                                        intelligence</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabler.io JS -->
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script>
    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('ti-eye');
                toggleIcon.classList.add('ti-eye-off');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('ti-eye-off');
                toggleIcon.classList.add('ti-eye');
            }
        }

        function checkPasswordStrength() {
            const password = document.getElementById('password').value;
            const strengthBar = document.getElementById('passwordStrength');
            const feedback = document.getElementById('passwordFeedback');

            // Reset
            strengthBar.style.width = '0%';
            strengthBar.className = 'password-strength';

            if (password.length === 0) {
                feedback.textContent = 'Password should be at least 8 characters';
                return;
            }

            // Check strength
            let strength = 0;

            // Length check
            if (password.length >= 8) strength += 25;

            // Character variety checks
            if (/[A-Z]/.test(password)) strength += 25; // Has uppercase
            if (/[0-9]/.test(password)) strength += 25; // Has number
            if (/[^A-Za-z0-9]/.test(password)) strength += 25; // Has special char

            // Update UI
            strengthBar.style.width = strength + '%';

            if (strength < 25) {
                strengthBar.classList.add('bg-danger');
                feedback.textContent = 'Very weak password';
            } else if (strength < 50) {
                strengthBar.classList.add('bg-warning');
                feedback.textContent = 'Weak password';
            } else if (strength < 75) {
                strengthBar.classList.add('bg-info');
                feedback.textContent = 'Medium strength password';
            } else {
                strengthBar.classList.add('bg-success');
                feedback.textContent = 'Strong password';
            }
        }

        function checkPasswordMatch() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            const matchText = document.getElementById('passwordMatch');

            if (confirmPassword.length === 0) {
                matchText.textContent = '';
                return;
            }

            if (password === confirmPassword) {
                matchText.textContent = 'Passwords match';
                matchText.className = 'text-success mt-1 small';
            } else {
                matchText.textContent = 'Passwords do not match';
                matchText.className = 'text-danger mt-1 small';
            }
        }

        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            const registerForm = document.getElementById('registerForm');
            const registerBtn = document.getElementById('registerBtn');
            const termsCheck = document.getElementById('termsCheck');

            termsCheck.addEventListener('change', function() {
                registerBtn.disabled = !this.checked;
            });

            // Initially disable button if terms not checked
            registerBtn.disabled = !termsCheck.checked;
        });
    </script>
</body>

</html>
