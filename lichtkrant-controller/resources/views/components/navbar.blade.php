<nav>
    {{-- <a href="/"><img src="img/logo.png" alt="logo">Lichtkrant</a> --}}
    <p class="user">Welkom, <a class="user" href="{{ route('user') }}"><span class="material-symbols-rounded">person</span>{{Auth::user()->name}}</a></p>
</nav>
