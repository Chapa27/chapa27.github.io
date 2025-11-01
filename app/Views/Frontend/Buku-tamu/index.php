<?= $this->extend('Frontend/Layout/_main'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><span class="fa-solid fa-book"></span> Buku tamu</h5>
                <div class="d-flex justify-content-end align-items-center gap-1">
                    <button type="button" class="btn btn-dark btn-sm" id="refBtn">
                        <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
                    </button>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm btn-tambah">
                        <span class="pc-micon"><i class="fa-solid fa-plus-square"></i> Tambah Data
                    </button>
                </div>
                <hr style="border: 3px solid green;">
                <div class="view-data"></div>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card" style="border: 3px solid white;">
            <div class="card-body bg-success">
                <h5 class="card-title text-light"><span class="fa-solid fa-users"></span> Pengunjung Hari Ini</h5>
                <hr style="border: 3px solid yellow;">
                <p class="card-text">
                <h2 class="text-light text-center">20 Orang</h2>
                </p>
            </div>
        </div>
    </div>
    <div class="col-sm-3">
        <div class="card" style="border: 3px solid white;">
            <div class="card-body bg-danger">
                <h5 class="card-title text-light"><span class="fa-solid fa-users"></span> Pengunjung Kemarin</h5>
                <hr style="border: 3px solid yellow;">
                <p class="card-text">
                <h2 class="text-light text-center">10 Orang</h2>
                </p>
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
            url: "<?= site_url('buku-tamu/list-data'); ?>",
            dataType: 'json',
            success: function(response) {
                $(".view-data").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }
    $(document).ready(function() {
        listData();

        $("#refBtn").click(function() {
            $.ajax({
                cache: false,
                beforeSend: function() {
                    $('#refBtn').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                success: function() {
                    listData();
                    $('#refBtn').html('<i class="fa-solid fa-refresh"></i>');
                }
            })
        })
    })
</script>
<?= $this->endSection(); ?>