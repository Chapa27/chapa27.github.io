 <table id="example" class="table table-hover table-bordered view-data">
     <thead style="font-family: calibri;">
         <?php
            $arrth = ['No.urut', 'Nama', 'Asal', 'Keperluan', 'Jam masuk', 'Jam keluar'];
            echo '<tr>';
            foreach ($arrth as $th) :
                echo '<th>' . $th . '</th>';
            endforeach;
            echo '</tr>';
            ?>
     </thead>
     <tbody style="font-family: arial; font-size:13px;">
         <?php $no = 1; foreach ($items as $row) :?>
            <tr id="myId-<?= $row['id']; ?>" data-urut=<?= $no; ?> onclick="pilih(<?= $row['id'];?>)">
             <td class="text-center"><span class="badge bg-success"><?= $row['no_urut'];?></span></td>
             <td><?= $row['nama'];?></td>
             <td><?= $row['nama_daerah'];?></td>
             <td><?= $row['keperluan'];?></td>
             <td><?= $row['jam_masuk'];?></td>
             <td><?= $row['jam_keluar'];?></td>

         </tr>
        <?php endforeach;?>
     </tbody>
 </table>
<script>
    function pilih(id) {
        var myElement = $('#myId-' + id);
         $.ajax({
                url: "<?= site_url('program-layanan/buku-tamu/add-data'); ?>",
                dataType: 'json',
                cache: false,
                success: function(response) {
                    $(".view-modal").html(response.data).show();
                    $("#exampleModal").modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
        })
    }
     $(document).ready(function() {
         new DataTable('#example', {
            responsive: true
        });
    })
</script>