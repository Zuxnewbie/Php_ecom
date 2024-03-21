<?php
$act = "dangnhap";
if (isset ($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/dangnhap.php";
        break;

    case 'dangnhap_action':
        // nhận về, kiểm tra
        // c1: if(isset($_POST['txtusername'])&& isset($_POST['txtpassword']))
        // c2: if(isset($_POST['login']))
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $user = $_POST['txtusername'];
            $pass = $_POST['txtpassword'];
            // đem thông tin này kiểm tra có hay không
            $nv = new nhanvien();
            $check = $nv->getAdmin($user, $pass);
            if ($check !== false) {
                $_SESSION['admin'] = $check['username'];
                echo '<script>alert("Đăng nhập thành công");</script>';
                // echo '<meta http-equiv=refresh content="0;url=index.php?re_password.php"/>';
                include_once "./View/repassword.php";
            } else {
                echo '<script>alert("Đăng nhập ko thành công");</script>';
                include_once "./View/dangnhap.php";
            }
        }
        break;
    case 'log_out':
        session_unset();
        // unset($_SESSION['makh']);
        // unset($_SESSION['tenkh']);
        echo "<meta http-equiv='refresh' content='0;url=index.php?action=dangnhap'/>";
        break;

    case 're_password':

        include_once "./View/repassword.php";
        break;

    case 'password_action':
    $user = $_POST['txtusername'];
    $newPass = $_POST['newpassword'];
    $db = new connect();
    $nv = new nhanvien();

    // Loop until the correct old password is entered
    while (true) {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $oldPass = $_POST['txtpassword'];

            // Check if the username and old password match an existing user
            $check = $nv->getAdmin($user, $oldPass);

            if ($check !== false) {
                // Update the password for the user
                $update = "UPDATE nhanvien SET password = '$newPass' WHERE username = '$user'";
                $db->exec($update);
                echo '<script>alert("Password changed successfully!");</script>';
                break; // Exit the loop if password changed successfully
            } else {
                echo '<script>alert("Incorrect username or password! Please try again.");</script>';
            }
        }
    }
    break;



}

?>