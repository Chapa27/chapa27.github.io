<!-- [ Top ] start -->
<?= $this->include('Layout/_top'); ?>
<!-- [ Top ] end -->

<!-- [ Sidebar Menu ] start -->
<?= $this->include('Layout/_navbar'); ?>
<!-- [ Sidebar Menu ] end -->

<!-- [ Header Topbar ] start -->
<?= $this->include('Layout/_header'); ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<?= $this->renderSection('content', true); ?>
<!-- [ Main Content ] end -->

<!-- [ Footer ] start -->
<?= $this->include('Layout/_footer'); ?>
<!-- [ Footer ] end -->

<!-- Required Js -->
<?= $this->include('Layout/_bottom'); ?>