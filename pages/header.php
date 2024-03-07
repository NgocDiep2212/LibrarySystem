<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./pages/header.css">
</head>
<body>
        <div class="nav-wrapper">
            <div class="navbar-box bg-info">
                <ul class="nav-items text-light">
                    <li class="user-item">
                        <div class="img-user">
                            <img src="https://luv.vn/wp-content/uploads/2021/07/hinh-anh-trai-de-thuong-23.jpg" alt="">
                        </div>
                        <p>
    <?php 
        $username1 = "";
        if(isset($_SESSION['username'])){
            $username1 = $_SESSION['username'];
            echo $username1;
        }
        
    ?>
                       </p>
                    </li>
                <li class="nav-item text-light ">
                    <i class="fa-solid fa-chart-line"></i>
                    <a class="nav-link text-light" href="/P_QTDL/index.php">Dashboard</a>
                </li>
                <li class="nav-item text-light ">
                    <i class="fas fa-th-list"></i>
                    <a class="nav-link text-light" href="/P_QTDL/pages/index.php?act=muonsach">Mượn Sách</a>
                </li>
                <li class="nav-item text-light">
                    <i class="fas fa-tags"></i>
                    <a class="nav-link text-light" href="/P_QTDL/pages/index.php?act=trasach">Trả Sách</a>
                </li> 
                <li class="nav-item text-light">
                    <i class="fa-solid fa-user-tie"></i>
                    <a class="nav-link text-light" href="/P_QTDL/pages/index.php?act=khachhang">Khách Hàng</a>
                </li>
                <li class="nav-item text-light">
                    <i class="far fa-list-alt"></i>
                    <a class="nav-link text-light" href="/P_QTDL/pages/index.php?act=sach">Sách</a>
                </li>
                <!-- <li class="nav-item text-light">
                    <i class="fas fa-truck"></i>
                    <a class="nav-link text-light " href="/project-php/public/ad_os">Tình Trạng ĐH</a>
                </li> -->
                <li class="nav-item text-light">
                    <i class="fas fa-sign-out-alt"></i>
                    <a class="nav-link text-light" onclick="exituser();" href="#">Thoát</a>
                </li>
            </ul>
            </div>        
        </div>


</body>
</html>
<script>
    function exituser(){
    var option = confirm('Bạn có chắc chắn muốn đăng xuất không?');
        if(!option) return;
        $.post('/P_QTDL/pages/ajax.php',{
            'action': 'exit'
        },function(data){
            location.href = "/P_QTDL/login.php";
        })
    }
</script>