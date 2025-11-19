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
                    <div class="card-header p-6" style="padding-bottom: 2px;">
                        <h4 style="font-family: calibri;"><span class="pc-micon"><span class="fa-solid fa-list"></span> <?= $title; ?></h4>
                         <?php 
                        foreach ($items as $row) :
                        ?>
                        <table cellpadding="6">
                            <tbody>
                                <tr>
                                    <td class="fw-bold" width="100px;">Kode Pengantar</td>
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
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><?= $m['nama_lab'] ?></a>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <br>
                        <table id="example" class="table table-hover table-bordered">
                            <thead style="font-family: calibri;">
                                <?php
                                $arrth = ['No', 'Kode sampel', 'Jenis sampel', 'Tahun', 'Status', ''];
                                echo '<tr>';
                                foreach ($arrth as $th) :
                                    echo '<th>' . $th . '</th>';
                                endforeach;
                                echo '</tr>';
                                ?>
                            </thead>
                            <tbody style="font-family: arial;">
                            </tbody>
                        </table>
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

<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/plugins/dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.bootstrap5.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.responsive.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/sweetalert2@11.js'); ?>"></script>
<script>
    // function listData() {
    //     $.ajax({
    //         url: "<?= site_url('pelayanan-sampel/pengantar-lhu/list-data'); ?>",
    //         dataType: 'json',
    //         success: function(response) {
    //             $(".view-data").html(response.data);
    //         },
    //         error: function(xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
    //         }
    //     })
    // }


    // $(document).ready(function() {
    //     listData();

    //     $(".btn-tambah").click(function(e) {
    //         e.preventDefault();
    //         $.ajax({
    //             url: "<?= site_url('pelayanan-sampel/pengantar-lhu/add-data'); ?>",
    //             dataType: 'json',
    //             cache: false,
    //             success: function(response) {
    //                 $(".view-modal").html(response.data).show();
    //                 $("#exampleModal").modal('show');
    //             },
    //             error: function(xhr, ajaxOptions, thrownError) {
    //                 alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    //             }
    //         })
    //     })
    // })
</script>
<?= $this->endSection(); ?>