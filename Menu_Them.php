<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="Menu_Them.css">
    <title>Menu</title>
</head>
<body>
    <?php ob_start(); ?>
    <div class="header">
        <div class="logo"></div>
        <ul class="list">
            <li class="list-item">
                <a href="Trangchinh.php" class="list-item-content">
                    <i class="fas fa-home icon"></i>TRANG CHÍNH
                </a>        
            </li>
            <li class="list-item">
                <a href="Thue_Traphong.php" class="list-item-content">
                    <i class="fas fa-retweet icon"></i>THUÊ - TRẢ PHÒNG
                </a>
            </li>
            <li class="list-item">
                <a href="Datphong.php" class="list-item-content">
                    <i class="fas fa-calendar-alt icon"></i>ĐẶT PHÒNG
                </a>
            </li>
            <li class="list-item">
                <a href="Quanlyhethong.php" class="list-item-content selected">
                    <i class="fas fa-cog icon"></i>QUẢN LÝ HỆ THỐNG
                </a>
            </li>
            <li class="list-item">
                <a href="Taikhoan.php" class="list-item-content">
                    <i class="fas fa-user-circle icon"></i>TÀI KHOẢN
                </a>
            </li>
            <li class="list-item">
                <a href="Login.html" class="list-item-content">
                    <i class="fas fa-sign-out-alt icon"></i>ĐĂNG XUẤT
                </a>
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="container-name">
            <a href="Quanlyhethong.php" class="back">
                <i class="fas fa-arrow-left"></i>
            </a>
            MENU
            <a href="" class="btn-them-moi">
                <i class="fas fa-folder-plus font-size-them-moi"></i>
                Thêm mới
            </a>
        </div>
        <div class="container-content">
            <div class="box-danh-sach">
                <?php
                    include_once("CSDL.php");
                    $sql = "SELECT * FROM `menu`";
                    $rows = DataProvider::ExecuteQuery($sql);
                ?>
                <table class="danh-sach">
                    <tr>
                        <th>Tên menu</th>
                        <th>Loại menu</th>
                        <th>Đơn giá</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($rows)) { ?>
                        <tr>
                            <td><?php echo $row['TenMenu'] ?></td>
                            <td><?php echo $row['LoaiMenu'] ?></td>
                            <td><?php echo $row['DonGia'] ?> đ</td>
                            <td>
                                <a href="Menu_index.php?page_layout=Menu_Chinhsua&id=<?php echo $row['MaMenu']; ?>" style="font-size: 16px; color: #27ae60;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return Del('<?php echo $row['TenMenu']; ?>')" href="Menu_index.php?page_layout=Menu_Xoa&id=<?php echo $row['MaMenu']; ?>" style="font-size: 16px; color: #e74c3c;">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    <script>
                        function Del (name) {
                            return confirm("Bạn có chắc muốn xóa tên menu: " + name + "?");
                        }
                    </script>
                </table>
            </div>
            <div class="box-form">
                <form action="" method="POST" class="form">
                    <div class="header-form">
                        <span class="name-form">THÊM MỚI</span>
                        <input type="submit" name="submit" class="btn-luu" value="Lưu">
                    </div>
                    <div class="form-group">
                        <label class="label-ten-menu">Tên menu:</label>
                        <input type="text" name="ten-menu" class="input-ten-menu">
                    </div>
                    <div class="form-group">
                        <label class="label-loai-menu">Loại menu:</label>
                        <select name="list-loai-menu" id="list-loai-menu">
                            <!-- <option value=""></option> -->
                            <option value="Đồ ăn">Đồ ăn</option>
                            <option value="Đồ uống">Đồ uống</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="label-don-gia">Đơn giá:</label>
                        <input type="number" name="don-gia" class="input-don-gia" autocomplete="off">
                        <span>.000 đ</span>
                    </div>
                    <?php
                        $thong_bao_ten_menu = '';
                        $thong_bao_don_gia = '';
                        $thong_bao_trung_ten_menu = '';

                        $ten_menu = '#';
                        $loai_menu = '#';
                        $don_gia = '#';

                        $kiem_tra = false;

                        if(isset($_POST['submit'])) {
                            $ten_menu = $_POST['ten-menu'];
                            $loai_menu = $_POST['list-loai-menu'];
                            $don_gia = $_POST['don-gia'];

                            if($ten_menu != '' && $don_gia != '') {
                                $sql = "SELECT * FROM `menu` WHERE `TenMenu` like '{$ten_menu}'";
                                $rows = DataProvider::ExecuteQuery($sql);

                                while ($row = mysqli_fetch_array($rows)) {
                                    $kiem_tra = true;
                                }

                                if($kiem_tra == 1) {
                                    $thong_bao_trung_ten_menu = "Tên menu đã tồn tại.";
                                }
                                else {
                                    $don_gia *= 1000;
                                    $sql = "INSERT INTO `menu` (`TenMenu`, `LoaiMenu`, `DonGia`) VALUES ('$ten_menu', '$loai_menu', $don_gia)";
                                    DataProvider::ExecuteQuery($sql);
                                    header('location: Quanlyhethong_Menu.php');    
                                }
                            }
                            else {
                                if($ten_menu === '') $thong_bao_ten_menu = "Vui lòng điền tên menu.";
                                if($don_gia === '') $thong_bao_don_gia = "Vui lòng điền đơn giá.";
                            }
                        }
                    ?>
                    <span class="thong-bao"><?php echo $thong_bao_trung_ten_menu; ?></span>
                    <span class="thong-bao"><?php echo $thong_bao_ten_menu; ?></span>
                    <span class="thong-bao"><?php echo $thong_bao_don_gia; ?></span>
                </form>
            </div>
        </div>
    </div>
</body>
</html>