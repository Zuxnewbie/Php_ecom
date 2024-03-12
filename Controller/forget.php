<?php
    $act="forget";
    if(isset($_GET['act']))
    {
        $act=$_GET['act'];
    }
    switch ($act) {
        case 'forget':
            include_once "./View/forgetpassword.php";
            break;
        
        case 'forget_action':
            // nhận email về
            if(isset($_POST['submit_email']))
            {
                $email=$_POST['email'];//huynhhoang2024@gmail.com
                $_SESSION['email']=array();
                // kiểm tra xem email này có tồn tại hay không
                $kh=new User();
                $checkemail=$kh->checkEmail($email)->rowCount();
                if($checkemail>0)
                {
                    // tạo code cấp cho email
                    $code=random_int(10000,100000);
                    // tạo đối tượng
                    $item=array(
                        'id'=>$code,
                        'email'=>$email,
                    );
                    // add vào session
                    $_SESSION['email'][]=$item;
                    // tiến hàng gửi mail
                    $mail = new PHPMailer();
                    $mail->CharSet =  "utf-8";
                    $mail->IsSMTP();
                    // enable SMTP authentication
                    $mail->SMTPAuth = true;                  
                    // GMAIL username to:
                    // $mail->Username = "php22023@gmail.com";//
                    $mail->Username = "phamthevu0201@gmail.com";//
                    // GMAIL password
                    // $mail->Password = "php22023ngoc";
                    $mail->Password = "eyrx ptiz ulkp edng";//Phplytest20@php
                    $mail->SMTPSecure = "tls";  // ssl
                    // sets GMAIL as the SMTP server
                    $mail->Host = "smtp.gmail.com";
                    // set the SMTP port for the GMAIL server
                    $mail->Port = "587";// 465
                    $mail->From='phamthevu0201@gmail.com';
                    $mail->FromName='Vu';
                    // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                    $mail->AddAddress($email, 'reciever_name');
                    $mail->Subject  =  'Reset Password';
                    $mail->IsHTML(true);
                    $mail->Body = 'Need to reset your password?
                                    Use your secret code!          
                                    '.$code.'           
                                    This is new password of you, please ensure do not give this code to anybody that you do not trust.
                                    If you did not forget your password, you can ignore this email.';
                
                    if($mail->Send())
                    {
                        echo '<script> alert("Check Your Email and Click on the link sent to your email");</script>';
                        include "./View/resetpassword.php";
                    }
                    else
                    {
                        echo "Mail Error - >".$mail->ErrorInfo;
                        include "./View/forgetpassword.php";
                    }
                    // include "./View/resetpw.php";
                }
                else
                {
                    echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                    include "./View/forgetpassword.php";
                }
                
            }
            break;
            ///$_SESSION['email]=array('id':59829,email:huynhhoang2024@gmail.com)
            // 59829

        case 'resetpassword':
            if(isset($_POST['submit_password']))
                $pass=$_POST['password'];//59829
                echo $pass;
                foreach ($_SESSION['email'] as $key => $item) {
                    if($item['id']==$pass){
                    // tiến hành update
                    $saltF = 'abc@#';
                    $saltL = 'zyx!%';
                    $passnew = md5($saltF . $pass . $saltL);
                    $emailold = $item['email'];
                    $kh=new User();
                    $kh->updatePassEmail($emailold, $passnew);
                    }
                }
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=log_in"/>';
                
                break;
                
        }

        
?>