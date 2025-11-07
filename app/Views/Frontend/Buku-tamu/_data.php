 <table id="example" class="table table-hover table-bordered view-data">
     <thead style="font-family: calibri;">
         <?php
            $arrth = ['No', 'Nama', 'Asal', 'Keperluan', 'Tanggal', ''];
            echo '<tr>';
            foreach ($arrth as $th) :
                echo '<th>' . $th . '</th>';
            endforeach;
            echo '</tr>';
            ?>
     </thead>
     <tbody style="font-family: arial;">
         <tr>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
         </tr>
     </tbody>
 </table>
<script>
     $(document).ready(function() {
         new DataTable('#example', {
            responsive: true
        });
    })
</script>