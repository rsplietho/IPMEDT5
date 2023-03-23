@extends('/components/default')

@section('content')
    <h1>Welkom {{auth()->user()->name}}</h1>
@endsection
