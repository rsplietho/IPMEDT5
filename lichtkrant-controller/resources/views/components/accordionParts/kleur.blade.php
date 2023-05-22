<label class="box-title" for="cb3">Kleur</label>
        <label class="box-close" for="acc-close"></label>
        <div class="box-content">
                <h3>Kies een kleur</h3>
                <form class="colourBox" method="POST" action="/updateColour">
                        @csrf
                        <button type="button" style="background-color: #FF0000;" class="colourButton" onclick="document.getElementById('colour-input').value = this.value;" name="colour" value="FF0000"></button>
                        <button type="button" style="background-color: #00FF00;" class="colourButton" onclick="document.getElementById('colour-input').value = this.value;" name="colour" value="00FF00"></button>
                        <button type="button" style="background-color: #0000FF;" class="colourButton" onclick="document.getElementById('colour-input').value = this.value;" name="colour" value="0000FF"></button>
                        <button type="button" style="background-color: #FFFF00;" class="colourButton" onclick="document.getElementById('colour-input').value = this.value;" name="colour" value="FFFF00"></button>
                        <button type="button" style="background-color: #00FFFF;" class="colourButton" onclick="document.getElementById('colour-input').value = this.value;" name="colour" value="00FFFF"></button>
                        <button type="button" style="background-color: #FF00FF;" class="colourButton" onclick="document.getElementById('colour-input').value = this.value;" name="colour" value="FF00FF"></button>
                        <!-- <input type="color" id="colourpicker" name="colourpicker" onchange="document.getElementById('colour-input').value = this.value.substr(1);" style="display:none;">
                        <button onclick="document.getElementById('colourpicker').click(); return false;">Pick a color</button> -->
                        <label for="colour-input" class="colourlabel">Hex-kleur:</label>
                        <input type="text" id="colour-input" class="colour-input" name="colour" value="" required>
                        <button type="submit" class="coloursubmit">Save</button>
                </form>
        </div>