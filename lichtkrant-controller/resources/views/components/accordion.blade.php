<div class="accordion arrows">
    <div>
        <input type="radio" name="accordion" id="cb1" />
        <section class="box">
            @include('components/accordionParts/presets')
        </section>

        <input type="radio" name="accordion" id="cb2" checked="checked"/>
        <section class="box">
            @include('components/accordionParts/tekst')
        </section>

        <input type="radio" name="accordion" id="cb3" />
        <section class="box">
            @include('components/accordionParts/kleur')
        </section>

        <input type="radio" name="accordion" id="cb4" />
        <section class="box">
            @include('components/accordionParts/mode')
        </section>
        <input type="radio" name="accordion" id="acc-close" />
    </div>
</div>
