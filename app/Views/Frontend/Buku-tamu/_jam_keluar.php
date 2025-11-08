<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-clock"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('program-layanan/buku-tamu/update-jam-keluar'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'];?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama-tamu" class="form-label h3">No. antrian</label>
                        </div>
                        <div class="col-md-1 h3">:</div>
                        <div class="col-md-5 h3"><?= $items['no_urut'];?></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-md btn-jam-keluar"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-md" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(".form-data").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-jam-keluar').attr('disable', 'disabled');
                    $('.btn-jam-keluar').html('<i class="fa fa-spin fa-spinner"></i>');
                    $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-jam-keluar').removeAttr('disable');
                    $('.btn-jam-keluar').html('<i class="fas fa-save"></i> Simpan');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        Swal.fire({
                            title: "Gagal",
                            text: response.error,
                            icon: "danger"
                        });
                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success"
                        });
                        
                        setTimeout(() => {
                        $("#exampleModal").modal('hide');
                            window.location.href = '';
                        }, 1000);

                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })
</script>