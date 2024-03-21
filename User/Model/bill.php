<?php 

    class Bill{
        function insertBill($makh){
            $ngay = new DateTime('now');
            $date = $ngay->format('Y-m-d');
            $db = new Connect();

            $query = "insert into hoadon(mshd, makh, date, tongtien) values(null, $makh, '$date', 0)";
            $db->exec($query);

            $select = "select mshd from hoadon order by mshd desc limit 1";
            $mahd = $db->getInstance($select);
            return $mahd[0];
        }

        function insert_Bill_details($mshd, $mahh, $loai, $soluongmua, $thanhtien){
            $db = new Connect();
            $query = "insert into `cthoadon` (`id`, `mshd`, `mahh`, `loai`, `soluongmua`, `thanhtien`, `tinhtrang`) values (NULL, $mshd, $mahh, $loai, $soluongmua, $thanhtien, 0)";
            $db->exec($query);
        }

        function update_total_money($mshd, $makh, $tongtien){
            $db = new Connect();
            $query = "update hoadon set tongtien=$tongtien where mshd=$mshd and makh=$makh";
            $db->exec($query);
        }

        function getInfor_Customer($mshd)
        {
            $db=new connect();
            $select="select b.mshd,b.date, a.tenkh,a.diachi,a.sodienthoai from khachhang a INNER JOIN hoadon b on a.makh=b.makh WHERE mshd=$mshd";
            $result=$db->getInstance($select);
            return $result;
        }
        // phương thức lấy thông tin hàng hóa theo mã số hd

        function getInfor_Product($mshd){
            $db = new Connect();
            $select = "Select distinct a.tenhh, c.loai, b.dongia, c.soluongmua,d.tenloai from hanghoa a, cthanghoa b, cthoadon c, loai d where a.mahh = b.idhanghoa and a.mahh = c.mahh and a.maloai = d.maloai and c.mshd = $mshd";
            $result = $db->getList($select);
            return $result;
        }

        function selectTotalMoney($mshd){
            $db = new Connect();
            $select = "select a.tongtien from hoadon a where a.mshd = $mshd";
            $result = $db->getInstance($select);
            return $result;
        }
    }
    

?>