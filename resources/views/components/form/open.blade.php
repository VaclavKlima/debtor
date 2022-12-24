<form {{ $attributes->merge(['action' => $action]) }} method="post" accept-charset="UTF-8" enctype="multipart/form-data">
    @method($method)
    @csrf
    {{ $slot }}
</form>
