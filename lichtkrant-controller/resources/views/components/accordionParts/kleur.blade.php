<label class="box-title" for="cb3">Kleur</label>
        <label class="box-close" for="acc-close"></label>
        <div class="box-content">
                <form method="POST" action="/updateColour">
                @csrf
                <input class="colourInput" type="text" name="colour">
                <button type="submit">Save</button>
        </form>
        </div>