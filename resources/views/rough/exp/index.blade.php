@extends('rough.layouts.soft')

@section('content')
<div class="container">
    <h2>Microsoft Login Automation</h2>

    <form method="POST" action="{{ route('puppeteer.login') }}">
        @csrf

        <div class="form-group">
            <label for="email">Microsoft Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">Microsoft Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="form-check">
            <input type="checkbox" name="consent" class="form-check-input" required>
            <label class="form-check-label">I consent to automated login and cookie capture</label>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Start Login</button>
    </form>
</div>
@endsection
