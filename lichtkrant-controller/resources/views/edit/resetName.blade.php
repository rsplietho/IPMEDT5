@extends('edit/edit')

@section('content')
<h1>Wijzig Naam</h1>
<p>Huidige Naam: {{ Auth::user()->name }}</p>
<form method="POST" action="{{ route('editName') }}">
    @csrf
    <label for="name" :value="__('Name')">Naam</label>
    <input id="name"  type="text" name="name" :value="old('name')" required autofocus />
    <button type="submit">                    
        {{ __('Wijzig') }}
    </button>
</form>
@endsection