@if (Route::has('login'))
    <div class="container">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif
<div class="container">
    <?= env('APP_NAME') ?>
</div>
