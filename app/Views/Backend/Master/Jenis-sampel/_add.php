<!-- Modal -->
<div class="modal fade" id="addData" tabindex="-1" aria-labelledby="addModalData" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="addModalData" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/jenis-sampel/create-data'); ?>" class="form-add-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="jenis-sampel" class="form-label h5" style="font-family: calibri;">Jenis sampel</label>
                        <input type="text" name="jenis_sampel" class="form-control" id="jenis-sampel">
                        <div class="invalid-feedback errorJenisSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="pnbp" class="form-label h5" style="font-family: calibri;">PNBP (Rp)</label>
                        <input type="text" name="pnbp" class="form-control" id="pnbp">
                        <div class="invalid-feedback errorPnbp"></div>
                    </div>
                    <div class="mb-3">
                        <label for="id-lab" class="form-label h5" style="font-family: calibri;">Laboratorium</label>
                        <select name="id_lab" class="form-select" id="id-lab" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterLab as $row) :
                            ?>
                                <option value="<?= $row['id']; ?>"><?= $row['nama_lab']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdLab"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-simpan"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".form-add-data").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-simpan').attr('disable', 'disabled');
                    $('.btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                    $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-simpan').removeAttr('disable');
                    $('.btn-simpan').html('Simpan');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        if (err.jenis_sampel) {
                            $("#jenis-sampel").addClass('is-invalid');
                            $('.errorJenisSampel').html(err.jenis_sampel);
                        } else {
                            $('#jenis-sampel').removeClass('is-invalid');
                            $('.errorJenisSampel').html('');
                        }
                        if (err.pnbp) {
                            $('#pnbp').addClass('is-invalid');
                            $('.errorPnbp').html(err.pnbp);
                        } else {
                            $('#pnbp').removeClass('is-invalid');
                            $('.errorPnbp').html('');
                        }
                        if (err.id_lab) {
                            $('#id-lab').addClass('is-invalid');
                            $('.errorIdLab').html(err.id_lab);
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

                        $("#addData").modal('hide');
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