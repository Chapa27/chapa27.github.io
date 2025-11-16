 <table id="example" class="table table-hover table-bordered view-data">
     <thead style="font-family: calibri;">
         <?php
            $arrth = ['No.antrian', 'Nama', 'Instansi', 'Keperluan', 'Jam masuk', 'Jam keluar'];
            echo '<tr>';
            foreach ($arrth as $th) :
                echo '<th>' . $th . '</th>';
            endforeach;
            echo '</tr>';
            ?>
     </thead>
     <tbody style="font-family: arial; font-size:13px;">
         <?php $no = 1; foreach ($items as $row) :?>
            <tr id="myId-<?= $row['id']; ?>">
             <td class="text-center">
                <label class="card-title h5 fw-bold" style="font-family: monospace;"><?= $row['no_antrian'];?></label>
             </td>
             <td><?= $row['nama'];?></td>
             <td><?= $row['nama_instansi'];?></td>
             <td><?= $row['keperluan'];?></td>
             <td><?= $row['jam_masuk'];?></td>
             <td class="text-center"><?= $row['jam_keluar'] == null ? '<button class="btn btn-primary btn-sm" onclick="pilih('.$row['id'].');"><span class="fas fa-clock"></span></button>' : $row['jam_keluar'];?></td>
         </tr>
        <?php endforeach;?>
     </tbody>
 </table>
<script>
    function pilih(id) {
         $.ajax({
            type: 'get',
            url: '<?= site_url('program-layanan/buku-tamu/jam-keluar/'); ?>' + id,
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

     $(document).ready(function() {
         new DataTable('#example', {
            responsive: true
        });
    })
</script>