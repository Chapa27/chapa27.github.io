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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Master Data</a></li>
                            <li class="breadcrumb-item"><a href="#"><?= $title; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row p-0">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 style="font-family: calibri;"><span class="pc-micon"><span class="fa-solid fa-list"></span> <?= $title; ?></h4>
                        <?php 
                        foreach ($items as $row) :
                            $kode_pengantar = $row['kode_pengantar'];
                        ?>
                        <table cellpadding="6">
                            <tbody>
                                <tr>
                                    <td class="fw-bold" width="120px;">Kode Pengantar</td>
                                    <td>: <?= $row['kode_pengantar']; ?></td>
                                    <td class="fw-bold">Alamat</td>
                                    <td>: <?= $row['alamat']; ?></td>
                                </tr>
                                 <tr>
                                    <td class="fw-bold" width="100px;">Pelanggan</td>
                                    <td>: <?= $row['nama']; ?></td>
                                    <td class="fw-bold">Tanggal</td>
                                    <td>: <?= date('d/m/Y', strtotime($row['tanggal'])); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <?php endforeach;?>
                    </div>
                    <div class="card-body" style="padding: 4px;">
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
                                    <a class="nav-link navtabs <?= $active ?>" <?= $bg ?> aria-current="page" href="<?= base_url('pelayanan-sampel/setting-lhu/list-menu/'.$kode_pengantar.'/'.$m['id_lab']) ?>"><?= $m['nama_lab'] ?></a>
                                </li>
                                <?php
                            endforeach;
                            ?>
                        </ul>
                        <br> 
                         <?= $this->renderSection('content_menu'); ?> 
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>
