<label class="box-title" for="cb1">Presets</label>
<label class="box-close" for="acc-close"></label>
<div class="box-content">
    @foreach($textPresets as $preset)
        @if($preset->user_id == Auth::id())
        <form class="presetForm" method="POST" action="{{ route('updateCurrent', $preset->id) }}">
            @csrf
            <button class="presetButton" style="color: #{{ $preset->colour }}" type="submit" name="text" value="{{ $preset->text }}">{{ $preset->text }}</button>
        </form>
        @endif
    @endforeach
</div>


