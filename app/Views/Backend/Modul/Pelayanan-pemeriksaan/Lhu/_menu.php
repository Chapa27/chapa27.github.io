<?= $this->extend('Backend/Modul/Pelayanan-pemeriksaan/Lhu/index'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<?= $this->endSection(); ?>
<?= $this->section('content_menu'); ?>
    <?php
    use App\Models\LaboratoriumTujuanModel;
    $labTujuan = new LaboratoriumTujuanModel();
    $result = $labTujuan->get_data_by_id_kode_pengantar($kode_pengantar, $id_lab);
    foreach ($result as $row) {
        $id_kat_lab = $row['id_kat_lab'];
        $id_lab = $row['id_laboratorium'];
        $nama_lab = $row['nama_lab'];
        $kode_pengantar = $row['kode_pengantar'];
    }
    switch ($id_kat_lab) {
        case 1:
            $data = [
                'title' => $nama_lab,
                'id_lab' => $id_lab,
                'kode_pengantar' => $kode_pengantar
            ];
            echo view('Backend/Modul/Pelayanan-pemeriksaan/Lhu/Fisika-kimia-air/index', $data);
            break;
        
        default:
            break;
    }

$this->endSection();?>
