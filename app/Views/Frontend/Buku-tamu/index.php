<?= $this->extend('Frontend/Layout/_main'); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><span class="fa-solid fa-book"></span> Buku Tamu</h5>
                <hr style="border: 3px solid green;">
                <div class="d-flex justify-content-end align-items-center gap-1">
                    <button type="button" class="btn btn-dark btn-sm" id="refBtn">
                        <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm btn-tambah">
                        <span class="pc-micon"><i class="fa-solid fa-plus-square"></i> Tambah Data
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card" style="border: 3px solid white;">
            <div class="card-body bg-success" style="padding:5px">
                <h5 class="card-title text-light text-center"><span class="fa-solid fa-users"></span> Pengunjung Hari Ini</h5>
                <hr style="border: 3px solid yellow;">
                <p class="card-text">
                <h2 class="text-light text-center"><?= $pelanggan_hari_ini;?> Orang</h2>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card" style="border: 3px solid white;">
            <div class="card-body bg-danger" style="padding:5px">
                <h5 class="card-title text-light text-center"><span class="fa-solid fa-users"></span> Pengunjung Kemarin</h5>
                <hr style="border: 3px solid yellow;">
                <p class="card-text">
                <h2 class="text-light text-center"><?= $pelanggan_kemarin;?> Orang</h2>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>
<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('js/jquery-3.7.1.min.js'); ?>"></script>

<script>
         $(".btn-tambah").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('program-layanan/buku-tamu/add-data'); ?>",
                dataType: 'json',
                cache: false,
                success: function(response) {
                    $(".view-modal").html(response.data).show();
                    $("#exampleModal").modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        });
</script>
<?= $this->endSection(); ?>