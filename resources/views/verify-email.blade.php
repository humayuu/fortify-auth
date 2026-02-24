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
                        <h2 class="text-center">Verify Your Email</h2>
                        <p class="text-center">We sent a verification link to
                            <strong>{{ auth()->user()->email }}</strong>.
                        </p>
                        <p class="text-center">Please check your inbox and click the link to verify your account.</p>

                        @if (session('status') == 'verification-link-sent')
                            <p class="alert alert-success">A new verification email has been sent!</p>
                        @endif

                        <form method="POST" action="/email/verification-notification">
                            @csrf
                            <button class="btn btn-primary" type="submit">Resend Verification Email</button>
                        </form>

                        <form method="POST" action="/logout" style="margin-top:10px">
                            @csrf
                            <button class="btn btn-outline-dark" type="submit">Logout</button>
                        </form>

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
