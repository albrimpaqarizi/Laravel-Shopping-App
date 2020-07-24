<nav class="sidebar sidebar-offcanvas dynamic-active-class-disabled" id="sidebar">
    <ul class="nav">
        <li class="nav-item ">
            <a class="nav-link" href="{{ url('/dashboard') }}">
                <i class="menu-icon mdi mdi-television"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#basic-ui" aria-controls="basic-ui">
                <i class="menu-icon mdi mdi-table"></i>
                <span class="menu-title">Table UI</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="basic-ui">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/users') }}">Users</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/roles') }}">Roles</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/articles') }}">Articles</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/categories') }}">Article Categories</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item ">
            <a class="nav-link" href="{{ url('/charts/chartjs') }}">
                <i class="menu-icon mdi mdi-chart-line"></i>
                <span class="menu-title">Charts</span>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#user-pages" aria-controls=" user-pages">
                <i class="menu-icon mdi mdi-lock-outline"></i>
                <span class="menu-title">User Pages</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse " id="user-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/users') }}">Register</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/users') }}">Lock Screen</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="https://github.com/albrimpaqarizi/Laravel-Shopping-App" target="_blank">
                <i class="menu-icon mdi mdi-file-outline"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>