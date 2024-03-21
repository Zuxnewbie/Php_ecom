<?php 
    class loaisanpham{
        function getLoaiHangHoa() {
            //connect data
            $db = new connect();
            $select = "select a.maloai, a.tenloai from loai a";
            $result = $db->getList($select);
            return $result;
        }
    }

?>