@extends('edit/edit')

@section('content')
<h1>Wijzig Gebruikersnaam</h1>
<p>Huidige Gebruikersnaam: {{ Auth::user()->username }}</p>
<form method="POST" action="{{ route('editUserName') }}">
    @csrf
    <label for="username" :value="__('Username')" >Gebruikersnaam</label>
    <input id="username"  type="text" name="username" :value="old('username')" required />
    <button type="submit">                    
        {{ __('Wijzig') }}
    </button>
</form>
@endsection