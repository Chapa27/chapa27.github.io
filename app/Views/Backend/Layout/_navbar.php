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
                    <a href="<?= base_url('/'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-home"></span></span>
                        <span class="pc-mtext">Home</span>
                    </a>
                </li>
            
                <li class="pc-item pc-caption">
                    <label>Modul Pelayanan Pemeriksaan</label>
                    <i class="ti ti-dashboard"></i>
                </li>
                <!-- <li class="pc-item">
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
                </li> -->
                <li class="pc-item">
                    <a href="<?= base_url('pelayanan-pemeriksaan/pengantar-lhu'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-arrow-right"></span></span>
                        <span class="pc-mtext">Pengantar LHU</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Files</label>
                    <i class="ti ti-file"></i>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="fa-solid fa-arrow-right"></span>
                        <span class="pc-micon">
                        </span>
                        <span class="pc-mtext" data-i18n="Peraturan">Peraturan</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/standar-pelayanan'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Standar Pelayanan</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/tarif-pelayanan'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Tarif Pelayanan</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenkes-no2-2023'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Permenkes No.02 Tahun 2023</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/menlhk-no68-2016'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">MenLHK No. 68 Tahun 2016</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenlh-no11-2025'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">PermenLH No. 11 Tahun 2025</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenlh-no12-2025'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">PermenLH No. 12 Tahun 2025</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/pertek-baku-mutu-limbah-domestik'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Pertek Baku Mutu Limbah Domestik</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenkes-no1096-2011'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Permenkes No.1096 Tahun 2011</span>
                            </a>
                        </li>
                        <li class="pc-item">
                            <a href="<?= base_url('file/reader/permenkes-no7-aami-2019'); ?>" class="pc-link">
                                <span class="pc-micon"><i class="fa-solid fa-file-alt"></i></span>
                                <span class="pc-mtext">Permenkes No.7 Tahun 2019 AAMI</span>
                            </a>
                        </li>
                    </ul>
                <li class="pc-item pc-caption">
                    <label>Master Data</label>
                    <i class="ti ti-databases"></i>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/pelanggan'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
                        <span class="pc-mtext">Pelanggan</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/instalasi'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
                        <span class="pc-mtext">Instalasi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/laboratorium'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
                        <span class="pc-mtext">Laboratorium</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/jenis-sampel'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
                        <span class="pc-mtext">Jenis Sampel</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/biaya-akomodasi'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
                        <span class="pc-mtext">Biaya Akomodasi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/instansi'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
                        <span class="pc-mtext">Instansi</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/peraturan-baku-mutu'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
                        <span class="pc-mtext">Peraturan/Baku Mutu</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/penyakit'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
                        <span class="pc-mtext">Penyakit</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="<?= base_url('master-data/coolbox'); ?>" class="pc-link">
                        <span class="pc-micon"><span class="fa-solid fa-database"></span></span>
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