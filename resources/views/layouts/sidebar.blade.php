<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link a">
        <img src="{{asset('assets/img/AdminLTELogo.png')}}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SPSI Indonesia</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link">
                        <i class="nav-icon fas fa-fire"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/user" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            MASTER USER
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('berita')}}" class="nav-link">
                        <i class="nav-icon fas fa-info"></i>
                        <p>
                            MASTER BERITA
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('kegiatan')}}" class="nav-link">
                        <i class="nav-icon fas fa-stream"></i>
                        <p>
                            MASTER KEGIATAN
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('struktur')}}" class="nav-link">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>
                            STRUKTUR SPSI
                        </p>
                    </a>
                </li>

                <hr>

                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link btn btn-danger btn-lg btn-block">
                        <i class="nav-icon fas fa-sign-out-alt" style="color: #fff"></i>
                        <p style="color: #fff">Logout</p>
                    </a>
                </li>
            </ul>


        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
