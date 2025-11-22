<table id="example" class="table table-hover table-bordered">
    <tbody style="font-family: arial;">
        <tr>
            <td><b>Keterangan</b></td>
        </tr>
        <?php
        foreach ($items as $row) :
        ?>
        <tr>
            <td style="width: 25%;"><b>Parameter tidak dapat di uji</b></td>
            <td>: <?= $row['paramater_tidak_dapat_di_uji'] ?></td>
        </tr>
         <tr>
            <td><b>Sub kontrak</b></td>
            <td>: <?= $row['sub_kontrak'] ?></td>
        </tr>
        <tr>
            <td><b>Kontrak di ulang</b></td>
            <td>: <?= $row['kontrak_diulang'] ?></td>
        </tr>
        <tr>
            <td><b>Permintaan khusus</b></td>
            <td>: <?= $row['permintaan_khusus'] ?></td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script>
    function editData(id) {
        $.ajax({
            type: 'get',
            url: '<?= site_url('master-data/laboratorium/edit-data/'); ?>' + id,
            dataType: 'json',
            success: function(response) {
                if (response.sukses) {
                    $(".view-modal").html(response.sukses).show();
                    $("#exampleModal").modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }


    function deleteData(id) {
        var myElement = $('#myId-' + id);
        if (myElement.data('urut')) {
            myElement.addClass('bg bg-danger');
        }
        Swal.fire({
            title: "Yakin untuk menghapus data ?",
            text: `No.urut : ` + myElement.data('urut'),
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'delete',
                    url: '<?= site_url('master-data/laboratorium/delete-data/'); ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Hapus Data !",
                                text: response.sukses,
                                icon: "success"
                            });
                            listData();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                    }
                })
            } else {
                myElement.removeClass('bg bg-danger');
            }
        });
    }

    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>