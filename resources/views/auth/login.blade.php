<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Qalcuity ERP</title>
    
    <!-- Tabler.io CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css">
    
    <style>
        body, html {
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
        
        @media (max-width: 768px) {
            .split-container {
                flex-direction: column;
            }
            .form-side, .image-side {
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
                            <h2 class="h2 text-center mb-4">Login to your account</h2>
                            
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
                            
                            <form action="{{ route('login.post') }}" method="post" autocomplete="off" novalidate>
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">
                                        <i class="ti ti-mail me-1"></i> Email address
                                    </label>
                                    <input type="email" name="email" class="form-control" placeholder="your@email.com" autocomplete="off" value="{{ old('email') }}">
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <label class="form-label">
                                            <i class="ti ti-lock me-1"></i> Password
                                        </label>
                                        <span class="form-label-description">
                                            <a href="#" class="text-decoration-none">Forgot password?</a>
                                        </span>
                                    </div>
                                    <div class="input-group input-group-flat">
                                        <input type="password" name="password" id="password" class="form-control" placeholder="Your password" autocomplete="off">
                                        <span class="input-group-text">
                                            <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip" onclick="togglePassword()">
                                                <i class="ti ti-eye" id="toggleIcon"></i>
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-check">
                                        <input type="checkbox" name="remember" class="form-check-input"/>
                                        <span class="form-check-label">Remember me on this device</span>
                                    </label>
                                </div>
                                <div class="form-footer">
                                    <button type="submit" class="btn btn-primary w-100">
                                        <i class="ti ti-login me-2"></i> Sign in
                                    </button>
                                </div>
                            </form>
                            
                            <div class="text-center text-muted mt-3">
                                Don't have account yet? <a href="{{ route('register') }}" class="text-primary text-decoration-none">Sign up</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-center mt-5">
                        <p class="text-muted small">
                            © {{ date('Y') }} Qalcuity ERP. All rights reserved.
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="image-side">
                <div class="image-content text-center">
                    {{-- <img src="https://cdn-icons-png.flaticon.com/512/2910/2910791.png" alt="ERP Logo" class="login-image mb-4"> --}}
                    <h1 class="display-6 text-white mb-3">Qalcuity ERP</h1>
                    <p class="lead mb-4">Sistem Manajemen Pabrik Beton Terpadu</p>
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="p-3  bg-opacity-10 rounded text-start">
                                <i class="ti ti-chart-bar fs-3 mb-2"></i>
                                <h4 class="h5">Analitik Bisnis</h4>
                                <p class="small mb-0">Pantau kinerja bisnis dengan dashboard analitik yang komprehensif</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3  bg-opacity-10 rounded text-start">
                                <i class="ti ti-building-factory fs-3 mb-2"></i>
                                <h4 class="h5">Manajemen Produksi</h4>
                                <p class="small mb-0">Kelola produksi beton dengan efisien dan terukur</p>
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
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            
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
    </script>
</body>
</html>
