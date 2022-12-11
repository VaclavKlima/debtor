<li @class(['breadcrumb-item', 'fw-bold' => $isActive]) @if($isActive) aria-current="page" @endif>
    @isset($url)
        <a class="link-fx" href="{{ $url }}">{{ $title }}</a>
    @else
        {{ $title }}
    @endisset
</li>
