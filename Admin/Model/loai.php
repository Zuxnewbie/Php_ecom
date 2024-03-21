<?php
class loai
{
    function getLoai()
    {
        $db = new connect();
        $select = "select * from loai";
        $result = $db->getList($select);
        return $result;
    }

    function getLoaiSelected($maloai)
    {
        $db = new connect();
        $select = "select * from loai where maloai = $maloai";
        $result = $db->getList($select);
        return $result->fetch();
    }

    function updateLoai($maloai, $tenloai)
    {
        $db = new connect();
        $query = "UPDATE `loai` SET tenloai = '$tenloai' WHERE maloai = $maloai";
        $result = $db->exec($query);
        return $result;
    }

    function insertLoai($maloai, $tenloai)
    {
        $db = new connect();
        $query = "INSERT INTO `loai` (`maloai`, `tenloai`) VALUES ($maloai, '$tenloai')";
        try {
            $result = $db->exec($query);
            return $result;
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) { // 1062 is the MySQL error code for duplicate entry
                // Handle duplicate entry error
                echo '<script>alert("Mã loại đã tồn tại");</script>';
                return false;
            } else {
                // Handle other database errors
                echo '<script>alert("Lỗi: ' . $e->getMessage() . '");</script>';
                return false;
            }
        }
    }

    function deleteLoai($maloai)
    {
        $db = new connect();
        $query = "DELETE FROM `loai` WHERE `maloai` = $maloai";
        $result = $db->exec($query);
        return $result;
    }
}
?>