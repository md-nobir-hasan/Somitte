<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .register-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .form-header {
            text-align: center;
            margin-bottom: 30px;
            color: #3a3a3a;
        }
        .form-header h1 {
            font-weight: 600;
        }
        .form-control {
            border-radius: 5px;
            padding: 12px;
            margin-bottom: 15px;
        }
        .btn-register {
            background-color: #4e73df;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-weight: 600;
            width: 100%;
            margin-top: 15px;
        }
        .btn-register:hover {
            background-color: #3756a4;
        }
        .required-field::after {
            content: "*";
            color: red;
            margin-left: 4px;
        }
        .photo-preview {
            width: 150px;
            height: 150px;
            border: 2px dashed #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            overflow: hidden;
        }
        .photo-preview img {
            max-width: 100%;
            max-height: 100%;
            display: none;
        }
        .photo-preview i {
            font-size: 40px;
            color: #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <div class="form-header">
                <h1>Create Your Account</h1>
                <p>Please fill in the details to register</p>
            </div>

            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label required-field">Full Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="batch" class="form-label required-field">University Batch</label>
                            <input type="text" class="form-control @error('batch') is-invalid @enderror" id="batch" name="batch" placeholder="20 batch" value="{{ old('batch') }}" required>
                            @error('batch')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="permanent_address" class="form-label required-field">Permanent Address</label>
                            <textarea class="form-control @error('permanent_address') is-invalid @enderror" id="permanent_address" name="permanent_address" rows="3" required>{{ old('permanent_address') }}</textarea>
                            @error('permanent_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="present_address" class="form-label required-field">Present Address</label>
                            <textarea class="form-control @error('present_address') is-invalid @enderror" id="present_address" name="present_address" rows="3" required>{{ old('present_address') }}</textarea>
                            @error('present_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="occupation" class="form-label required-field">Occupation</label>
                            <input type="text" class="form-control @error('occupation') is-invalid @enderror" id="occupation" name="occupation" value="{{ old('occupation') }}" required>
                            @error('occupation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="occupation_sector" class="form-label required-field">Occupation Sector</label>
                            <select class="form-select @error('occupation_sector') is-invalid @enderror" id="occupation_sector" name="occupation_sector" required>
                                <option value="" selected disabled>Select your sector</option>
                                <option value="private" {{ old('occupation_sector') == 'private' ? 'selected' : '' }}>Private</option>
                                <option value="govt" {{ old('occupation_sector') == 'govt' ? 'selected' : '' }}>Government</option>
                                <option value="business" {{ old('occupation_sector') == 'business' ? 'selected' : '' }}>Business</option>
                                <option value="none" {{ old('occupation_sector') == 'none' ? 'selected' : '' }}>None</option>
                            </select>
                            @error('occupation_sector')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="photo" class="form-label required-field">Photo</label>
                            <div class="photo-preview" id="photoPreview">
                                <i class="fas fa-camera"></i>
                                <img id="previewImg" src="#" alt="Profile Photo">
                            </div>
                            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*" required>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label required-field">WhatsApp Number</label>
                            <input type="tel" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp') }}" required>
                            <small class="text-muted">This will be used for login and password reset OTP</small>
                            @error('whatsapp')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="password" class="form-label required-field">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label required-field">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-register">Register</button>

                <div class="text-center mt-3">
                    <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Photo Preview Script -->
    <script>
        document.getElementById('photo').onchange = function(evt) {
            const [file] = this.files;
            if (file) {
                const preview = document.getElementById('previewImg');
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
                document.querySelector('#photoPreview i').style.display = 'none';
            }
        };
    </script>
</body>
</html>