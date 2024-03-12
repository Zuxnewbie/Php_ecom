<?php
class Cart
{
    function addCart($mahh, $soluong)
    {
        $sanpham = new HangHoa();

        $sp = $sanpham->getHangHoaId($mahh);
        $tenhh = $sp['tenhh'];
        $dongia = $sp['dongia'];

        // $loai = $l->getHangHoaTenLoai($maloai)
        $tenloai = $sp['tenloai'];
        //so loai
        $maloai = $sp['maloai'];

        $soluongton = $sp['soluongton'];




        //string(20) "Trái cây Thái Lan"

        // $mau = $sanpham->getHangHoaTenMau($mausac);
        // $tenmau = $mau['mausac'];

        $hinh = $sanpham->getOneImage($mahh);
        // echo $hinh;
        $img = $hinh['hinh'];

        // echo $img;
        // echo var_dump($img);


        echo '<pre>';
        // var_dump($tenloai);
        echo '<pre>';
        // var_dump($tenhh);
        var_dump($maloai);
        echo '</pre>';




        $total = $soluong * $dongia;
        $flag = false;

        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['mahh'] == $mahh) {
                $flag = true;
                $soluong += $item['soluong'];
                $this->updateHH($key, $soluong);
            }
        }



        if ($flag == false) {
            //cart chua 1 mon hang --> mon hang la 1 object
            $item = array(
                'mahh' => $mahh,
                'tenhh' => $tenhh,
                'hinh' => $img,
                'tenloai' => $tenloai,
                'soluong' => $soluong,
                'dongia' => $dongia,
                'thanhtien' => $total,
                'maloai' => $maloai,
            );



            //push to cart
            $_SESSION['cart'][] = $item;

        }

        //quantity
        $newQuantity = $soluongton - $soluong;
        $this->updateQuantityInDatabase($mahh, $newQuantity);
    }

    function getSubToTal()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $subtotal += $item['thanhtien'];
        }
        $subtotal = number_format($subtotal);
        return $subtotal;
    }

    function updateHH($index, $soluong)
    {
        if ($soluong <= 0) {
            unset($_SESSION['cart'][$index]);
        } else {
            $_SESSION['cart'][$index]['soluong'] = $soluong;
            $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
            $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
        }

    }
    function updateQuantityInDatabase($mahh, $newQuantity)
    {
        $sanpham = new HangHoa();
        $hanghoa = $sanpham->getHangHoaId($mahh);

        // Assuming 'soluongton' is the field representing the available quantity in your database
        $currentQuantity = $hanghoa['soluongton'];

        // Ensure that the new quantity is not negative
        $newQuantity = max(0, $newQuantity);

        // Update the quantity in the database using an UPDATE query
        $sanpham->updateSoluongton($mahh, $newQuantity);
    }

    function restoreQuantity($id)
    {

        echo "Restore quantity for item with ID: $id";


        $sanpham = new HangHoa();
        $item = $sanpham->getHangHoaId($id);

        if ($item === false) {
            echo "Failed to retrieve item with ID: $id";
        } else {
            echo "Item details: " . print_r($item, true);
        }

        $currentQuantity = $item['soluongton'];
        $cartItem = $_SESSION['cart'][$id];
        $quantityToRemove = $cartItem['soluong'];

        // Restore quantity by adding the removed quantity back to the current quantity
        $newQuantity = $currentQuantity + $quantityToRemove;

        // Update the quantity in the database
        $sanpham->updateSoluongton($id, $newQuantity);

        echo "New quantity after restoration: $newQuantity";
    }

}
?>