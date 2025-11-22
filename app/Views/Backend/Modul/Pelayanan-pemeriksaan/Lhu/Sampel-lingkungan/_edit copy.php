<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-edit"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/jenis-sampel/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <?= var_dump($tems); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jenis-sampel" class="form-label h5" style="font-family: calibri;">Jenis sampel</label>
                        <select name="id_jenis_sampel" class="form-select" id="jenis-sampel" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterJenisSampel as $row) :
                            ?>
                                <option value="<?= $row['id']; ?>" style="font-size: 12px;"><?= $row['jenis_sampel']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi-ambil-sampel" class="form-label h5" style="font-family: calibri;">Lokasi pengambilan sampel</label>
                        <input type="text" name="lokasi_pengambilan_sampel" class="form-control" id="lokasi-ambil-sampel">
                        <div class="invalid-feedback errorLokasiAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl-ambil-sampel" class="form-label h5" style="font-family: calibri;">Tanggal pengambilan sampel</label>
                        <input type="date" name="tgl_jam_pengambilan_sampel" class="form-control" id="tgl-ambil-sampel">
                        <div class="invalid-feedback errorTglAmbilSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="metode-pemeriksaan" class="form-label h5" style="font-family: calibri;">Metode pemeriksaan</label>
                        <input type="text" name="metode_pemeriksaan" class="form-control" id="metode-pemeriksaan">
                        <div class="invalid-feedback errorMetodePemeriksaan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="volume-berat" class="form-label h5" style="font-family: calibri;">Volume/Berat</label>
                        <input type="text" name="volume_berat" class="form-control" id="volume-berat">
                        <div class="invalid-feedback errorVolumeBerat"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-wadah" class="form-label h5" style="font-family: calibri;">Jenis wadah</label>
                        <input type="text" name="jenis_wadah" class="form-control" id="jenis-wadah">
                        <div class="invalid-feedback errorJenisWadah"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jenis-pengawet" class="form-label h5" style="font-family: calibri;">Jenis pengawet</label>
                        <input type="text" name="jenis_pengawet" class="form-control" id="jenis-pengawet">
                        <div class="invalid-feedback errorJenisPengawet"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-ubah"><i class="fas fa-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".form-data").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-ubah').attr('disable', 'disabled');
                    $('.btn-ubah').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-ubah').removeAttr('disable');
                    $('.btn-ubah').html('Ubah');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.error.jenis_sampel) {
                            $('#jenis-sampel').addClass('is-invalid');
                            $('.errorJenisSampel').html(response.error.jenis_sampel);
                        } else {
                            $('#jenis-sampel').removeClass('is-invalid');
                            $('.errorJenisSampel').html('');
                        }

                        if (response.error.pnbp) {
                            $('#pnbp').addClass('is-invalid');
                            $('.errorPnbp').html(response.error.pnbp);
                        } else {
                            $('#pnbp').removeClass('is-invalid');
                            $('.errorPnbp').html('');
                        }

                        if (response.error.id_lab) {
                            $('#id-lab').addClass('is-invalid');
                            $('.errorIdLab').html(response.error.id_lab);
                        } else {
                            $('#id-lab').removeClass('is-invalid');
                            $('.errorIdLab').html('');
                        }

                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success"
                        });

                        $("#exampleModal").modal('hide');
                        listData();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })
    })
</script>