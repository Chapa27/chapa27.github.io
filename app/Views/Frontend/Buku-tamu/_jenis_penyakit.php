<div class="mb-3">
     <label for="jumlah-coolbox" class="form-label h6">Jumlah coolbox</label>
     <input type="number" name="jumlah_coolbox" class="form-control" id="jumlah-coolbox">
     <div class="invalid-feedback errorJumlahCoolbox"></div>
</div>
<div class="mb-3">
  <table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Jumlah sampel</th>
            <th>Jenis sampel</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="dynamicFields">
        <tr>
            <td>
              <select name="id_penyakit" id="id-penyakit" class="form-control">
                <?php
                foreach ($items as $row) :
                    ?>
                    <option value="<?= $row['id'];?>"><?= $row['penyakit'];?></option>
                    <?php
                endforeach;
                ?>
                </select>
            </td>
            <td><input type="number" name="jumlah_sampel" class="form-control" id="jumlah-sampel" min="0" value="0"></td>
            <!-- <td><button type="button" class="btn btn-primary addField">+</button></td> -->
        </tr>
    </tbody>
  </table>
</div>