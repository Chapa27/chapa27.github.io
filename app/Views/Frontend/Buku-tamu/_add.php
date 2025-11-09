<!-- Modal -->
<div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('program-layanan/buku-tamu/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-tamu" class="form-label h6">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama-tamu" autocomplete="off" placeholder="Isi nama ...">
                        <div class="invalid-feedback errorNamaTamu"></div>
                    </div>
                     <div class="mb-3">
                        <label for="nama-pengirim" class="form-label h6">Pengirim</label>
                        <input type="text" name="pengirim" class="form-control" id="nama-pengirim" placeholder="Isi pengirim ...">
                        <div class="invalid-feedback errorNamaPengirim"></div>
                    </div>
                   <div class="mb-3">
                     <label for="nama-daerah" class="form-label h6">Asal</label>
                        <select name="id_daerah" class="form-select" id="nama-daerah" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterDaerah as $row) :
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
                        <select name="id_keperluan" class="form-select" id="id-keperluan" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($masterKeperluan as $row) :
                                ?>
                                <option value="<?= $row['id'];?>"><?= $row['keperluan'];?></option>
                                <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdKeperluan"></div>
                   </div>
                   <div class="mb-3">
                        <label for="no-telp" class="form-label h6">No.Telp/Hp</label>
                        <input type="text" name="no_telepon" class="form-control" id="no-telp" autocomplete="off" placeholder="Isi nomor telepon/hp ...">
                        <div class="invalid-feedback errorNoTelp"></div>
                    </div>
                    <div class="view-jlh-coolbox"></div>
                    <div class="view-keperluan"></div>
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

$(document).ready(function (e) {
    

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
                        if (err.nama) {
                            $('#nama-tamu').addClass('is-invalid');
                            $('.errorNamaTamu').html(err.nama);
                        } else {
                            $('#nama-tamu').removeClass('is-invalid');
                            $('.errorNamaTamu').html('');
                        }
                        if (err.pengirim) {
                            $('#nama-pengirim').addClass('is-invalid');
                            $('.errorNamaPengirim').html(err.pengirim);
                        } else {
                            $('#nama-pengirim').removeClass('is-invalid');
                            $('.errorNamaPengirim').html('');
                        }
                        if (err.id_daerah) {
                            $('#nama-daerah').addClass('is-invalid');
                            $('.errorIdDaerah').html(err.id_daerah);
                        } else {
                            $('#nama-daerah').removeClass('is-invalid');
                            $('.errorIdDaerah').html('');
                        }
                        if (err.id_keperluan) {
                            $('#id-keperluan').addClass('is-invalid');
                            $('.errorIdKeperluan').html(err.id_keperluan);
                        } else {
                            $('#id-keperluan').removeClass('is-invalid');
                            $('.errorIdKeperluan').html('');
                        }
                        if (err.no_telepon) {
                            $('#no-telp').addClass('is-invalid');
                            $('.errorNoTelp').html(err.no_telepon);
                        } else {
                            $('#no-telp').removeClass('is-invalid');
                            $('.errorNoTelp').html('');
                        }
                        if (err.catatan) {
                            $('#catatan').addClass('is-invalid');
                            $('.errorCatatan').html(err.catatan);
                        } else {
                            $('#catatan').removeClass('is-invalid');
                            $('.errorCatatan').html('');
                        }
                        if (err.id_keperluan) {
                            $('#id-keperluan').addClass('is-invalid');
                            $('.errorIdKeperluan').html(err.id_keperluan);
                        } else {
                            $('#id-keperluan').removeClass('is-invalid');
                            $('.errorIdKeperluan').html('');
                        }
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
   
    $('#id-keperluan').change(function (e) {
        e.preventDefault();
        if ($(this).val() == 1) {

            $.ajax({
                type: 'get',
                url: '<?= site_url('program-layanan/buku-tamu/cari-jenis-penyakit'); ?>',
                dataType: 'json',
                success: function(response) {
                    var data = response.data;
                    if (data) {
                        $('.view-keperluan').html(data);
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        }else if ($(this).val() == 2 || $(this).val() == 3) {
            var catatan = `<div class="mb-3">
                        <label for="catatan" class="form-label h6">Catatan</label>
                        <textarea name="catatan" class="form-control" id="catatan"></textarea>
                        <div class="invalid-feedback errorCatatan"></div>
                    </div>`;
            $('.view-keperluan').html(catatan);
        }else{
            exit();
        }
    })

})
   
 
</script>