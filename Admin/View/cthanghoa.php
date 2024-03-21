<?php 
$mahh = isset($_GET['mahh']) ? $_GET['mahh'] : '';
$dongia = isset($_GET['dongia']) ? $_GET['dongia'] : '';
?>

<div class="container mt-4">
  <div class="page-body">
    <div class="row">
      <div class="col-sm-8">
        <div class="card">
          <div class="card-block">
            <h4 class="sub-title">Quản lý Chi tiết hàng hóa</h4>
            <form method="post" action="index.php?action=cthanghoa&act=cthanghoa_action">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mã Hàng Hóa</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Mã Hàng Hóa" name="mahanghoa"
                    value="<?php echo isset ($mahh) ? $mahh : ''; ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Đơn giá</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Đơn giá" name="dongia"
                    value="<?php echo isset ($dongia) ? $dongia : ''; ?>" />
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Số lượng tồn</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" placeholder="Số lượng tồn" name="soluongton" />
                </div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary">Lưu</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>