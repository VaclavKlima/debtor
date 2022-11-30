<li class="nav-main-item">
    <a @class(['nav-main-link', 'active' => $isActive]) href="{{ $url }}">
        <i class="nav-main-link-icon {{ $icon }}"></i>
        <span class="nav-main-link-name"> {{ $title }}</span>
    </a>
</li>
