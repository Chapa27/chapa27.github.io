<?= $this->extend('Backend/Layout/_main'); ?>

<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="pc-container">
    <div class="pc-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Modul Pelayanan Pemeriksaan</a></li>
                            <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                    <h4 style="font-family: calibri;"><span class="pc-micon"><span class="fa-solid fa-user"></span> Data pelanggan</h4>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <?php foreach ($items as $row) :  
                            $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <div class="row">
                            <div class="col-md-2 fw-bold">Kode pengantar</div>
                            <div class="col-md-4">: <?= $row['kode_pengantar']; ?></div>
                            <div class="col-md-2 fw-bold">Pelanggan</div>
                            <div class="col-md-4">: <?= $row['nama']; ?></div>
                        </div>
                        <div class="row">
                            <div class="col-md-2 fw-bold">Alamat</div>
                            <div class="col-md-4">: <?= $row['alamat']; ?></div>
                            <div class="col-md-2 fw-bold">No.Telepon</div>
                            <div class="col-md-4">: <?= $row['no_telp']; ?></div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="card-body" style="padding: 4px;">
                 <?php 
                    $bg = '';
                    if (!$menu_lab) {
                        ?>
                        <div class="alert alert-danger fw-bold" role="alert">
                            Laboratorim tujuan belum di pilih !
                            <a href="<?= base_url('pelayanan-pemeriksaan/pengantar-lhu'); ?>" class="href"> [Kembali]</a>
                        </div>
                        <?php
                    }else{
                    ?>
                <ul class="nav nav-tabs">
                   <?php
                    foreach ($menu_lab as $m) :
                        if (@$id_lab == $m['id_lab']) {
                            $active = 'active';
                            $bg = 'style="background-color:#effeff; color:#497e89; font-weight:bold;"';
                        }else{
                            $active = '';
                            $bg = '';
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link navtabs <?= $active ?>" <?= $bg ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/'.$m['id_lab']) ?>"><?= $m['nama_lab'] ?></a>
                        </li>
                        <?php
                    endforeach;
                    ?>
                    <li class="nav-item">
                        <a class="nav-link navtabs <?= @$id_lab == 'keterangan' ? 'active' : ''; ?>" <?= @$id_lab == 'keterangan' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/keterangan') ?>">Keterangan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navtabs <?= @$id_lab == 'kondisi_lingkungan' ? 'active' : ''; ?>" <?= @$id_lab == 'kondisi_lingkungan' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/kondisi_lingkungan') ?>">Kondisi lingkungan sekitar sampel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navtabs <?= @$id_lab == 'kaji_ulang_permintaan_kontrak' ? 'active' : ''; ?>" <?= @$id_lab == 'kaji_ulang_permintaan_kontrak' ? $bg : ''; ?> aria-current="page" href="<?= base_url('pelayanan-pemeriksaan/proses-lhu/list-menu/'.strtolower($kode_pengantar).'/kaji_ulang_permintaan_kontrak') ?>">Kaji ulang permintaan & kontrak</a>
                    </li>
                </ul>
                <?php } ?>
                <br> 
                <?= $this->renderSection('content_menu'); ?> 
            </div>
        </div>
    </div>
</div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>
