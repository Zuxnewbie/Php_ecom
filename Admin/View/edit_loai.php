<div class="container">
    <?php
    if (isset($_GET['maloai'])) {
        $maloai = $_GET['maloai'];
    }
    ?>
    <div class="row col-md-4 col-md-offset-4">
        <form method="post" action="index.php?action=loai&act=editted" >
            <table class="table" style="border: 0px;">
                <tr>
                    <td>Mã loại</td>
                    <td><input type="text" class="form-control" name="maloai" value="<?php echo isset($maloai) ? $maloai : ''; ?>" maxlength="100px"></td>
                </tr>
                <tr>
                    <td>Tên loại</td>
                    <td>
                        <select name="tenloai" class="form-control" style="width:150px;">
                            <?php
                            if (isset($maloai)) {
                                $loai = new loai();
                                $result = $loai->getLoai();
                                while ($set = $result->fetch()) {
                                    $selected = '';
                                    if ($set['maloai'] == $maloai) {
                                        $selected = 'selected';
                                    }
                                    echo '<option value="' . $set['tenloai'] . '" ' . $selected . '>' . $set['tenloai'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" value="submit">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>