<?php
class HangHoa
{
    function getHangHoa()
    {
        $db = new Connect();

        $select = 'select a.mahh,a.tenhh, a.dongia,a.hinh,a.soluotxem from hanghoa a,loai b where a.maloai = b.maloai ORDER by a.mahh DESC LIMIT 8';
        $result = $db->getList($select);
        return $result;
    }

    function saleHangHoa()
    {
        $db = new Connect();

        $select = 'select a.giamgia,a.mahh,a.tenhh,a.dongia,a.hinh,a.soluotxem from hanghoa a,loai b where a.maloai = b.maloai and a.giamgia > 0 ORDER by a.mahh DESC LIMIT 8';
        $result = $db->getList($select);
        return $result;
    }



    function getHangHoaAll()
    {
        $db = new Connect();

        $select = 'select a.giamgia,a.mahh,a.tenhh,a.dongia,a.hinh,a.soluotxem from hanghoa a, loai b where a.maloai = b.maloai order by a.mahh DESC';
        $result = $db->getList($select);
        return $result;
    }

    function getHangHoaAllSale($start, $limit)
    {
        $db = new Connect();

        $select = "select a.giamgia,a.mahh,a.tenhh,a.dongia,a.hinh,a.soluotxem from hanghoa a, loai b where a.maloai = b.maloai and a.giamgia > 0 order by a.mahh DESC limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }
    function getHangHoaAllPage($start, $limit)
    {
        $db = new Connect();
        $select = "select a.mahh, a.tenhh, a.soluotxem, a.hinh, a.dongia from hanghoa a,loai b WHERE a.maloai = b.maloai ORDER by a.mahh DESC limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function getCountHangHoaAll($start, $limit)
    {
        $db = new Connect();
        $select = "select count(a.mahh) from hanghoa a, loai b WHERE a.maloai=b.maloai and a.giamgia >= 0 ";
        $result = $db->getInstance($select);
        return $result[0];
    }

    function getNhapKhau()
    {
        $db = new Connect();

        $select = "select * from hanghoa a, loai b where a.maloai = 1 and b.maloai = 1 ";
        $result = $db->getList($select);
        return $result;
    }
    function getVN()
    {
        $db = new Connect();

        $select = "select * from hanghoa a, loai b where a.maloai = 2 and b.maloai = 2";
        $result = $db->getList($select);
        return $result;
    }
    function getTL()
    {
        $db = new Connect();

        $select = "select * from hanghoa a, loai b where a.maloai = 3 and b.maloai = 3";
        $result = $db->getList($select);
        return $result;
    }
    function getNB()
    {
        $db = new Connect();

        $select = "select * from hanghoa a, loai b where a.maloai = 8 and b.maloai = 8";
        $result = $db->getList($select);
        return $result;
    }


    // function getProductsPaginated($start, $limit) {
    //     $db = new Connect();
    //     $query = "SELECT * FROM hanghoa LIMIT $start, $limit";
    //     $result = $db->getList($query);
    //     return $result;
    // }

    function getHangHoaId($id)
    {
        $db = new Connect();
        // $select = "select DISTINCT  a.maloai, a.mahh, a.mota, a.tenhh, b.dongia from hanghoa a, cthanghoa b where a.mahh = b.idhanghoa and a.mahh=$id";
        $select = "select DISTINCT b.soluongton, a.maloai, a.mahh, a.mota, a.tenhh, b.dongia, c.tenloai, c.maloai from hanghoa a, cthanghoa b, loai c where a.mahh = b.idhanghoa and a.maloai = c.maloai and a.mahh=$id";
        $result = $db->getInstance($select);
        return $result;
    }

    function getHangHoaHinh($id)
    {
        $db = new Connect();
        $select = "SELECT a.hinh from hanghoa a where a.mahh = $id";
        $result = $db->getList($select);
        return $result;
    }

    function getOneImage($id)
    {
        $db = new Connect();
        $select = "SELECT a.hinh from hanghoa a where a.mahh = $id";
        $result = $db->getInstance($select);
        return $result;
    }

    // function getNameLoai($id){
    //     $db = new Connect();
    //     $select = "SELECT a.mota from hanghoa a where a.mahh = $id";
    //     $result = $db->getList($select);
    //     return $result;
    // }

    function getHangHoaTenLoai($id)
    {
        $db = new Connect();
        $select = "select a.tenloai from loai a where a.maloai = $id";
        $result = $db->getInstance($select);
        return $result;
    }

    function updateSoluongton($mahh, $newQuantity)
    {
        $db = new Connect();
        $updateQuery = "UPDATE cthanghoa SET soluongton = $newQuantity WHERE idhanghoa = $mahh";
        $result = $db->exec($updateQuery);
        return $result;
    }

    function getProductFromLoai($maloai)
    {
        $db = new Connect();
        $select = '';
        $result = $db->getList($select);
        return $result;
    }

    function selectSearch($tenhh, $start, $limit)
    {
        $db = new Connect();
        $select = "select a.mahh, a.tenhh, a.soluotxem, a.hinh, a.dongia from hanghoa a,loai b WHERE a.maloai = b.maloai and a.tenhh like '%$tenhh%' ORDER by a.mahh DESC limit " . $start . "," . $limit;
        $result = $db->getList($select);
        return $result;
    }

    function increaseViewsCount($mahh)
    {
        $db = new Connect();
        $updateQuery = "UPDATE hanghoa SET soluotxem = soluotxem + 1 WHERE mahh = $mahh";
        $result = $db->exec($updateQuery);
        return $result;
    }
    

}
?>