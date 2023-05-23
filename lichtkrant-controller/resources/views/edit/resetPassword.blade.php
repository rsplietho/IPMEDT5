@extends('edit/edit')

@section('content')
<h1>Wijzig Wachtwoord</h1>
<form method="POST" action="{{ route('editPassword') }}">
    @csrf
    <label for="password" :value="__('Password')">Wachtwoord</label>
    <input id="password" 
    type="password"
    name="password"
    required autocomplete="new-password" />

    <label for="password" :value="__('Password')">Herhaal wachtwoord</label>
    <input id="password_confirmation" 
    type="password"
    name="password_confirmation" required />

    <button type="submit">                    
        {{ __('Wijzig') }}
    </button>
</form>
@endsection