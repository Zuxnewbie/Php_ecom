<?php
$act = "hanghoa";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'hanghoa':
        include_once "./View/hanghoa.php";
        break;

    case 'insert_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case 'insert_action':
        // nhận thông tin
        if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $dacbiet = $_POST['dacbiet'];
            $slx = $_POST['slx'];
            $mota = $_POST['mota'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            // đem dữ liệu này lưu vào database
            $hh = new hanghoa();
            $check = $hh->insertHangHoa($tenhh, $dongia, $giamgia, $maloai, $mota, $dacbiet, $slx);
            if ($check == true) {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
            } else {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }
        }
        break;
    case 'update_hanghoa':
        include_once "./View/edithanghoa.php";
        break;
    case 'update_action':
        if (isset($_SERVER['REQUEST_METHOD']) == "POST") {
            $mahh = $_POST['mahh'];
            $tenhh = $_POST['tenhh'];
            $maloai = $_POST['maloai'];
            $dacbiet = $_POST['dacbiet'];
            $slx = $_POST['slx'];
            // $ngaylap=$_POST['ngaylap'];
            $dongia = $_POST['dongia'];
            $giamgia = $_POST['giamgia'];
            $mota = $_POST['mota'];
            // đem dữ liệu này lưu vào database
            $hh = new hanghoa();
            // $check=$hh->insertHangHoa($tenhh,$maloai,$dacbiet,$slx,$ngaylap,$mota);
            $check = $hh->updateHangHoa($mahh, $tenhh, $maloai, $dongia, $giamgia, $mota, $dacbiet, $slx);
            if ($check !== false) {
                echo '<script>alert("Update dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
            } else {
                echo '<script>alert("UPdate dữ liệu ko thành công");</script>';
                include_once "./View/edithanghoa.php";
            }
        }
        break;
    case 'delete_hanghoa':
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (isset($_POST['mahh'])) {
                $mahh = $_POST['mahh'];
                $hh = new hanghoa();
                $check = $hh->deleteHangHoa($mahh);
                if ($check == true) {
                    echo '<script>alert("Xóa dữ liệu thành công");</script>';
                } else {
                    echo '<script>alert("Xóa dữ liệu không thành công");</script>';
                }
            } else {
                echo '<script>alert("Không có ID sản phẩm để xóa");</script>';
            }
            echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
        }
        break;

}

?>