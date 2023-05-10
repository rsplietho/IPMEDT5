@extends('edit/edit')

@section('content')
<h1>Wijzig Emailadres</h1>
<p>Huidig Emailadres: {{ Auth::user()->email }}</p>
<form method="POST" action="{{ route('editEmail') }}">
    @csrf
    <label for="email" :value="__('Email')">E-mailadres</label>
    <input id="email"  type="text" name="email" :value="old('email')" required />
    <button type="submit">                    
        {{ __('Wijzig') }}
    </button>
</form>
@endsection