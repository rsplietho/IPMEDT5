<label class="box-title" for="cb1">Presets</label>
<label class="box-close" for="acc-close"></label>
<div class="box-content">
    @foreach($textPresets as $preset)
        @if($preset->user_id == Auth::id())
            <p>{{ $preset->text }}</p>
        @endif
    @endforeach
</div>

