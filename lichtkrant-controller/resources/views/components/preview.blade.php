<div class="preview">
    <p>{{App\Http\Controllers\PreviewController::previewText()}}</p>
    <form method="POST" action="/saveCurrentDataToTextPresets">
    @csrf
    <button type="submit">Save data to text presets</button>
</div>

