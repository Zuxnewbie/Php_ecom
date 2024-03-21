<?php
class History
{
    function selectHistory($makh)
    {
        $db = new Connect();
        $select = "SELECT hd.mshd, hd.date, ct.thanhtien, ct.soluongmua, kh.tenkh, kh.diachi, kh.sodienthoai, hh.tenhh FROM hoadon hd, cthoadon ct, khachhang kh, hanghoa hh WHERE hd.mshd = ct.mshd  and hh.mahh = ct.mahh and kh.makh = $makh ";
        $result = $db->getList($select);
        return $result;
    }
}
?>