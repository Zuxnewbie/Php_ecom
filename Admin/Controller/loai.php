<?php
$act = "loai";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'loai':
        include_once "./View/addloaisanpham.php";
        break;
    case 'add_loai';
        if (isset ($_SERVER['REQUEST_METHOD']) == "POST") {
            $maloai = $_POST['maloai'];
            $tenloai = $_POST['tenloai'];

            // đem dữ liệu này lưu vào database
            $hh = new loai();
            $check = $hh->insertLoai($maloai, $tenloai);
            if ($check == true) {
                echo '<script>alert("Thêm dữ liệu thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=hanghoa"/>';
            } else {
                echo '<script>alert("Thêm dữ liệu ko thành công");</script>';
                include_once "./View/addloaisanpham.php";
            }
        }

        break;
    case 'edit_loai';
        include_once "./View/loaisanpham.php";
        break;

    case 'edit_action';
        include_once "./View/edit_loai.php";

        if (isset ($_GET['maloai'])) {
            $maloai = $_GET['maloai'];
            // Get details of the selected loai
            $hh = new loai();
            $kq = $hh->getLoaiSelected($maloai);
            // Now $kq contains the details of the selected loai
            $tenloai = $kq['tenloai'];
        }
        break;

    case 'editted';
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $maloai = $_POST['maloai'];
            $tenloai = $_POST['tenloai'];

            // Update the data in the database
            $hh = new loai();
            $check = $hh->updateLoai($maloai, $tenloai);
            if ($check) {
                echo '<script>alert("Cập nhật loại hàng thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=loai"/>';
            } else {
                echo '<script>alert("Cập nhật loại hàng không thành công");</script>';
                // Handle error if necessary
            }
        }
        break;

    case 'delete_action':
        if (isset ($_GET['maloai'])) {
            $maloai = $_GET['maloai'];
            $hh = new loai();
            $check = $hh->deleteLoai($maloai);
            if ($check) {
                echo '<script>alert("Xoá loại hàng thành công");</script>';
                echo '<meta http-equiv=refresh content="0;url=index.php?action=loai"/>';
            } else {
                echo '<script>alert("Xoá loại hàng không thành công");</script>';
                // Handle error if necessary
            }
        } else {
            echo '<script>alert("Mã loại không được cung cấp");</script>';
            // Redirect or handle error if necessary
        }
        break;
}

?>