<label class="box-title" for="cb3">Kleur</label>
        <label class="box-close" for="acc-close"></label>
        <div class="box-content">
                <form class="colourBox" method="POST" action="/updateColour">
                        @csrf
                        <button style="background-color: #FF0000;" class="colourButton" type="submit" name="colour" value="FF0000"></button>
                        <button style="background-color: #00FF00;" class="colourButton" type="submit" name="colour" value="00FF00"></button>
                        <button style="background-color: #0000FF;" class="colourButton" type="submit" name="colour" value="0000FF"></button>
                        <button style="background-color: #FFFF00;" class="colourButton" type="submit" name="colour" value="FFFF00"></button>
                        <button style="background-color: #00FFFF;" class="colourButton" type="submit" name="colour" value="00FFFF"></button>
                        <button style="background-color: #FF00FF;" class="colourButton" type="submit" name="colour" value="FF00FF"></button>
                </form>
        </div>