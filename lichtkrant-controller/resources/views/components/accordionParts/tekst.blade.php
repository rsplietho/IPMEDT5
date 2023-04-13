<label class="box-title" for="cb2">Tekst</label>
<label class="box-close" for="acc-close"></label>
<div class="box-content">
    <form method="POST" action="/updateText">
        @csrf
        <input class="textInput" type="text" name="text">
        <button type="submit">Save</button>
    </form>
</div>