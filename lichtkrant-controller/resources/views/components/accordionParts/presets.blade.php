<label class="box-title" for="cb1">Presets</label>
<label class="box-close" for="acc-close"></label>
<div class="box-content">
    <h3>Sla de huidige tekst op</h3>
    <div class="previewButtons">
        <form method="POST" action="/saveCurrentDataToTextPresets">
            @csrf
            <button type="presetButton" name="preset1">1</button>
        </form>

        <form method="POST" action="/saveCurrentDataToTextPresets">
            @csrf
            <button type="presetButton" name="preset2">2</button>
        </form>

        <form method="POST" action="/saveCurrentDataToTextPresets">
            @csrf
            <button type="presetButton" name="preset3">3</button>
        </form>

        <form method="POST" action="/saveCurrentDataToTextPresets">
            @csrf
            <button type="presetButton" name="preset4">4</button>
        </form>
    </div>
    <h3>Presets</h3>
    @foreach($textPresets as $preset)
        @if($preset->user_id == Auth::id())
        <form class="presetForm" method="POST" action="{{ route('updateCurrent', $preset->id) }}">
            @csrf
            <button class="presetButton" style="color: #{{ $preset->colour }}" type="submit" name="text" value="{{ $preset->text }}">{{ $preset->text }}</button>
        </form>
        @endif
    @endforeach
</div>


