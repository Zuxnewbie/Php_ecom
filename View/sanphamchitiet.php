<script type="text/javascript">
  function chonsize(a) {
    document.getElementById("size").value = a;
  }
  function validateQuantity() {
    var inputQuantity = document.getElementById("soluong").value;
    var maxQuantity = <?php echo $soluongton; ?>;

    if (inputQuantity > maxQuantity) {
      alert("Số lượng không thể lớn hơn " + maxQuantity);
      document.getElementById("soluong").value = maxQuantity;
    }
  }
</script>
<form action="index.php?action=cart&act=cart_action" method="post">
  <section class="py-5">
    <div class="container">
      <div class="row gx-5">
        <?php
        if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $hh = new HangHoa();
          $sp = $hh->getHangHoaId($id);
          $tenhh = $sp['tenhh'];
          $mota = $sp['mota'];
          $dongia = $sp['dongia'];
          $tenloai = $sp['tenloai'];
          $soluongton = $sp['soluongton'];
        }
        $hinh = $hh->getHangHoaHinh($id);
        $set = $hinh->fetch();
        ?>
        <aside class="col-lg-6">
          <div class="border rounded-4 mb-3 d-flex justify-content-center">
            <a data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image" href="">
              <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                src="Content/imagetourdien/<?php echo $set['hinh']; ?>" />
            </a>
          </div>

        </aside>
        <main class="col-lg-6">
          <div class="ps-lg-3">
            <h1 class="title text-primary text-uppercase font-weight-bold ">
              <input type="hidden" name="mahh" value="<?php echo $id; ?>" />
              <?php echo $tenhh ?> <br />
            </h1>
            <div class="d-flex flex-row my-3">
              <div class="text-warning mb-1 me-2">
                <div class="" data-pid="<?=$id?>">
                    Rating: 
                    <?php 
                      // for ($i=1; $i <= 5; $i++) { 
                      //   $img = $i <= $rating ? "star" : "star-blank";
                      //   echo "<img src='Content/imagetourdien/$img.png' style='width:20px; cursor:pointer;' data-set='$i'>"; 
                      // }
                    ?>
                </div>
                
                <!-- <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fas fa-star-half-alt"></i> -->
                <span class="ms-1">
                  4.5
                </span>
              </div>
              <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
              <?php

                // Check if $soluongton is less than or equal to 0
                if ($soluongton <= 0) {
                    // If out of stock, display a message and alert for the customer
                    echo '<span class="text-danger ms-2 ml-3">Out of stock</span>';
                    echo '<script>alert("This product is currently out of stock.");</script>';
                } else {
                    // If in stock, display the "In stock" message
                    echo '<span class="text-success ms-2 ml-3">In stock</span>';
                }
              ?>
            </div>

            <div class="mb-3">
              <span class="h5 text-danger">Giá bán :
                <?php echo number_format($dongia); ?>
              </span>
              <span class="text-muted">/per kilogram</span>
            </div>

            <p>
              <?php echo $mota; ?>
            </p>

            <div class="row">
              <dt class="col-3">Xuat Xu :</dt>
              <dd class="col-9"><?php echo $tenloai; ?></dd>

            </div>

            <hr />

            <div class="row mb-4">

              <!-- col.// -->
              <div class="col-md-4 col-6 mb-3">
                <label class="mb-2 d-block">Quantity/per kilogram</label>
                
                <div class="input-group mb-3" style="width: 100px;">
                  <input class="form-control text-center border border-secondary" type="number" id="soluong"
                    name="soluong" min="1" max="<?php echo $soluongton;?>" value="1" size="10" oninput="validateQuantity()"/>

                </div>
              </div>
              <div class="col-md-4">
                <p class="mb-2 d-block text-info">Available: <?php echo $soluongton;?></p>
              </div>
            </div>
            <!-- <a href="#" class="btn btn-warning shadow-0"> Buy now </a> -->
            <?php
              // Assuming $soluongton is available as a variable in your code

              // Check if $soluongton is less than or equal to 0
              if ($soluongton <= 0) {
                  echo '<button type="submit" name="submit" class="btn btn-primary shadow-0" disabled>
                            <i class="me-1 fa fa-shopping-basket"></i> Add to cart</button>';
              } else {
                  echo '<button type="submit" name="submit" class="btn btn-primary shadow-0">
                            <i class="me-1 fa fa-shopping-basket"></i> Add to cart</button>';
              }
            ?>
          </div>
        </main>
      </div>
    </div>
  </section>
</form>

<!-- comment -->
<div class="container mt-5">
    <!-- Comment Form -->
<?php 
  if (isset($_SESSION['makh'])) {
?>
  <div class="card">
      <div class="card-header">
        Leave a Comment
      </div>
      <div class="card-body">
        <form action="index.php?action=comment" method="post">
          <input type="hidden" name="txtmahh" value="<?php echo $id;?>">
          <div class="form-group">
            <label for="comment">Your Comment:</label>
            <textarea class="form-control" id="comment" rows="3" type="text" name="comment" required></textarea>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Post Comment</button>
        </form>
      </div>
    </div>


    <!-- Display Comments -->
    <div class="mt-4">
      <h5>Comments:</h5>
      <?php 
        $cmt = new Comment();
        $content = $cmt->selectComment($id);
        while($set = $content->fetch()):
      ?>
      <div class="card">
        <div class="card-body">
          <div class="media">
            <img src="https://placekitten.com/50/50" class="mr-3 rounded-circle" alt="User Image">
            <div class="media-body">
              <h5 class="mt-0"><?php echo $set['tenkh']?></h5>
              <?php echo $set['content'];?>
            </div>
          </div>
        </div>
      </div>

      <?php endwhile;?>

      <!-- Additional comments go here... -->

    </div>
    <?php };?>
</div>

