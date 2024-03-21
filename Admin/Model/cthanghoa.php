<?php
class Cthanghoa
{
    function insertCThanghoa($mahh, $dongia, $soluongton)
    {
        $db = new connect();
        $query = "INSERT INTO `cthanghoa` (`idhanghoa`,`dongia`,`soluongton`) values ($mahh, $dongia, $soluongton)";
        $result = $db->exec($query);
        return $result;
    }
}
?>