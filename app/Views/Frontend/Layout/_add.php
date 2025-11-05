<!-- Modal -->
<div class="modal fade" id="modalBukuTamu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('program-layanan/create-buku-tamu'); ?>" class="form-buku-tamu">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-tamu" class="form-label h6">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama-tamu">
                        <div class="invalid-feedback errorNamaTamu"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label h6">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" rows="2"></textarea>
                        <div class="invalid-feedback errorAlamat"></div>
                    </div>
                    <div class="mb-3">
                        <label for="id-daerah" class="form-label h6">Asal</label>
                        <select name="id_daerah" class="form-select" id="id-daerah" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($daerah as $row) :
                                ?>
                                <option value="<?= $row['id'];?>"><?= $row['nama_daerah'];?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdDaerah"></div>
                    </div>
                    <div class="mb-3">
                        <label for="id-keperluan" class="form-label h6">Keperluan</label>
                        <select name="id_keperluan" class="form-select idkeperluan" id="id-keperluan" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($keperluan as $row) :
                                ?>
                                <option value="<?= $row['id'];?>"><?= $row['keperluan'];?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorKeperluan"></div>
                    </div>
                    <div class="mb-3"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-sm btn-simpan"><i class="fas fa-save"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('js/jquery-3.7.1.min.js'); ?>"></script>
<?= $this->endSection(); ?>

<script>
    $(document).ready(function(e) {
        $('#modalBukuTamu .btn-simpan').on('click', function (e) {
            e.preventDefault();
            const nameForm = $('.form-buku-tamu');
             $.ajax({
                type: "post",
                url: nameForm.attr('action'),
                data: nameForm.serialize(),
                dataType: 'json',
                // beforeSend: function() {
                //     $('.btn-simpan').attr('disable', 'disabled');
                //     $('.btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                //     $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
                // },
                // complete: function() {
                //     $('.btn-simpan').removeAttr('disable');
                //     $('.btn-simpan').html('<i class="fas fa-save"></i> Simpan');
                // },
                success: function(response) {
                //    const myObj = JSON.parse(this.responseText);
                //    console.log(response.error);
                    if (response.error) {
                       if (response.error.nama) {
                            $('#nama-tamu').addClass('is-invalid');
                            $('.errorNamaTamu').html(response.error.nama);
                        } else {
                            $('#nama-tamu').removeClass('is-invalid');
                            $('.errorNamaTamu').html('');
                        } 

                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.errorAlamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('.errorAlamat').html('');
                        } 

                        if (response.error.id_keperluan) {
                            $('#id-keperluan').addClass('is-invalid');
                            $('.errorKeperluan').html(response.error.id_keperluan);
                        } else {
                            $('#id-keperluan').removeClass('is-invalid');
                            $('.errorKeperluan').html('');
                        } 

                        if (response.error.id_daerah) {
                            $('#id-daerah').addClass('is-invalid');
                            $('.errorIdDaerah').html(response.error.id_daerah);
                        } else {
                            $('#id-daerah').removeClass('is-invalid');
                            $('.errorIdDaerah').html('');
                        } 
                    }else{
                        
                        // Swal.fire({
                        //     title: "Berhasil",
                        //     text: response.sukses,
                        //     icon: "success"
                        // });

                        // $("#modalBukuTamu").modal('hide');
                        console.log(response.error)
                    }
                    
                    
                }
                // error: function(xhr, ajaxOptions, thrownError) {
                //     alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                // }
            });
        });
      
    });
</script>