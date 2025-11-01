<script src="<?= base_url('assets/js/plugins/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-font.js'); ?>"></script>
<script src="<?= base_url('assets/js/pcoded.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/feather.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/fontawesome.v6.3.0.all.js'); ?>"></script>
<script src="<?= base_url('js/jquery-3.7.1.min.js'); ?>"></script>

<script>
    layout_change('light');
</script>
<script>
    change_box_container('false');
</script>
<script>
    layout_rtl_change('false');
</script>
<script>
    preset_change("preset-1");
</script>
<script>
    font_change("Public-Sans");
</script>

<script>
    $(document).ready(function() {
        $("#refBtn").click(function() {
            $.ajax({
                cache: false,
                beforeSend: function() {
                    $('#refBtn').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                success: function() {
                    listData();
                    $('#refBtn').html('<i class="fa-solid fa-refresh"></i>');
                }
            })
        })
    })
</script>

<?= $this->renderSection('bottomAssets'); ?>

</body>

</html>