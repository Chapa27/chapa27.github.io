<?= $this->extend('Frontend/Layout/_main'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><span class="fa-solid fa-book"></span> Buku Tamu</h5>
                <hr style="border: 2px solid green;">
                <div class="d-flex justify-content-end align-items-center gap-1">
                    <button type="button" class="btn btn-dark btn-sm" id="refBtn">
                        <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm btn-tambah">
                        <span class="pc-micon"><i class="fa-solid fa-plus-square"></i> Tambah Data
                    </button>
                </div>
                <div class="view-data"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-6">
                <div class="card" style="border: 1px solid white;">
                    <div class="card-body bg-success" style="padding:5px">
                        <h6 class="card-title text-light text-center"><span class="fa-solid fa-users"></span> Pengunjung Hari Ini</h6>
                        <hr style="border: 3px solid yellow;">
                        <p class="card-text">
                        <h2 class="text-light text-center"><?= $pelanggan_hari_ini;?> Orang</h2>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" style="border: 1px solid white;">
                    <div class="card-body bg-danger" style="padding:5px">
                        <h6 class="card-title text-light text-center"><span class="fa-solid fa-users"></span> Pengunjung Kemarin</h6>
                        <hr style="border: 3px solid yellow;">
                        <p class="card-text">
                            <h2 class="text-light text-center"><?= $pelanggan_kemarin;?> Orang</h2>
                        </p>
                    </div>
                </div>
            </div>
             <div class="col-sm-12 mt-2">
                <div class="card border-primary mb-3">
                    <div class="card-header">                        
                        <h6 class="card-title text-center"><span class="fa-solid fa-user"></span> Antrian terakhir</h6>
                    </div>
                    <div class="card-body text-primary">
                        <p class="card-text">
                            <h1 class="text-center" style="font-family: monospace;"><?= $antrian_terakhir;?></h1>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="view-modal" style="display: none;"></div>
<?= $this->endSection(); ?>
<?= $this->section('bottomAssets'); ?>

<script src="<?= base_url('assets/js/plugins/dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.bootstrap5.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.responsive.js'); ?>"></script>
<script>
    
    function listData() {
        $.ajax({
            url: "<?= site_url('program-layanan/buku-tamu/list-data'); ?>",
            dataType: 'json',
            success: function(response) {
                $(".view-data").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

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

     $("#refBtn").click(function(e) {
        e.preventDefault();
            $.ajax({
                cache: false,
                beforeSend: function() {
                    $('#refBtn').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                success: function(response) {
                    $('#refBtn').html('<i class="fa-solid fa-refresh"></i>');
                    $('.view-data').load();
                }
            })
    })

     $(document).ready(function() {
        listData();
         new DataTable('#example', {
            responsive: true
        });
    })
</script>
<?= $this->endSection(); ?>