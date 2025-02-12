<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Verify</title>
</head>
<body>
    <h1>Verify your email</h1>
    @if (session('status') == null)
    <form action="{{ route('verification.send') }}" method="post">
        @csrf
        <button type="submit">Send Email</button>
    </form>
    @else
        <p>Verification email has been sent</p>
    @endif
    <p>Don't see your mail?</p>
    <form action="{{ route('verification.resend') }}" method="post">
        @csrf
        <button type="submit">Resend Email</button>
    </form>
    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            Cancel
        </button>
    </form>
</body>
</html>
