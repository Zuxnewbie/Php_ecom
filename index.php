<?php
session_start();
include_once "./Model/class.phpmailer.php";
set_include_path(get_include_path() . PATH_SEPARATOR . 'Model/');
spl_autoload_extensions('.php');
spl_autoload_register();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Morning Fruit</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="Content/css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="Content/css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="Content/css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="Content/images/favicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="Content/css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="Content/css/owl.carousel.min.css">
    <link rel="stylesheet" href="Content/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    include_once "./View/header.php"
        ?>
    <!-- hiên thi noi dung -->
    <div class="container">
        <div class="row">
            <!-- hien thi noi dung đây -->
            <?php
            $ctrl = 'home';

            if (isset($_GET['action'])) {
                $ctrl = $_GET['action'];
            }
            
            include_once "./Controller/$ctrl.php"
            ?>
        </div>
    </div>
    <!-- hiên thị footer -->
    <?php
        include_once "./View/footer.php"
    ?>


</body>
<script src="Content/js/jquery.min.js"></script>
<script src="Content/js/popper.min.js"></script>
<script src="Content/js/bootstrap.bundle.min.js"></script>
<script src="Content/js/jquery-3.0.0.min.js"></script>
<script src="Content/js/plugin.js"></script>
<!-- sidebar -->
<script src="Content/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="Content/js/custom.js"></script>
<!-- javascript -->
<script src="Content/js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

</html>