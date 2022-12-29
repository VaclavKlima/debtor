@error($name)
<div class="invalid-feedback animated fadeIn">
    {{ $errors->first($name) }}
</div>
@enderror
