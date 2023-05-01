<nav>
    {{-- <a href="/"><img src="img/logo.png" alt="logo">Lichtkrant</a> --}}
    <a class="user" href="/user">{{auth()->user()->name}}</a>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</nav>
