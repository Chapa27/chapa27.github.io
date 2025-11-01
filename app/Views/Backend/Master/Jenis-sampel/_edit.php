<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-edit"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/jenis-sampel/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jenis-sampel" class="form-label h5">Jenis sampel</label>
                        <input type="text" name="jenis_sampel" value="<?= $items['jenis_sampel']; ?>" class="form-control" id="jenis-sampel">
                        <div class="invalid-feedback errorJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="pnbp" class="form-label h5">PNBP (Rp)</label>
                        <input type="text" name="pnbp" value="<?= $items['pnbp']; ?>" class="form-control" id="pnbp">
                        <div class="invalid-feedback errorPnbp"></div>
                    </div>
                    <div class="mb-3">
                        <label for="id-lab" class="form-label h5">Laboratorium</label>
                        <select name="id_lab" class="form-select" id="id-lab" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterLab as $row) :
                                if ($items['id_lab'] == $row['id']) {
                                    $selected = 'selected';
                                } else {
                                    $selected = '';
                                }
                            ?>
                                <option value="<?= $row['id']; ?>" <?= $selected; ?>><?= $row['nama_lab']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdLab"></div>
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