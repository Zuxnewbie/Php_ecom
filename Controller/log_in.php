<?php 
    $act = "log_in";
    if (isset($_GET['act'])) {
        $act = $_GET['act'];
    }

    switch ($act) {
        case 'log_in':
            include_once "./View/login.php";
            break;
        
        case 'log_in_action':
            $user = '';
            $pass = '';
            if (isset($_POST['txtusername']) && isset($_POST['txtpassword'])) {
                $user = $_POST['txtusername'];
                $pass = $_POST['txtpassword'];
                //SALT
                $saltF = 'abc@#';
                $saltL = 'zyx!%';
                $passnew = md5($saltF.$pass.$saltL);
            
                $kh = new user();
                $check = $kh->checkUser($user, $passnew);
                // echo $check;
                // echo $passnew;
                if ($check == true) {
                    $_SESSION['makh'] = $check['makh'];
                    $_SESSION['tenkh'] = $check['tenkh'];
                    
                    // Output for debugging
                    echo "Logged in as: " . $check['tenkh'] . "</br>";
                    echo "User ID: " . $check['makh'];
                    echo $check;

                    echo "<script> alert('Dang nhap Thanh Cong')</script>";
                    echo "<meta http-equiv='refresh' content='0;url=./index.php?action=home'/>";
                    // echo $passnew;
                    // echo $passnew;
                }else{
                    var_dump($check);

                    echo "<script> alert('Dang nhap That bai')</script>";
                    echo "<meta http-equiv='refresh' content='0;url=./index.php?action=log_in'/>";
                    // echo $passnew;
                    // echo "</br>";
                    // echo $check;
                    // echo $passnew;
                }
            }
            
            break;
        case 'log_out':
            unset($_SESSION['makh']);
            unset($_SESSION['tenkh']);
            echo "<meta http-equiv='refresh' content='0;url=./index.php?action=home'/>";
            break;
    }
?>