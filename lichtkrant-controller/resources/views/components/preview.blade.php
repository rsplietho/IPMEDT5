<div class="preview">
    <p>{{App\Http\Controllers\PreviewController::previewText()}}</p>
    <form method="POST" action="/saveCurrentDataToTextPresets">
        @csrf
        <button type="submit" name="preset1">Save data to text preset 1</button>
    </form>

    <form method="POST" action="/saveCurrentDataToTextPresets">
        @csrf
        <button type="submit" name="preset2">Save data to text preset 2</button>
    </form>

</div>

