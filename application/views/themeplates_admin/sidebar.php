<div class="main-wrapper">
    <div class="navbar navbar-light bg-danger"></div>
    <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
        </form>



        <ul class="navbar-nav navbar-right">
            <div style="position:absolute;z-index:10;">
                <?php if ($this->session->flashdata('success')) { ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?= $this->session->flashdata('success')?>
                </div>


                <!-- <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('error')?>
                        </div> -->

                <?php }?>
            </div>
            <div style="position:absolute;z-index:10">
                <?php if ($this->session->flashdata('error')) { ?>
                <div class="alert alert-success"><i class="far fa-lightbulb"></i>
                    <?php $this->session->flashdata('Data berhasil Di Tambahkan')?></div>

                <!-- <div class="alert alert-success" role="alert">
                            <?= $this->session->flashdata('error')?>
                        </div> -->

                <?php }?>
            </div>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <!-- <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
                    <div class="d-sm-none d-lg-inline-block">Hallo, <?= $pegawai['nama']; ?></div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-title">Jabatan : <strong><?=$pegawai['nama_jabatan']?></div></strong>
                    <div></div>
                    <!-- <a href="features-profile.html" class="dropdown-item has-icon">
                        <i class="far fa-user"></i> Profile
                    </a>
                    <a href="<?= base_url('admin/auth/gantipass'); ?>" class="dropdown-item has-icon">
                        <i class="fas fa-key"></i> Ganti Password
                    </a>
                    <a href="features-settings.html" class="dropdown-item has-icon">
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <div class="dropdown-divider"></div> -->
                    <a href="<?= base_url('auth/logout'); ?>" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
            <div class="sidebar-brand">
                <a href="index.html">Administrator</a>
            </div>


            <div class="sidebar-brand sidebar-brand-sm">
                <a href="index.html"></a>
            </div>
            <ul class="sidebar-menu ">

                <li class="<?= $this->uri->segment(2)=='dashboard'?'active':''
                        ?>"><a class="nav-link" href="<?= base_url('admin/dashboard'); ?>"><i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span></a></li>
                <?php if($this->session->userdata('nama_divisi')=='Human Resource' ||
                $this->session->userdata('nama_role')=='kepala_cabang') :?>
                <li class="menu-header">Data Master</li>

                <li class="dropdown <?= $this->uri->segment(2)=='jabatan'||$this->uri->segment(2)=='divisi'||$this->uri->segment(2)=='pegawai'||$this->uri->segment(2)=='jurusan'?'active':''
                        ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-address-card"></i><span> Pegawai</span> </a>
                    <ul class="dropdown-menu">

                        <li class="<?= $this->uri->segment(2)=='pegawai'?'active':''
                        ?>"><a class="nav-link " href="<?= base_url('admin/pegawai'); ?>"><i class="fas fa-users"></i>
                                <span>Data Pegawai</span></a>
                        </li>


                        <li class="<?= $this->uri->segment(2)=='jurusan'?'active':''
                        ?>"><a class="nav-link " href="<?= base_url('admin/jurusan'); ?>"><i class="fas fa-users"></i>
                                <span>Data Jurusan</span></a>
                        </li>
                        <li class="<?= $this->uri->segment(2)=='jabatan'?'active':''
                        ?>"><a class="nav-link " href="<?= base_url('admin/jabatan'); ?>"><i class="fas fa-users"></i>
                                <span>Data Jabatan</span></a>
                        </li>
                        <li class="<?= $this->uri->segment(2)=='divisi'?'active':''
                        ?>"><a class="nav-link " href="<?= base_url('admin/divisi'); ?>"><i class="fas fa-users"></i>
                                <span>Data Divisi</span></a>
                        </li>

                    </ul>
                </li>
                <?php endif ?>
                <?php if($this->session->userdata('nama_divisi')=='Accounting'): ?>
                <li class="dropdown <?= $this->uri->segment(2)=='akun'||$this->uri->segment(2)=='kas'||$this->uri->segment(2)=='kas_kecil'?'active':''
                        ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-balance-scale"></i><span>
                            Akutansi</span></a>
                    <ul class="dropdown-menu">
                        <li class="<?= $this->uri->segment(2)=='akun'?'active':''
                        ?>"><a href="<?=base_url('admin/akun')?>" class="nav-link"><i class="fas fa-file-invoice"></i><span>Data Akun</span></a></li>
                        <li class="<?= $this->uri->segment(2)=='kas'?'active':''
                        ?>"><a href="<?=base_url('admin/kas')?>" class="nav-link"><i class="fas fa-dollar-sign"></i> <span> Kas Besar</span></a></li>
                        <li><a href="<?=base_url('admin/kas_kecil')?>" class="nav-link"><i class="fas fa-money-check"></i> <span> Kas kecil</span></a>
                        </li>

                    </ul>
                </li>
                <?php endif ?>
                <!-- <li><a class="nav-link" href="<?= base_url('admin/customer'); ?>"><i class="fas fa-users"></i> <span>Data divisi</span></a>
                        </li>
                        <li><a class="nav-link" href="<?= base_url('admin/customer'); ?>"><i class="fas fa-users"></i> <span></span></a>
                        </li> -->
                <li class="menu-header"> Transaksi</li>
                <li class=" dropdown <?= $this->uri->segment(2)=='permintaan'?'active':''
                        ?>">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class=" fas fa-random"></i> <span>Permintaan Kas</span></a>
                    <ul class="dropdown-menu">

                        <!-- <li><a class="nav-link" href="<?= base_url('admin/laporan/dataKas'); ?>"><i class="fas fa-clipboard"></i>
                            <span>Jurnal</span></a>
                    </li> -->
                        <li class="<?= $this->uri->segment(2)=='permintaan'?'active':''
                        ?>"><a class="nav-link" href="<?= base_url('admin/permintaan'); ?>"><i class="fas fa-clipboard"></i>
                                <span> Kas Kecil</span></a>
                        </li>
                    </ul>
                </li>
                <?php if(
                $this->session->userdata('nama_role')=='accounting'): ?>
                <li class="dropdown">
                    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-paste"></i><span>Laporan</span></a>
                    <ul class="dropdown-menu">

                        <li><a href="<?=base_url('admin/laporan')?>" class="nav-link"><i class="fas fa-file-alt"></i><span>Kas</span> </a>
                        </li>
                        <li><a href="<?=base_url('laporan/kas_kecil')?>" class="nav-link"><i class="fas fa-file-alt"></i><span>Kas Kecil</span> </a>
                        </li>
                    </ul>
                </li>
                <?php endif ?>

            </ul>

        </aside>
    </div>
