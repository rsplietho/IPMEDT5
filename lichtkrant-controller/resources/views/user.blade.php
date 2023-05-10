@extends('/components/default')

@section('content')
<div class="userpage">
    <a class=button href="{{ route('index')}}">Ga terug</a>
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
    @include('components/usercomponent')
    @if (Auth::user()->isAdmin())
        @include('components/admin')
    @endif
    <a class="logout button" href={{ route('logout')}} onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Uitloggen</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</div>
@endsection
