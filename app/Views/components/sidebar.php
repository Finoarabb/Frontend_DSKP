        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand align-items-center justify-content-center" href="home">
                <!-- <div class="sidebar-brand-icon"> -->
                    <!-- <i class="fas fa-bullhorn"></i> -->
                    <!-- <img class="img-profile rounded-circle" width="50px" src="img/logo_bps.png">
                </div> -->
                <div class="sidebar-brand-text mx-3">SIAGENPOS
                    <P style="font-size: 6px;">SISTEM INFORMASI AGENDA DAN DISPOSISI SURAT</P>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading"><img class="img-profile rounded-circle" width="20px" src="img/logo_bps.png">
                BPS Kabupaten Pasuruan
            </div>

            <!-- Nav Item - Dashboard -->

            <li class="nav-item <?= ($currentURI == 'home') ? 'active' : ''; ?>">
                <a class="nav-link" href="home">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li class="nav-item <?= ($currentURI == 'srtmasuk') ? 'active' : ''; ?>">
                <a class="nav-link" href="srtmasuk">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Surat Masuk</span>
                </a>
            </li>
            
            <li class="nav-item <?= ($currentURI == 'srtkeluar') ? 'active' : ''; ?>">
                <a class="nav-link" href="srtkeluar">
                    <i class="fas fa-fw fa-envelope-open"></i>
                    <span>Surat Keluar</span>
                </a>
            </li>
            <?php if($me['role']==='admin'):?>
            <li class="nav-item <?= ($currentURI == 'users') ? 'active' : ''; ?>">
                <a class="nav-link" href="users">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span>
                </a>
            </li>
            <?php endif; ?>
            
            
            <!-- Divider -->
            <hr class="sidebar-divider">
            <?php if(in_array($me['role'],['admin','supervisor','operator','staff'])):?>
            <li class="nav-item <?= ($currentURI == 'dispLetter') ? 'active' : ''; ?>">
                <a class="nav-link" href="dispLetter">
                    <i class="fas fa-fw fa-paper-plane"></i>
                    <span>Disposisi Masuk</span>
                </a>
            </li>
            <?php endif; ?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->