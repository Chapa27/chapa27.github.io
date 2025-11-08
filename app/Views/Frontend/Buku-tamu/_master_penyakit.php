  <select name="" id="" class="form-control">
    <?php
    foreach ($items as $row) :
       ?>
       <option value="<?= $row['id'];?>"><?= $row['penyakit'];?></option>
       <?php
    endforeach;
    ?>
</select>