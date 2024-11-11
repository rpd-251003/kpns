<li class="nav-item">
    <a class="nav-link" href="/dashboard">
        <span class="menu-title">Dashboard</span>
        <i class="mdi mdi-home menu-icon"></i>
    </a>
</li>

@if ($user->role == 'member')

Ini Untuk Member

@endif
<li class="nav-item">
    <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
        aria-controls="ui-basic">
        <span class="menu-title">Basic UI Elements</span>
        <i class="menu-arrow"></i>
        <i class="mdi mdi-crosshairs-gps menu-icon"></i>
    </a>
    <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item">
                <a class="nav-link"
                    href="/../public/dist/pages/ui-features/buttons.html">Buttons</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="/../public/dist/pages/ui-features/dropdowns.html">Dropdowns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link"
                    href="/../public/dist/pages/ui-features/typography.html">Typography</a>
            </li>
        </ul>
    </div>
</li>
