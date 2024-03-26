<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from htmldemo.net/pustok/pustok/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Mar 2024 13:39:53 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $title ?? 'Book store' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Use Minified Plugins Version For Fast Page Load -->
    <link rel="stylesheet" type="text/css" media="screen" href="<?= BASE_URL ?>/assets/client/css/plugins.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="<?= BASE_URL ?>/assets/client/css/main.css" />
    <link rel="shortcut icon" type="image/x-icon" href="<?= BASE_URL ?>/assets/client/image/favicon.ico">


</head>

<body>
    <div class="site-wrapper" id="top">
        <!-- Header -->
        <?php
        require_once PATH_VIEW . 'layouts/partials/header.php';
        ?>
        <!-- Content -->
        <?php
        require_once PATH_VIEW . $view . '.php';
        ?>
        <!-- Modal -->
        <?php
        require_once PATH_VIEW . 'components/modal.php';
        ?>
        <!-- Brands Slider -->
        <?php
        require_once PATH_VIEW . 'components/brands-slider.php';
        ?>
        <!-- Footer -->
        <?php
        require_once PATH_VIEW . 'layouts/partials/footer.php';
        ?>
        <script src="<?= BASE_URL ?>/assets/client/js/plugins.js"></script>
        <script src="<?= BASE_URL ?>/assets/client/js/ajax-mail.js"></script>
        <script src="<?= BASE_URL ?>/assets/client/js/custom.js"></script>
</body>


<!-- Mirrored from htmldemo.net/pustok/pustok/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Mar 2024 13:40:13 GMT -->

</html>