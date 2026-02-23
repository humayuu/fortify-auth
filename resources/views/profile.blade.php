<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div class="row  m-5">
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body ">
                        <h2 class="text-center">Profile Settings</h2>
                        <h3 class="text-center">Update Profile Information</h3>

                        {{-- Success message --}}
                        @if (session('status') === 'profile-information-updated')
                            <p class="alert alert-success">✔ Profile updated successfully!</p>
                        @endif

                        {{-- Errors specifically for THIS form --}}
                        @if ($errors->updateProfileInformation->any())
                            <ul class="error">
                                @foreach ($errors->updateProfileInformation->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="/user/profile-information">
                            @csrf
                            @method('PUT')

                            <label>Name</label>
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', auth()->user()->name) }}" autofocus required>

                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', auth()->user()->email) }}" required>

                            {{-- Show warning if email not verified --}}
                            @if (!auth()->user()->hasVerifiedEmail())
                                <p class="error">
                                    ⚠ Your email is not verified.
                                    <a href="/email/verify">Verify now</a>
                                </p>
                            @endif

                            <button class="btn btn-primary mt-4" type="submit">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6 mx-auto">
                <div class="card">
                    <div class="card-body ">
                        <h3 class="text-center fw-bold">Change Password</h3>

                        {{-- Success message --}}
                        @if (session('status') === 'password-updated')
                            <p class="alert alert-success">✔ Password changed successfully!</p>
                        @endif

                        {{-- Errors specifically for THIS form --}}
                        @if ($errors->updatePassword->any())
                            <ul class="error">
                                @foreach ($errors->updatePassword->all() as $error)
                                    <li class="alert alert-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="/user/password">
                            @csrf
                            @method('PUT')

                            <label>Current Password</label>
                            <input type="password" class="form-control" name="current_password" required>

                            <label>New Password</label>
                            <input type="password" class="form-control" name="password" required>

                            <label>Confirm New Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required>

                            <button class="btn btn-success mt-4" type="submit">Change Password</button>
                        </form>
                    </div>
                </div>
                <a class="btn btn-success mt-5 px-4" href="{{ url('/dashboard') }}">Back</a>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
