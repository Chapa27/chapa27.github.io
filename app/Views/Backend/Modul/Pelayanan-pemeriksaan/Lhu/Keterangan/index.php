<?= $this->extend('Backend/Modul/Pelayanan-pemeriksaan/Lhu/index'); ?>

<?= $this->section('content_keterangan'); ?>
    <!-- [ Main Content ] start -->
        <div class="row p-0">
            <!-- [ sample-page ] start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header p-6" style="padding:0px;">
                        <div class="d-flex justify-content-end align-items-center gap-1">
                            <button type="button" class="btn btn-dark btn-sm" id="refBtn">
                                <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
                            </button>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-sm btn-tambah" data-kode="<?= $kode_pengantar;?>">
                                <span class="pc-micon"><i class="fa-solid fa-plus-square"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="view-data"></div>
                    </div>
                </div>
            </div>
            <!-- [ sample-page ] end -->
        </div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>
