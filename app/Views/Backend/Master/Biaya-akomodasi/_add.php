<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/biaya-akomodasi/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="uraian" class="form-label h5">Uraian</label>
                        <input type="text" name="uraian" class="form-control" id="uraian">
                        <div class="invalid-feedback errorUraian"></div>
                    </div>
                    <div class="mb-3">
                        <label for="transport" class="form-label h5">Transport</label>
                        <input type="text" name="transport" class="form-control" id="transport">
                        <div class="invalid-feedback errorTransport"></div>
                    </div>
                    <div class="mb-3">
                        <label for="uang-harian" class="form-label h5">Uang harian</label>
                        <input type="text" name="uang_harian" class="form-control" id="uang-harian">
                        <div class="invalid-feedback errorUangHarian"></div>
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
                        if (err.uraian) {
                            $('#uraian').addClass('is-invalid');
                            $('.errorUraian').html(err.uraian);
                        } else {
                            $('#uraian').removeClass('is-invalid');
                            $('.errorUraian').html('');
                        }

                        if (err.transport) {
                            $('#transport').addClass('is-invalid');
                            $('.errorTransport').html(err.transport);
                        } else {
                            $('#transport').removeClass('is-invalid');
                            $('.errorTransport').html('');
                        }

                        if (err.uang_harian) {
                            $('#uang-harian').addClass('is-invalid');
                            $('.errorUangHarian').html(err.uang_harian);
                        } else {
                            $('#uang-harian').removeClass('is-invalid');
                            $('.errorUangHarian').html('');
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