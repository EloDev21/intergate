<?php
$root = './';
ob_start();
?>

<meta charset="UTF-8"/>
    <!-- edge -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="menu, navigation, animation, transition, transform, rotate, css3, web design, component, icon, slide"/>
    <meta name="author" content="Codrops"/>
    <title><?= $title ?? '' ?></title>
    <link rel="icon" href="<?=$root?>favicon.ico">
    <!--<link href="">css/fontawesome-5.10.2/css/all.css" rel="stylesheet">-->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/toastr.min.css">

    <script src="<?=$root?>js/bootstrap.bundle.min.js"></script>
    <script src="<?=$root?>js/jquery-3.6.0-min.js"></script>
    <script src="<?=$root?>js/jquery-ui.min.js"></script>
    <script src="<?=$root?>js/toastr.min.js"></script>
    <script src="<?=$root?>js/countryCodeToEmojiName.js"></script>

<?php
ob_end_flush();
?>