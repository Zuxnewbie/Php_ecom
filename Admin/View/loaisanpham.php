<div class="container mt-4">
  <div class="page-body">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-block">
            <h4 class="sub-title">QUẢN LÝ LOẠI HÀNG</h4>
            <!-- <form method="post" action="index.php?action=loai&act=edit_action"> -->
              <div class="card-body">
                <table class="table table-striped table">
                  <thead>
                    <tr class="bg-info">
                      <th scope="col"></th>
                      <th scope="col">Mã loại</th>
                      <th scope="col">Tên loại</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    $con = new loai();
                    $hh = $con->getLoai();
                    while ($set = $hh->fetch()):
                    
                  ?>
                    <tr>
                      <th scope="row">
                        <input
                          type="checkbox"
                          id="chonX"
                          name="chonX"
                          value=""
                        />
                      </th>
                      <td><?php echo $set['maloai']?></td>
                      <td><?php echo $set['tenloai']?></td>
                      <td>
                        <a href="index.php?action=loai&act=delete_action&maloai=<?php echo $set['maloai'] ?>" class="btn btn-warning">Xoá</a>
                        <a href="index.php?action=loai&act=edit_action&maloai=<?php echo $set['maloai']; ?>" class="btn btn-info">Sửa</a>

                      </td>
                    </tr>

                    <input type="hidden" name="xoa" value="" />
                  <?php
                    endwhile;
                    ?>
                  </tbody>
                </table>
              </div>
            <!-- </form> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
