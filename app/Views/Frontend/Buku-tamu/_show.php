<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-eye"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('program-layanan/buku-tamu/update-jam-keluar'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="card">
                        <?php foreach ($items as $key) : 
                            $id = $key['id'];
                            $id_keperluan = $key['id_keperluan'];
                        ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Tanggal : </b><?= $key['tanggal']; ?></li>
                            <li class="list-group-item"><b>No.antrian : </b><?= $key['no_antrian']; ?></li>
                            <li class="list-group-item"><b>Nama : </b><?= $key['nama']; ?></li>
                            <li class="list-group-item"><b>Asal instansi : </b><?= $key['nama_instansi']; ?></li>
                            <li class="list-group-item"><b>Keperluan : </b><?= $key['keperluan']; ?></li>
                            <li class="list-group-item"><b>Jam masuk : </b><?= $key['jam_masuk']; ?></li>
                            <li class="list-group-item"><b>Jam keluar : </b><?= $key['jam_keluar']; ?></li>
                        </ul>
                        <?php endforeach;?>
                        <?php 
                        if ($id_keperluan == 1) :
                        ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Jumlah sampel</th>
                                    <th>Penyakit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($sampel as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $row['jumlah_sampel'] ?></td>
                                    <td><?= $row['penyakit'] ?></td>
                                </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                        <?php endif;?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>