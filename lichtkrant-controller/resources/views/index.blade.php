@extends('/components/default')

@section('content')
    <h1>Welkom {{auth()->user()->some_column}}</h1>
@endsection
