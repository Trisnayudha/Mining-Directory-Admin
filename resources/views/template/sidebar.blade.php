<ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <a class="{{ request()->is('/') ? 'nav-link' : 'nav-link collapsed' }}" href="{{ url('') }}">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="{{ request()->routeIs('categories.index') || request()->routeIs('sub-categories.index') ? 'nav-link' : 'nav-link collapsed' }}"
            data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav"
            class="nav-content collapse
            {{ request()->routeIs('categories.index') || request()->routeIs('sub-categories.index') || request()->routeIs('popular-categories') ? 'show' : '' }}"
            data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ route('categories.index') }}"
                    class="{{ request()->routeIs('categories.index') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('sub-categories.index') }}"
                    class="{{ request()->routeIs('sub-categories.index') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Sub Category</span>
                </a>
            </li>
            <li>
                <a href="{{ url('popular-categories') }}"
                    class="{{ request()->is('popular-categories') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Popular Category</span>
                </a>
            </li>
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Project Type</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
        <a class="{{ request()->is('your-url-here') ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#home-nav"
            data-bs-toggle="collapse" href="#">
            <i class="bi bi-house-door"></i><span>Home Reference</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="home-nav" class="nav-content collapse
            {{ request()->is('your-url-here') ? 'show' : '' }}"
            data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Carousel</span>
                </a>
            </li>
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Statistic</span>
                </a>
            </li>
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Privacy & Term</span>
                </a>
            </li>
        </ul>
    </li><!-- End Home Reference Nav -->

    <li class="nav-item">
        <a class="{{ request()->is('your-url-here') ? 'nav-link' : 'nav-link collapsed' }}" data-bs-target="#forms-nav"
            data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Asset Digital</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse
            {{ request()->is('your-url-here') ? 'show' : '' }}"
            data-bs-parent="#sidebar-nav">
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Products</span>
                </a>
            </li>
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Projects</span>
                </a>
            </li>
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Media Resources</span>
                </a>
            </li>
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>News</span>
                </a>
            </li>
            <li>
                <a href="{{ url('') }}" class="{{ request()->is('your-url-here') ? 'active' : '' }}">
                    <i class="bi bi-circle"></i><span>Videos</span>
                </a>
            </li>
        </ul>
    </li><!-- End Forms Nav -->

    <li class="nav-item">
        <a class="{{ request()->routeIs('companies.index') ? 'nav-link' : 'nav-link collapsed' }}"
            href="{{ route('companies.index') }}">
            <i class="bi bi-building"></i>
            <span>Company</span>
        </a>
    </li><!-- End Company Nav -->

    <li class="nav-item">
        <a class="{{ request()->is('your-url-here') ? 'nav-link' : 'nav-link collapsed' }}"
            href="{{ url('') }}">
            <i class="bi bi-credit-card"></i>
            <span>Transaction</span>
        </a>
    </li><!-- End Transaction Nav -->

    <li class="nav-item">
        <a class="{{ request()->is('your-url-here') ? 'nav-link' : 'nav-link collapsed' }}"
            href="{{ url('') }}">
            <i class="bi bi-person-fill"></i>
            <span>Users</span>
        </a>
    </li><!-- End Users Nav -->
</ul>
