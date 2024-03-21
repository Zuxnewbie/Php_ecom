<?php
class nhanvien{
    function getAdmin($user,$pass)
    {
        $db=new connect();
        $select="select username,password from nhanvien where username='$user' and password='$pass'";
        $result=$db->getInstance($select);
        return $result;
    }

    
}
?>