<label class="box-title" for="cb2">Tekst</label>
<label class="box-close" for="acc-close"></label>
<div class="box-content">
    <form class="textForm" method="POST" action="/updateText">
        @csrf
        <input class="saveInput" type="text" name="text">
        <button type="submit">Save</button>
    </form>
    <br>
<h3>Sla de tekst op in 1 van de 4 boxen</h3>
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

</form>
</div>