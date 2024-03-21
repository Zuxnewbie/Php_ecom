<!--header section start -->
<div class="header_section">
  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-orange bg-orange text-white ">
      <div class="logo"><a href="index.php?action=home"><img src="Content/images/logo.png" width="170px"></a></div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav text-center mx-auto fs-20" style="font-size: 20px;">
          <li class="nav-item ">
            <a class="nav-link " href="./index.php?action=home">HOME</a>
          </li>
          <li class="dropdown">
            <a href="" class="nav-link  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">List</a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <?php
              $category = new loaisanpham();
              $list = $category->getLoaiHangHoa();
              while ($set = $list->fetch()):
                ?>
                <a class="dropdown-item" href="./index.php?action=list&act=<?php echo $set['maloai']?>">
                  <?php echo $set['tenloai']; ?>
                </a>
              <?php endwhile; ?>

            </div>
          </li>


          <?php
          if (!isset($_SESSION['makh'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=log_in">Log in</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=sign_in">Sign-in</a>
            </li>
          <?php } ?>

          <?php
          if (isset($_SESSION['makh'])) {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=log_in&act=log_out">Log out</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?action=history">History</a>
            </li>
          <?php } ?>

        </ul>
        <form class="form-inline my-2 my-lg-0 mr-4" method="post">
          <div class="search_icon"><a href="index.php?action=cart"><i class="fa-solid fa-cart-plus"></i></a></div>
        </form>
        <form class="form-inline my-2 my-lg-0" method="post" action="index.php?action=sanpham&act=search">
          <input name="txtsearch" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        </form>


        <?php
        if (isset($_SESSION['makh'])) {
          echo '<li><p style="color: red; margin-top: 20px; margin-left: 0px;">Xin chao ' . $_SESSION['tenkh'] . '</p></li>';
        } else {
          echo '<li><p style="color: red; margin-top: 20px; margin-left: 0px;"></p></li>';
        }
        ?>
      </div>
    </nav>
  </div>
</div>
<!--header section end -->