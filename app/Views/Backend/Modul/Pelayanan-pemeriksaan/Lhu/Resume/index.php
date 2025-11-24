<?= $this->extend('Backend/Modul/Pelayanan-pemeriksaan/Lhu/index'); ?>

<?= $this->section('content_menu'); ?>
<div class="d-flex justify-content-end align-items-center gap-1">
<button type="button" class="btn btn-dark btn-sm" id="refBtn">
    <span class="pc-micon"><i class="fa-solid fa-refresh"></i></span>
</button>
<button class="btn btn-info btn-sm" onclick="openWin();">
    <span class="pc-micon"><i class="fa-solid fa-print"></i></span></button>
</div>
<div class="text-center">
    <?php
    foreach ($data_pelanggan as $dp) {
        $nama = $dp['nama'];
        $alamat = $dp['alamat'];
    }

    // lingkungan kondisi sekitar sampel 
    foreach ($result_a as $ra) {
        $kondisi_ling_sampel = $ra['kondisi_lingkungan_sekitar_sampel'];
        $catatan_abnoramalitas = $ra['catatan_abnormalitas'];
    }

    var_dump($menu_lab);

    ?>
    <p><h3><b>PENERIMAAN SAMPEL</b></h3></p><hr style="border: 1px solid;">
</div>
<table class="table table-responsive table-bordered" style="border: 1px solid black; width:100%;">
    <thead>
        <tbody>
            <tr>
                <td width="20%"><b>Asal sampel</b></td>
                <td style="vertical-align: top;"><?= $dp['nama']; ?></td>
                <td width="20%" rowspan="3" style="vertical-align: top;"><b>Kondisi lingkungan sampel</b></td>
                <td style="vertical-align: top;" rowspan="3"><?= $kondisi_ling_sampel; ?></td>
            </tr>
            <tr>
                <td><b>Alamat</b></td>
                <td style="vertical-align: top;"><?= $dp['alamat'] ?></td>
            </tr>
            <tr>
                <td colspan="2" style="vertical-align: top;"><b>Catatan abnormalitas : </b> <?= $ra['catatan_abnormalitas'] ?></td>
            </tr>
            <tr>
                <table width="100%" class="table table-responsive table-bordered" style="border: 1px solid black;">
                    <tbody>
                         <?php
                    // lab tujuan 
                    foreach ($menu_lab as $lab) {
                    ?>
                    <tr>
                            <td colspan="10" style="font-weight: bold; font-family:Arial;">
                                 <?php
                        echo strtoupper($lab['nama_lab']);
?>
                            </td>
                        </tr>
                        <tr style="font-weight:bold; text-align:center;">
                            <td>No.</td>
                            <td>Kode sampel</td>
                            <td>Jenis sampel</td>
                            <td>Lokasi pengambilan sampel</td>
                            <td>Tgl dan jam pengambilan sampel</td>
                            <td>Peraturan baku mutu</td>
                            <td>Metode pemeriksaan</td>
                            <td>Volume/berat</td>
                            <td>Jenis wadah</td>
                            <td>jenis pengawet</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>{empty}</td>
                            <td>{empty}</td>
                            <td>{empty}</td>
                            <td>{empty}</td>
                            <td>{empty}</td>
                            <td>{empty}</td>
                            <td>{empty}</td>
                            <td>{empty}</td>
                            <td>{empty}</td>
                        </tr>
                        
                <?php } ?>
                       
                                <tr>
                                    <table>
                                        <td>
                                            <tbody>
                                            <tr>
                                                <td style="border: 1px solid black;">
                                                    Keterangan : <br>
                                                    Parameter yang tidak dapat di uji : <br>
                                                    Sub kontrak : <br>
                                                    Kontrak diulang : <br>
                                                    Permintaan khusus : <br>
                                                    Kami tidak menjamin kualitas sampel yang tidak sesuai SOP/kriteria penerimaan sampel
                                                </td>
                                                <td>
                                                    <div class="text-center ml-2 bg-danger">
                                                        <p><h3 class="text-white"><b>&nbsp;&nbsp;&nbsp;Tidak Menerima Gratifikasi Dalam Bentuk Apapun</b></h3></p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        </td>
                                    </table>
                                </tr>
                    </tbody>
                </table>
            </tr>
        </tbody>
    </thead>
</table>
<?= $this->endSection(); ?>

<?= $this->section('bottomAssets'); ?>
<script>
    function openWin() {
        var prtContent = document.getElementById("#kodePengantar");
        var WinPrint = window.open('<?= base_url('pelayanan-pemeriksaan/resume/Pakta-integritas') ?>', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
<?= $this->endSection(); ?>