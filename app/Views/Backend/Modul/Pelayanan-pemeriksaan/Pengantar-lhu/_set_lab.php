<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan-pemeriksaan/pengantar-lhu/create-setting-lab'); ?>" class="form-data">
                <?= csrf_field();?>
                <div class="modal-body">
                    <div class="mb-3">
                        <table class="table" style="border: 1px solid; padding:10px;">
                            <?php 
                            foreach ($items as $row) :
                            ?>
                            <input type="hidden" name="id_pelanggan" value="<?= $row['id_pelanggan']; ?>">
                            <input type="hidden" name="id_pengantar_lhu" value="<?= $row['id_pengantar']; ?>">  
                            <input type="hidden" name="kode_pengantar" value="<?= $row['kode_pengantar']; ?>">
                            <tr>
                                <td width="130px;">Kode Pengantar</td>
                                <td>:</td>
                                <td><?= $row['kode_pengantar']; ?></td>
                            </tr>
                            <tr>
                                <td>Pelanggan</td>
                                <td>:</td>
                                <td><?= $row['nama']; ?></td>
                            </tr>
                            <?php endforeach;?>
                        </table>
                    </div>
                    <div class="mb-3">
                          <?php 
                            foreach ($masterLab as $l) :
                          ?>
                          <label for="<?= $l['id']; ?>">
                            <input type="checkbox" name="id_laboratorium[]" value="<?= $l['id']; ?>" id="<?= $l['id']; ?>"> <?=  $l['nama_lab'] ?>
                         </label><br>
                          <?php endforeach; ?>
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
        $(".form-data").submit(function(e) {
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
                    $('.btn-simpan').html('<i class="fas fa-save"></i> Simpan');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        if (err.nama_lab) {
                            $('#nama-lab').addClass('is-invalid');
                            $('.errorNamaLab').html(err.nama_lab);
                        } else {
                            $('#nama-lab').removeClass('is-invalid');
                            $('.errorNamaLab').html('');
                        }
                        if (err.lantai) {
                            $('#lantai').addClass('is-invalid');
                            $('.errorLantai').html(err.lantai);
                        } else {
                            $('#lantai').removeClass('is-invalid');
                            $('.errorLantai').html('');
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