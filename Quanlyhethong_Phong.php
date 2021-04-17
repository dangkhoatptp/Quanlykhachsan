<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="quanlyhethong_Phong.css">
    <title>Menu</title>
</head>
<body>
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
            PHÒNG
            <a href="Phong_Them.php" class="btn-them-moi">
                <i class="fas fa-folder-plus font-size-them-moi"></i>
                Thêm mới
            </a>
        </div>
        <div class="container-content">
            <div class="box-danh-sach">
                <?php
                    include_once("CSDL.php");
                    $sql = "SELECT `MaPhong`, `TenPhong`, `TenLoaiPhong`, `TenCachTinhTien` 
                    FROM `loaiphong`, `phong`, `cachtinhtien` 
                    WHERE `loaiphong`.`MaLoaiPhong` = `phong`.`MaLoaiPhong` 
                    and `cachtinhtien`.`MaCachTinhTien` = `phong`.`MaCachTinhTien`";
                    $rows = DataProvider::ExecuteQuery($sql);
                ?>
                <table class="danh-sach">
                    <tr>
                        <th>Tên phòng</th>
                        <th>Loại phòng</th>
                        <th>Cách tính tiền</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                    <?php while($row = mysqli_fetch_array($rows)) { ?>
                        <tr>
                            <td><?php echo $row['TenPhong'] ?></td>
                            <td><?php echo $row['TenLoaiPhong'] ?></td>
                            <td><?php echo $row['TenCachTinhTien'] ?></td>
                            <td>
                                <a href="Phong_index.php?page_layout=Phong_Chinhsua&id=<?php echo $row['MaPhong']; ?>" style="font-size: 16px; color: #27ae60;">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a onclick="return Del('<?php echo $row['TenPhong']; ?>')" href="Phong_index.php?page_layout=Phong_Xoa&id=<?php echo $row['MaPhong']; ?>" style="font-size: 16px; color: #e74c3c;">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    <script>
                        function Del (name) {
                            return confirm("Bạn có chắc muốn xóa tên phòng: " + name + "?");
                        }
                    </script>
                </table>
            </div>
            <div class="box-form">

            </div>
        </div>
    </div>
</body>
</html>