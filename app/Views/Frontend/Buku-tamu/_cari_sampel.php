
<div class="mb-3">
    <label for="no-telp" class="form-label h6">Jumlah sampel</label>
    <input type="number" name="jumlah_sampel[]" class="form-control" min="0">
</div>
<div class="mb-3">
    <label for="no-telp" class="form-label h6">Jenis penyakit</label>
    <select name="id_penyakit[]" id="" class="form-control">
        <?php
        foreach ($items as $row) :
        ?>
        <option value="<?= $row['id'];?>"><?= $row['penyakit'];?></option>
        <?php
        endforeach;
        ?>
    </select>
</div>

<div class="mb-3">
    <label for="no-telp" class="form-label h6">Jumlah coolbox</label>
    <input type="number" name="jumlah_coolbox[]" class="form-control" min="0">
</div>
<div class="mb-3">
    <label for="no-telp" class="form-label h6">Jumlah sampel</label>
    <input type="number" name="jumlah_sampel[]" class="form-control" min="0">
</div>
<div class="mb-3">
    <label for="no-telp" class="form-label h6">Jenis penyakit</label>
    <select name="id_penyakit[]" id="" class="form-control">
        <?php
        foreach ($items as $row) :
        ?>
        <option value="<?= $row['id'];?>"><?= $row['penyakit'];?></option>
        <?php
        endforeach;
        ?>
    </select>
</div>

