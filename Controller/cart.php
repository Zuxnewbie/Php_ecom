<?php
// unset($_SESSION['cart']);
require_once('Model/Cart.php');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

$act = 'cart';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}

switch ($act) {
    case 'cart':
        include_once './View/cart.php';
        break;

    case 'cart_action':
        $id = 0;
        $soluong = 0;

        if (isset($_POST['mahh'])) {
            $id = $_POST['mahh'];
            $soluong = $_POST['soluong'];

            echo $id;
            echo $soluong;

            $gh = new Cart();
            $gh->addCart($id, $soluong);


            echo '<script>alert("Thêm vào giỏ hàng thành công");</script>';


            // echo "<meta http-equiv='refresh' content='0;url=./index.php?action=cart'/>";
        }
        break;

    case 'cart_xoa':
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $cart = new Cart();
            $cart->restoreQuantity($id); // Restore quantity first
            unset($_SESSION['cart'][$id]); // Then remove the item from the cart session
            // echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
        }
        break;


    case 'update_gh':
        if (isset($_POST['newqty'])) {
            $newqty = $_POST['newqty'];
            foreach ($newqty as $key => $value) {
                if ($_SESSION['cart'][$key]['soluong'] != $value) {
                    $ud = new Cart();
                    $ud->updateHH($key, $value);
                }
            }
        }

        // echo $newqty;
        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
        break;

}
?>