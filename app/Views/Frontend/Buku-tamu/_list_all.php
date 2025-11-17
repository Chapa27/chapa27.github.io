<?= $this->extend('Frontend/Layout/_main'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content'); ?>
<div class="row mb-2">
    <div class="col-md-7">
        <form action="<?= base_url('program-layanan/buku-tamu/cari-data-tamu'); ?>" method="post" class="form-data">
            <div class="row">
                <div class="col-md-4">
                    <input type="date" name="tgl_awal" value="<?= $tgl_awal; ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <input type="date" name="tgl_akhir" value="<?= $tgl_akhir; ?>" class="form-control">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-sm" id="cari-data"><span class="fas fa-search"></span> Cari</button>
                    <a href="<?= base_url('program-layanan/buku-tamu/list-all'); ?>" class="btn btn-secondary btn-sm"><span class="fas fa-arrow-circle-left"></span> Kembali</a>
                    <button type="button" class="btn btn-dark btn-sm" id="refBtn">
                        <span class="pc-micon"><i class="fa-solid fa-refresh"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<table id="example" class="table table-hover table-bordered bg-white">
     <thead style="font-family: calibri; size: 12px;">
        <tr>
            <th rowspan="2">No.</th>
            <th rowspan="2">No.antrian</th>
            <th rowspan="2" class="text-center">Tanggal</th>
            <th rowspan="2">Nama</th>
            <th rowspan="2">Instansi</th>
            <th rowspan="2">Keperluan</th>
            <th colspan="2" class="text-center">Jam</th>
            <th colspan="2" class="text-center">Jumlah</th>
            <th rowspan="2">Jenis sampel</th>
        </tr>
        <tr>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Coolbox</th>
            <th>Sampel</th>
        </tr>
     </thead>
     <tbody style="font-family: arial; font-size:13px;">
         <?php $no = 1; foreach ($items as $row) :?>
            <tr>
             <td class="text-center"><?=  $no++; ?></td>
             <td><?= $row['no_antrian'];?></td>
             <td class="text-center"><?= date('d/m/Y', strtotime($row['tanggal']));?></td>
             <td><?= $row['nama'];?></td>
             <td><?= $row['nama_instansi'];?></td>
             <td><?= $row['keperluan'];?></td>
             <td class="text-center"><?= $row['jam_masuk'];?></td>
             <td class="text-center"><?= $row['jam_keluar'];?></td>
             <td class="text-center"><?= $row['jumlah_coolbox'];?></td>
             <td class="text-center"><?= $row['jumlah_sampel'];?></td>
             <td><?= $row['penyakit'];?></td>
         </tr>
        <?php endforeach;?>
     </tbody>
 </table>
<?= $this->endSection(); ?>
<?= $this->section('bottomAssets'); ?>

<script src="<?= base_url('assets/js/plugins/dataTables.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.bootstrap5.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/dataTables.responsive.js'); ?>"></script>
<script>
     $("#refBtn").click(function(e) {
        $(this).html('<span class="fa fa-spin fa-spinner"></span>');
        setTimeout(() => {
           window.location.reload();
        }, 1000);
       
    })
     $(document).ready(function() {
         new DataTable('#example', {
            responsive: true
        });
    })
</script>
<?= $this->endSection(); ?>

