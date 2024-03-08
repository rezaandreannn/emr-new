<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('dashboard') ?>" class="brand-link">
        <img src="<?= base_url('assets/images/logo.png'); ?>" alt="RSUMM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">E-Rekam Medis <span class="badge bg-success" style="font-size: xx-small; position: relative; top: -10px; left: -3px;">versi baru</span></span>

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/AdminLTE/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= full_name($this->session->userdata('user_id'), $this->session->userdata('role_id')) ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($this->uri->uri_string() === 'dashboard') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard</p>
                    </a>
                </li>
      
                <li class="nav-item <?= ($this->uri->segment(1) == 'prwt'  ? 'menu-open' : '') ?>">
                    <a href="#" class="nav-link <?= ($this->uri->segment(1) == 'prwt'  ? 'active' : '') ?>">
                        <i class="nav-icon fas fa-user-nurse"></i>
                        <p>
                            Keperawatan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('prwt/rajal') ?>" class="nav-link <?= ($this->uri->segment(2) == 'rajal'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rawat Jalan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('prwt/bidan') ?>" class="nav-link <?= ($this->uri->segment(2) == 'bidan'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kebidanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('prwt/rencana_op') ?>" class="nav-link  <?= ($this->uri->segment(2) == 'rencana_op'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Transfer Pasien OP</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($this->uri->segment(1) == 'igd'  ? 'menu-open' : '') ?>">
                    <a href="#" class="nav-link <?= ($this->uri->segment(1) == 'igd'  ? 'active' : '') ?>">
                        <i class="nav-icon fas fa-hospital"></i>
                        <p>
                            Layanan IGD
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('igd/medis') ?>" class="nav-link <?= ($this->uri->segment(2) == 'medis'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Assesmen Medis</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('igd/cppt-igd') ?>" class="nav-link <?= ($this->uri->segment(2) == 'cppt-igd'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CPPT IGD</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('igd/skrining-tb') ?>" class="nav-link  <?= ($this->uri->segment(2) == 'skrining-tb'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Skrining TB</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= ($this->uri->segment(1) == 'poliklinik'  ? 'menu-open' : '') ?>">
                    <a href="#" class="nav-link <?= ($this->uri->segment(1) == 'poliklinik'  ? 'active' : '') ?>">
                        <i class="nav-icon fas fa-user-nurse"></i>
                        <p>
                            Medis
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('poliklinik/daftar-pasien') ?>" class="nav-link <?= ($this->uri->segment(2) == 'daftar-pasien'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pemeriksaan Rawat Jalan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?= ($this->uri->segment(1) == 'rm'  ? 'menu-open' : '') ?>">
                    <a href="#" class="nav-link <?= ($this->uri->segment(1) == 'rm'  ? 'active' : '') ?>">
                        <i class="nav-icon fas fa-history"></i>
                        <p>
                            Riwayat Rekam Medis
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('rm/berkas') ?>" class="nav-link <?= ($this->uri->segment(2) == 'berkas'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berkas Rekam Medis</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('rm/berkas_harian') ?>" class="nav-link <?= ($this->uri->segment(2) == 'berkas_harian'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Berkas Rekam Medis Harian</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item <?= ($this->uri->segment(1) == 'fisioterapi'  ? 'menu-open' : '') ?>">
                    <a href="#" class="nav-link <?= ($this->uri->segment(1) == 'fisioterapi'  ? 'active' : '') ?>">
                        <i class="nav-icon fas fa-notes-medical"></i>
                        <p>
                            Fisioterapi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('fisioterapi/list_pasien') ?>" class="nav-link <?= ($this->uri->segment(2) == 'list_pasien'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CPPT Fisioterapi</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('fisioterapi/informed_concent') ?>" class="nav-link <?= ($this->uri->segment(2) == 'informed_concent'  ? 'active' : '') ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Informed Concent</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('ttd/list-ttd') ?>" class="nav-link <?= ($this->uri->uri_string() === 'ttd/list-ttd') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-signature"></i>
                        <p> Tanda Tangan Petugas</p>
                    </a>
                </li>
                <li class="nav-header">ADMINISTRATOR</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-server"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dokter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Grup</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Menu</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan
                        </p>
                    </a>
                </li>
                <li class="nav-header">BRIDGING SATUSEHAT</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-server"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/search/simple.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Location</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Practicioner</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Organization</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/search/enhanced.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Patient</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="pages/widgets.html" class="nav-link">
                        <i class="nav-icon fas fa-heartbeat"></i>
                        <p>
                            Encounter
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>