<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-4" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close bg-secondary" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('buku-tamu/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-tamu" class="form-label h5">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama-tamu">
                        <div class="invalid-feedback errorNamaTamu"></div>
                    </div>
                    <div class="mb-3">
                        <label for="id-daerah" class="form-label h5">Asal</label>
                        <select name="id_daerah" class="form-select" id="id-daerah" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($daerah as $row) :
                                echo "<option value=" . $row['id'] . ">" . $row['nama_daerah'] . "</option>";
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorIdDaerah"></div>
                    </div>
                    <div class="mb-3">
                        <label for="id-keperluan" class="form-label h5">Keperluan</label>
                        <select name="id_keperluan" class="form-select" id="id-keperluan" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($keperluan as $row) :
                                echo "<option value=" . $row['id'] . ">" . $row['keperluan'] . "</option>";
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorKeperluan"></div>
                    </div>
                    <div class="mb-3 catatan"></div>
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
        $("#id-keperluan").change(function() {
            var id = $(this).val();
            var kunjung = `<label for="catatan" "class="form-label h5"><b>Catatan</b></label>
            <textarea class="form-control" id="catatan" rows="3"></textarea>
            <div class="invalid-feedback errorCatatan"></div>`;
            var jlhsampel = `<label for="jlh-sampel" class="form-label h5">Jumlah sampel</label>
            <input type="text" name="jumlah_sampel" class="form-control" id="jlh-sampel">
            <div class="invalid-feedback errorJlhSampel"></div>`;
            if (id == 3) {
                $(".catatan").html(kunjung);
            } else if (id == 1) {
                $(".catatan").html(jlhsampel);
            } else {
                $(".catatan").html('');
            }
        })
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
                        if (err.id_deaerah) {
                            $('#id-daerah').addClass('is-invalid');
                            $('.errorIdDaerah').html(err.id_deaerah);
                        } else {
                            $('#id-daerah').removeClass('is-invalid');
                            $('.errorIdDaerah').html('');
                        }
                        if (err.id_keperluan) {
                            $('#id-keperluan').addClass('is-invalid');
                            $('.errorKeperluan').html(err.id_keperluan);
                        } else {
                            $('#id-keperluan').removeClass('is-invalid');
                            $('.errorKeperluan').html('');
                        }

                        if (err.catatan) {
                            $('#catatan').addClass('is-invalid');
                            $('.errorCatatan').html(err.catatan);
                        } else {
                            $('#catatan').removeClass('is-invalid');
                            $('.errorCatatan').html('');
                        }

                        if (err.jumlah_sampel) {
                            $('#jlh-sampel').addClass('is-invalid');
                            $('.errorJlhSampel').html(err.jumlah_sampel);
                        } else {
                            $('#jlh-sampel').removeClass('is-invalid');
                            $('.errorJlhSampel').html('');
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