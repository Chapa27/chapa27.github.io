<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-edit"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/biaya-akomodasi/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="uraian" class="form-label h5">Uraian</label>
                        <input type="text" name="uraian" value="<?= $items['uraian'] ?>" class="form-control" id="uraian">
                        <div class="invalid-feedback errorUraian"></div>
                    </div>
                    <div class="mb-3">
                        <label for="transport" class="form-label h5">Transport</label>
                        <input type="text" name="transport" value="<?= $items['transport'] ?>" class="form-control" id="transport">
                        <div class="invalid-feedback errorTransport"></div>
                    </div>
                    <div class="mb-3">
                        <label for="uang-harian" class="form-label h5">Uang harian</label>
                        <input type="text" name="uang_harian" value="<?= $items['uang_harian'] ?>" class="form-control" id="uang-harian">
                        <div class="invalid-feedback errorUangHarian"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-ubah"><span class="fas fa-edit"></span> Ubah</button>
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
                    $('.btn-ubah').html('<span class="fa fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('.btn-ubah').removeAttr('disable');
                    $('.btn-ubah').html('Ubah');
                },
                success: function(response) {
                    if (response.error) {
                        if (response.error.uraian) {
                            $('#uraian').addClass('is-invalid');
                            $('.errorUraian').html(response.error.uraian);
                        } else {
                            $('#uraian').removeClass('is-invalid');
                            $('.errorUraian').html('');
                        }
                        if (response.error.transport) {
                            $('#transport').addClass('is-invalid');
                            $('.errorTransport').html(response.error.transport);
                        } else {
                            $('#transport').removeClass('is-invalid');
                            $('.errorTransport').html('');
                        }
                        if (response.error.uang_harian) {
                            $('#uang-harian').addClass('is-invalid');
                            $('.errorUangHarian').html(response.error.uang_harian);
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