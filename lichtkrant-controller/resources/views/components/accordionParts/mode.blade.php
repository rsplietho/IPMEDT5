<label class="box-title" for="cb4">Modus</label>
        <label class="box-close" for="acc-close"></label>
        <div class="box-content">
                <form method="POST" action="{{ route('setMode') }}">
                        <label for="mode">Kies een modus:</label>
                        <select id="mode" name="mode">
                                @foreach (App\Models\Mode::all() as $mode)
                                        <option value="{{$mode->id}}" 
                                                @if(App\Models\Current::find(1)->mode == $mode->id)
                                                selected
                                                @endif
                                                >{{$mode->name}}</option>
                                @endforeach
                        </select>
                        <button type="submit" class="coloursubmit">Save</button>
        </div>