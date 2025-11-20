<?= $this->extend('Backend/Modul/Pelayanan-sampel/Lhu/index'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content_menu'); ?>
    <?php
    switch ($id_lab) {
        case 1:
            $data = [
                'title' => 'Fisika kimia air',
                'id_lab' => $id_lab
            ];
            echo view('Backend/Modul/Pelayanan-sampel/Lhu/Fisika-kimia-air/index', $data);
            break;
        case 2:
            $data = [
                'title' => 'Biologi lingkungan'
            ];
            echo view('Backend/Modul/Pelayanan-sampel/Lhu/Biologi-lingkungan/index', $data);
            break;
        
        case 3:
            $data = [
                'title' => 'Udara/UB'
            ];
            echo view('Backend/Modul/Pelayanan-sampel/Lhu/Udara-ub/index', $data);
            break;
        
        default:
            # code...
            break;
    }

$this->endSection();?>
