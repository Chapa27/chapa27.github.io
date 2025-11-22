<?= $this->extend('Backend/Modul/Pelayanan-pemeriksaan/Lhu/index'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content_menu'); ?>
    <?php
    switch ($id_lab) {
        case 1:
            $data = [
                'title' => 'Fisika kimia air',
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
            ];
            echo view('Backend/Modul/Pelayanan-pemeriksaan/Lhu/Fisika-kimia-air/index', $data);
            break;
        
        default:
            break;
    }

$this->endSection();?>
