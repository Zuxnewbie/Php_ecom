<?php 
    $act = "sign_in";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }

    switch ($act) {
        case 'sign_in':
            include_once "./View/registration.php";
            break;
        
        case 'sign_in_action':
            $tenkh = '';
            $diachi = '';
            $sodt = '';
            $user = '';
            $email = '';
            $pass = '';
            if (isset($_POST['submit'])) {
                $tenkh = $_POST['txttenkh'];
                $diachi = $_POST['txtdiachi'];
                $sodt = $_POST['txtsodt'];
                $user = $_POST['txtusername'];
                $email = $_POST['txtemail'];
                $pass = $_POST['txtpass'];
                //SALT
                $saltF = 'abc@#';
                $saltL = 'zyx!%';
                $passnew = md5($saltF.$pass.$saltL);

                $kh = new user();
                $check = $kh->checkKhachHang($user, $email)->rowCount();
                if ($check > 0) {
                    echo "<script> alert('Username & Email Valided')</script>";
                    echo "<meta http-equiv='refresh' content='0;url=./index.php?action=sign_in'/>";
                }else{
                    $iskh = $kh->insertKhachHang($tenkh, $user, $passnew, $email, $diachi, $sodt);
                    if ($iskh !== false) {
                        echo "<script> alert('Registion Successful')</script>";
                        include_once "./View/home.php";
                    }else{
                        echo "<script> alert('Dang ky khong thanh cong ')</script>";
                        echo "<meta http-equiv='refresh' content='0;url=./index.php?action=sign_in'/>";
                    }
                }
            }
            
            break;
    }
?>