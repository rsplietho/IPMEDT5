<div class="preview">
    <p style="color: {{ App\Http\Controllers\PreviewController::previewColour() }}">{{App\Http\Controllers\PreviewController::previewText()}}</p>
    <div class="previewButtons">
        <form method="POST" action="/saveCurrentDataToTextPresets">
            @csrf
            <button type="submit" name="preset1">1</button>
        </form>

        <form method="POST" action="/saveCurrentDataToTextPresets">
            @csrf
            <button type="submit" name="preset2">2</button>
        </form>

        <form method="POST" action="/saveCurrentDataToTextPresets">
            @csrf
            <button type="submit" name="preset3">3</button>
        </form>

        <form method="POST" action="/saveCurrentDataToTextPresets">
            @csrf
            <button type="submit" name="preset4">4</button>
        </form>
    </div>

</div>

