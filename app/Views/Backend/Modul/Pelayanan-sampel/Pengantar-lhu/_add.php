<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan-sampel/pengantar-lhu/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="pelanggan" class="form-label h5">Pelanggan</label>
                        <select name="id_pelanggan" class="form-select" id="pelanggan" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php 
                            foreach ($masterPelanggan as $row) :
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama']; ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorPelanggan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label h5">Tanggal</label>
                        <input type="date" name="tanggal" value="<?= date('Y-m-d'); ?>" class="form-control">
                        <div class="invalid-feedback errorTanggal"></div>
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