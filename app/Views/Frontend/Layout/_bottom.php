<script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/fontawesome.v6.3.0.all.js'); ?>"></script>
<!-- <script src="<?= base_url('assets/js/plugins/sweetalert2@11.js'); ?>"></script> -->
<script src="<?= base_url('js/jquery-3.7.1.min.js'); ?>"></script>

<script>
     $(document).ready(function (e) {
        $(".btn-simpaxn").click(function(e) {
            // e.preventDefault();
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
                    if (response.error) {
                       if (response.error.nama) {
                            $('#nama-tamu').addClass('is-invalid');
                            $('.errorNamaTamu').html(response.error.nama);
                        } else {
                            $('#nama-tamu').removeClass('is-invalid');
                            $('.errorNamaTamu').html('');
                        } 
                    }else{
                        
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success"
                        });

                        $("#modalBukuTamu").modal('hide');
                        listData();
                    }

                    // if (err) {
                    //     if (err.id_deaerah) {
                    //         $('#id-daerah').addClass('is-invalid');
                    //         $('.errorIdDaerah').html(err.id_deaerah);
                    //     } else {
                    //         $('#id-daerah').removeClass('is-invalid');
                    //         $('.errorIdDaerah').html('');
                    //     }
                    //     if (err.id_keperluan) {
                    //         $('#id-keperluan').addClass('is-invalid');
                    //         $('.errorKeperluan').html(err.id_keperluan);
                    //     } else {
                    //         $('#id-keperluan').removeClass('is-invalid');
                    //         $('.errorKeperluan').html('');
                    //     }

                    // } else {
                    //     // Swal.fire({
                    //     //     title: "Berhasil",
                    //     //     text: response.sukses,
                    //     //     icon: "success"
                    //     // });

                    //     // $("#modalBukuTamu").modal('hide');
                    //     // listData();
                    // }

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            });
        });
     });
</script>
<?= $this->renderSection('bottomAssets'); ?>
</body>

</html>