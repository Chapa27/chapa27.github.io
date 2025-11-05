<!doctype html>
<html lang="id">

<head>
    <!-- Wajib meta tag -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="<?= base_url('img/bblkm-jakarta.png'); ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css'); ?>">
    <!-- <link rel="stylesheet" href="<?= base_url('assets/fonts/fontawesome.css'); ?>"> -->
    <link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
    <?= $this->renderSection('topAssets'); ?>

    <title><?= $title;?></title>
</head>
<style>
    .navbar {
        background: #2A7B9B;
        background: linear-gradient(90deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%);
    }
</style>

<body class="bg-light">