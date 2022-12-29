@props([
    'model' => null,
])
<form {{ $attributes->merge(['action' => $action]) }} accept-charset="UTF-8" enctype="multipart/form-data" method="post">
    @method($method)
    @csrf
    {{ $slot }}
</form>
