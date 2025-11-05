<script src="<?= base_url('js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/fontawesome.v6.3.0.all.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/sweetalert2@11.js'); ?>"></script>
<script src="<?= base_url('js/jquery-3.7.1.min.js'); ?>"></script>

<script>
    $(document).ready(function() {

        // $("#refBtn").click(function() {
        //     $.ajax({
        //         beforeSend: function() {
        //             $('#refBtn').html('<i class="fa fa-spin fa-spinner"></i>');
        //         },
        //         success: function() {
        //             listData();
        //             $('#refBtn').html('<i class="fa-solid fa-refresh"></i>');
        //         }
        //     })
        // })

    });
</script>

<?= $this->renderSection('bottomAssets'); ?>
</body>

</html>