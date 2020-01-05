<ul class="nav nav-tabs">
    <li class="nav-item">
        @if(\Request::is('/'))
            <a class="nav-link active" href="/">Home</a>
        @else
            <a class="nav-link" href="/">Home</a>
        @endif
    </li>
    <li class="nav-item">
        @if(\Request::is('mijn-werk') || \Request::is('mijn-werk/*'))
            <a class="nav-link active" href="/mijn-werk">Mijn werk</a>
        @else
            <a class="nav-link" href="/mijn-werk">Mijn werk</a>
        @endif
    </li>
    <li class="nav-item">
        @if (\Request::is('blog') || \Request::is('blog/*'))
            <a class="nav-link active" href="/blog">Blog</a>
        @else
            <a class="nav-link" href="/blog">Blog</a>
        @endif
    </li>
    <li class="nav-item">
        @if (\Request::is('contact'))
            <a class="nav-link active" href="/contact">Contact</a>
        @else
            <a class="nav-link" href="/contact">Contact</a>
        @endif
    </li>
</ul>
