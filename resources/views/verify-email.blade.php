<h2>Verify Your Email</h2>
<p>We sent a verification link to <strong>{{ auth()->user()->email }}</strong>.</p>
<p>Please check your inbox and click the link to verify your account.</p>

@if (session('status') == 'verification-link-sent')
    <p class="success">A new verification email has been sent!</p>
@endif

<form method="POST" action="/email/verification-notification">
    @csrf
    <button type="submit">Resend Verification Email</button>
</form>

<form method="POST" action="/logout" style="margin-top:10px">
    @csrf
    <button type="submit" style="background:#6b7280">Logout</button>
</form>
