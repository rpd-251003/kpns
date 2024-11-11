@if ($user['role'] == 'member')
<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <span class="menu-title">Profile Anggota</span>
        <i class="mdi mdi-account menu-icon"></i> <!-- Icon Profile -->
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/sipitung">
        <span class="menu-title">Bagi Hasil SiPitung</span>
        <i class="mdi mdi-cash-multiple menu-icon"></i> <!-- Icon Bagi Hasil -->
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/histori">
        <span class="menu-title">Histori</span>
        <i class="mdi mdi-history menu-icon"></i> <!-- Icon Histori -->
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="/bagikan">
        <span class="menu-title">Bagikan Info KPNS</span>
        <i class="mdi mdi-share-variant menu-icon"></i> <!-- Icon Bagikan Info -->
    </a>
</li>


{{-- <li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <span class="menu-title">Basic UI Elements</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link" href="/../public/dist/pages/ui-features/buttons.html">Buttons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/../public/dist/pages/ui-features/dropdowns.html">Dropdowns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/../public/dist/pages/ui-features/typography.html">Typography</a>
            </li>
        </ul>
    </div>
</li> --}}

@endif
