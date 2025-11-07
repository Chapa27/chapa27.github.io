 <table id="example" class="table table-hover table-bordered view-data">
     <thead style="font-family: calibri;">
         <?php
            $arrth = ['No', 'No.urut', 'Nama', 'Asal', 'Keperluan', 'Jam masuk', ''];
            echo '<tr>';
            foreach ($arrth as $th) :
                echo '<th>' . $th . '</th>';
            endforeach;
            echo '</tr>';
            ?>
     </thead>
     <tbody style="font-family: arial;">
         <?php $no = 1; foreach ($items as $row) :?>
            <tr>
             <td><?= $no++;?></td>
             <td><?= $row['no_urut'];?></td>
             <td><?= $row['nama'];?></td>
             <td><?= $row['nama_daerah'];?></td>
             <td><?= $row['keperluan'];?></td>
             <td><?= $row['jam_masuk'];?></td>
             <td></td>
         </tr>
        <?php endforeach;?>
     </tbody>
 </table>
<script>
     $(document).ready(function() {
         new DataTable('#example', {
            responsive: true
        });
    })
</script>