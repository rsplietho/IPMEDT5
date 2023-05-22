<div class="userPanel">
    <h1>Gebruikers&shy;instellingen</h1>
    <h2>Je gegevens</h2>
        <p><b>Naam:</b> {{Auth::user()->name}}&nbsp;<a href="{{route('user.edit.name')}}"><span class="material-symbols-rounded">edit</span></a></p>
        <p><b>Gebruikersnaam:</b> {{Auth::user()->username}}&nbsp;<a href="{{route('user.edit.username')}}"><span class="material-symbols-rounded">edit</span></a></p>
        <p><b>Email:</b> {{Auth::user()->email}}&nbsp;<a href="{{route('user.edit.email')}}"><span class="material-symbols-rounded">edit</span></a></p>
    <a class="button" href="{{ route('user.edit.password')}}">Wachtwoord opnieuw instellen</a>

</div>