        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="beranda">
                <div class="sidebar-brand-icon">
                    <!-- <i class="fas fa-bullhorn"></i> -->
                    <img class="img-profile rounded-circle" width="50px" src="img/dpm.png">
                </div>
                <div class="sidebar-brand-text mx-3">DPM STIS</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                DPM
            </div>

            <!-- Nav Item - Dashboard -->

            <li class="nav-item <?= ($currentURI == 'beranda') ? 'active' : ''; ?>">
                <a class="nav-link" href="beranda">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span>
                </a>
            </li>
            <li class="nav-item <?= ($currentURI == 'profil-dpm') ? 'active' : ''; ?>">
                <a class="nav-link" href="profil-dpm">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Profil DPM</span>
                </a>
            </li>
            <li class="nav-item <?= ($currentURI == 'arsip') ? 'active' : ''; ?>">
                <a class="nav-link" href="arsip">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Arsip Dokumen</span>
                </a>
            </li>
            <li class="nav-item <?= ($currentURI == 'galeri') ? 'active' : ''; ?>">
                <a class="nav-link" href="galeri">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Galeri DPM</span>
                </a>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= ($currentURI == 'aspirasi') ? 'active' : ''; ?>">
                <a class="nav-link" href="aspirasi">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Aspirasi</span>
                </a>
            </li>
            <!-- <li class="nav-item">
                                        <a class="nav-link" href="profile.html">
                                            <i class="fas fa-fw fa-user-edit"></i>
                                            <span>Edit Profile</span>
                                        </a>
                                    </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->