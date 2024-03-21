<?php
class hanghoa
{
    function getHangHoa()
    {
        $db = new connect();
        $select = "SELECT * FROM hanghoa WHERE dacbiet != 1";
        $result = $db->getList($select);
        return $result;
    }
    //phương thức insert
    function insertHangHoa($tenhh, $dongia, $giamgia, $hinh, $maloai, $mota, $dacbiet, $slx)
    {
        $db = new connect();
        $query = "INSERT INTO `hanghoa` (`mahh`, `tenhh`, `maloai`, `dongia`, `giamgia`, `hinh`, `mota`, `dacbiet`, `soluotxem`)
        VALUES (NULL, '$tenhh', $maloai, $dongia, $giamgia, '$hinh', '$mota', $dacbiet, $slx)";
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

    // function deleteHangHoa($mahh)
    // {
    //     $db = new connect();
    //     $query = "DELETE FROM hanghoa WHERE mahh = $mahh";
    //     $result = $db->exec($query);
    //     return $result;
    // }

    function softDeleteHangHoa($mahh)
    {
        $db = new connect();
        $query = "UPDATE hanghoa SET dacbiet = 1 WHERE mahh = $mahh";
        $result = $db->exec($query);
        return $result;
    }


    function getThongKe()
    {
        $db = new connect();
        $select = "SELECT b.tenhh,sum(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mahh GROUP by b.tenhh";
        $result = $db->getList($select);
        return $result;
    }

    function getSLT()
    {
        $db = new connect();
        $select = "SELECT b.tenhh,sum(a.soluongton)as soluong FROM cthanghoa a,hanghoa b WHERE a.idhanghoa=b.mahh GROUP by b.tenhh";
        $result = $db->getList($select);
        return $result;
    }

    function getMin()
    {
        $db = new connect();
        $select = "SELECT b.tenhh,MIN(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mahh GROUP by b.tenhh";
        $result = $db->getList($select);
        return $result;
    }

    function getMax()
    {
        $db = new connect();
        $select = "SELECT b.tenhh,MAX(a.soluongmua)as soluong FROM cthoadon a,hanghoa b WHERE a.mahh=b.mahh GROUP by b.tenhh";
        $result = $db->getList($select);
        return $result;
    }
}
?>