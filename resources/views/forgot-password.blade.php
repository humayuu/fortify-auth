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
                        <h2>Forgot Password</h2>
                        <p>Enter your email and we'll send a reset link.</p>

                        @if (session('status'))
                            <p class="success">{{ session('status') }}</p>
                        @endif

                        @if ($errors->any())
                            <ul class="error">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="/forgot-password">
                            @csrf
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" required>
                            <button type="submit">Send Reset Link</button>
                        </form>

                        <p><a href="/login">Back to Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>
