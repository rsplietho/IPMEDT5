<label class="box-title" for="cb2">Tekst</label>
<label class="box-close" for="acc-close"></label>
<div class="box-content">
    <form method="POST" action="/updateText">
        @csrf
        <input class="saveInput" type="text" name="text">
        <button type="submit">Save</button>
    </form>
    <form method="POST" action="/saveCurrentDataToTextPresets">
    @csrf
    <button type="submit">Save data to text presets</button>
</form>
</div>