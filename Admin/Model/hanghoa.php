<?php
class hanghoa
{
    function getHangHoa()
    {
        $db = new connect();
        $select = "select * from hanghoa";
        $result = $db->getList($select);
        return $result;
    }
    //phương thức insert
    function insertHangHoa($tenhh, $dongia, $giamgia, $maloai, $mota, $dacbiet, $slx)
    {
        $db = new connect();
        $query = "INSERT INTO `hanghoa` (`mahh`, `tenhh`, `maloai`, `dongia`, `giamgia`, `mota`, `dacbiet`, `soluotxem`)
        VALUES (NULL, '$tenhh', $maloai, $dongia, $giamgia, '$mota', $dacbiet, $slx)";
        $result = $db->exec($query);
        return $result;
    }
    // lấy thông tin 1 sản phẩm
    function getHangHoaID($id)
    {
        $db = new connect();
        $select = "select * from hanghoa where mahh=$id";
        $result = $db->getInstance($select);
        return $result;
    }
    // phương thức update $tenhh, $maloai, $dongia, $giamgia,$mota, $dacbiet, $slx 
    function updateHangHoa($mahh, $tenhh, $maloai, $dongia, $giamgia, $mota, $dacbiet, $slx)
    {
        $db = new connect();
        $query = "UPDATE hanghoa 
        SET tenhh = '$tenhh', 
            maloai = $maloai, 
            dongia = $dongia, 
            giamgia = $giamgia, 
            mota = '$mota', 
            dacbiet = $dacbiet, 
            soluotxem = $slx
        WHERE mahh = $mahh
        ";
        $result = $db->exec($query);
        return $result;
    }

    function deleteHangHoa($mahh) {
        $db = new connect();
        $query = "DELETE FROM hanghoa WHERE mahh = $mahh";
        $result = $db->exec($query);
        return $result;
    }
    
}
?>