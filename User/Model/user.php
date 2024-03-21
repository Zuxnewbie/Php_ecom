<?php 
    class user{
        function checkKhachHang($user, $email){
            $db = new Connect();
            $select = "Select a.username, a.email from khachhang a where a.username = '$user' or a.email = '$email'";
            $result = $db->getList($select);
            return $result;
        }

        function insertKhachHang($tenkh, $username, $matkhau, $email, $diachi, $sodienthoai){
            $db = new Connect();
            $query = "INSERT INTO `khachhang` (`makh`, `tenkh`, `username`, `matkhau`, `email`, `diachi`, `sodienthoai`) VALUES (NULL, '$tenkh', '$username', '$matkhau', '$email', '$diachi', '$sodienthoai')";
            $result = $db->exec($query);
            return $result;
        }

        function checkUser($user, $pass){
            $db = new Connect();
            $select = "select a.makh, a.tenkh, a.username, a.matkhau from khachhang a where a.username = '$user' and a.matkhau = '$pass'";
            $result = $db->getInstance($select);
            return $result;
        }

        function checkEmail($email)
        {
            $db=new Connect();
            $select="select * from khachhang a WHERE a.email='$email'";
            $result=$db->getList($select);
            return $result;
        }

        function updatePassEmail($email, $pass){
            $db=new Connect();
            $query="update khachhang set matkhau = '$pass' where email = '$email'";
            $db->exec($query);
        }
    }

?>