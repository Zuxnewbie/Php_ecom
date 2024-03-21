<?php
$act = "cthanghoa";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'cthanghoa':
        include_once "./View/cthanghoa.php";
        break;

    case 'cthanghoa_action':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $mahh = $_POST['mahanghoa'];
            $dongia = $_POST['dongia'];
            $slt = $_POST['soluongton'];

            $ct = new Cthanghoa();
            $check = $ct->insertCThanghoa($mahh, $dongia, $slt);
            if ($check !== false) {
                echo '<script>alert("Insert thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
            } else {
                echo '<script>alert("Insert ko thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
            }
        }
        break;
}
?>