<script>
    document.addEventListener("DOMContentLoaded", function () {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const inputField = document.getElementById(targetId);

                inputField.disabled = !inputField.disabled;
                if (!inputField.disabled) {
                    inputField.focus(); // Focus on the input field when enabled
                }
            });
        });
    });
</script>


<section class="vh-100 w-100" style="background-color: #fdccbc;">
    <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) >= 0) { ?>

        <form action="index.php?action=cart&act=update_gh" method="post">
            <div class="container">
                <div class="row d-flex justify-content-center align-items-center ">
                    <div class="col">
                        <p><span class="h2">Shopping Cart </span><span class="h4">(1 item in your cart)</span></p>

                        <?php
                        $j = 0;
                        foreach ($_SESSION['cart'] as $key => $item):
                            $j++;
                            ?>

                            <div class="card mb-4">
                                <div class="card-body p-4">

                                    <div class="row align-items-center">
                                        <div class="col-md-1 d-flex justify-content-center">
                                            <div>
                                                <p class="medium text-muted mb-4 pb-2">ID</p>
                                                <p class="lead fw-normal mb-0 text-center">
                                                    <?php echo $j; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-1">
                                            <img src="Content/imagetourdien/<?php echo $item['hinh']; ?>" class="img-fluid"
                                                alt="Generic placeholder image">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="medium text-muted mb-4 pb-2">Name</p>
                                                <p class="lead fw-normal mb-0 text-center">
                                                    <?php echo $item['tenhh']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-1 d-flex justify-content-center text-center">
                                            <div>
                                                <p class="medium text-muted mb-4 pb-2">Quantity <span class="text-center">( kg
                                                        )</span></p>


                                                <input id="quantity_<?php echo $key; ?>" class="text-center form-control"
                                                    type="text" name="newqty[<?php echo $key; ?>]"
                                                    value="<?php echo $item['soluong'] ?>" disabled />
                                                <!-- <p class="lead fw-normal mb-0 text-center">
                                                     echo $item['soluong'] php here
                                                </p> -->
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="medium text-muted mb-4 pb-2 ">Original</p>
                                                <p class="lead fw-normal mb-0 text-center">
                                                    <?php echo $item['tenloai']; ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="medium text-muted mb-4 pb-2">Price</p>
                                                <p class="lead fw-normal mb-0 text-center">
                                                    <?php echo number_format($item['dongia']); ?>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-center">
                                            <div>
                                                <p class="medium text-muted mb-4 pb-2">Total</p>
                                                <p class="lead fw-normal mb-0 text-center">
                                                    <?php echo number_format($item['thanhtien']); ?>
                                                </p>
                                            </div>
                                        </div>



                                        <div class="col-md-1 d-flex justify-content-center">
                                            <div>
                                                <button class="btn btn-primary btn-sm mb-2 edit-btn"
                                                    data-target="quantity_<?php echo $key; ?>" type="button">Edit</button>
                                                <p class="lead fw-normal mb-0 text-center" hidden>
                                                    <?php echo $item['mahh'] ?>
                                                </p>
                                                <button class="btn btn-danger btn-sm "><a class="text-white"
                                                        href="index.php?action=cart&act=cart_xoa&id=<?php echo $key ?>">Delete</a></button>
                                            </div>
                                        </div>


                                    </div>

                                </div>
                            </div>

                        <?php endforeach; ?>

                        <div class="card mb-5">
                            <div class="card-body p-4">

                                <div class="float-right mr-5">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                        <span class="h3 text-muted me-2">Order total: &nbsp &nbsp </span> <span
                                            class="lead fw-normal">
                                            <?php
                                            $gd = new Cart();
                                            echo $gd->getSubTotal();
                                            ?>
                                        </span>
                                    </p>
                                </div>

                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-end mb-5">
            <button type="button" class="btn btn-light btn-lg me-2"><a href="./index.php?action=home">Continue
                    shopping</a></button>
            <button type="button" class="btn btn-primary btn-lg ml-3"><a
                    href="./index.php?action=payment">Payment</a></button>
        </div>
        <?php
    } else {
        echo "<script> alert('Gio hang chua co hang')</script>";
        // echo "<meta http-equiv='refresh' content='0;url=./index.php?action=home'/>";
    }
    ?>
</section>