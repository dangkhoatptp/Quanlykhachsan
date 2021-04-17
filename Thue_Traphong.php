<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="Thue_Traphong.css">
    <title>Thuê - Trả phòng</title>
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
                <a href="" class="list-item-content selected">
                    <i class="fas fa-retweet icon"></i>THUÊ - TRẢ PHÒNG
                </a>
            </li>
            <li class="list-item">
                <a href="Datphong.php" class="list-item-content">
                    <i class="fas fa-calendar-alt icon"></i>ĐẶT PHÒNG
                </a>
            </li>
            <li class="list-item">
                <a href="Quanlyhethong.php" class="list-item-content">
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
            <div>
                <span>THUÊ - TRẢ PHÒNG</span>
            </div>
        </div>
        <div class="container-content">
            <div class="content">
                <div class="label">
                    <label for="r1"><i class="fas fa-door-open" style="margin-right: 5px; font-size: 18px; color: #00b894"></i>Phòng chờ</label>
                    <label for="r2"><i class="fas fa-door-closed" style="margin-right: 5px; font-size: 18px; color: #e17055"></i>Phòng đang thuê</label>
                    <label for="r3"><i class="fas fa-broom" style="margin-right: 5px; font-size: 18px; color: #d63031"></i>Phòng cần dọn</label>
                    <label for="r4"><i class="fas fa-history" style="margin-right: 5px; font-size: 18px; color: #2ecc71"></i>Lịch sử</label>
                </div>
                <input type="radio" name="r" id="r1" checked>
                <input type="radio" name="r" id="r2">
                <input type="radio" name="r" id="r3">
                <input type="radio" name="r" id="r4">
                <div class="hightlight"></div>
                <div class="line"></div>
                <div class="slides">
                    <div class="slide-1">
                        <!-- Slide 1 -->
                    </div>
                    <div class="slide-2">
                        Slide 2
                    </div>
                    <div class="slide-3">
                        Slide 3
                    </div>
                    <div class="slide-4">
                        Slide 4
                    </div>
                </div>
            </div>
            <div class="form">

            </div>
        </div>
    </div>
</body>
</html>