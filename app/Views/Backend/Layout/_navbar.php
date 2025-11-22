<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header bg-teal-100">
            <a href="#" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="<?= base_url('assets/img/logo-bblabkes-jkt.png'); ?>" class="img-fluid" alt="logo" style="height: 55px;">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item">
                    <a href="<?= base_url('home/dashboard'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-home"></i></span>
                        <span class="pc-mtext">Home</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Modul Pelayanan Pemeriksaan</label>
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan-sampel/permintaan'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-arrow-right"></i></span>
                        <span class="pc-mtext">Permintaan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan-sampel/penawaran'); ?>" class="pc-link" onclick="showLoading()">
                        <span class="pc-micon"><i class="fa-solid fa-arrow-right"></i></span>
                        <span class="pc-mtext">Penawaran</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan-sampel/biaya-pengujian-sampel'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-arrow-right"></i></span>
                        <span class="pc-mtext">Biaya pengujian sampel</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan-pemeriksaan/pengantar-lhu'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-arrow-right"></i></span>
                        <span class="pc-mtext">Pengantar LHU</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Master Data</label>
                    <i class="ti ti-databases"></i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/pelanggan'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-database"></i></span>
                        <span class="pc-mtext">Pelanggan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/laboratorium'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-database"></i></span>
                        <span class="pc-mtext">Laboratorium</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/jenis-sampel'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-database"></i></span>
                        <span class="pc-mtext">Jenis Sampel</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/biaya-akomodasi'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-database"></i></span>
                        <span class="pc-mtext">Biaya Akomodasi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/instansi'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-database"></i></span>
                        <span class="pc-mtext">Instansi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/penyakit'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-database"></i></span>
                        <span class="pc-mtext">Penyakit</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/coolbox'); ?>" class="pc-link">
                        <span class="pc-micon"><i class="fa-solid fa-database"></i></span>
                        <span class="pc-mtext">Coolbox</span>
                    </a>
                </li>
            </ul>
            <div class="card text-center">
                <!-- Blank -->
            </div>
        </div>
    </div>
</nav>