<?php 
    $act = 'list';
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    include_once "./View/list.php";

?>