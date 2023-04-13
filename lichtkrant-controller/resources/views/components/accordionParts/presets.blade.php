<label class="box-title" for="cb1">Presets</label>
<label class="box-close" for="acc-close"></label>
<div class="box-content">
    @foreach($textPresets as $preset)
        <p>{{ $preset->text }}</p>
    @endforeach
</div>

