<?php
ob_start();
session_start();
    if(!isset($_SESSION['id_user']) || ($_SESSION['id_user'] != '1'))  header('location: ./login.php'); 
    
    include("./model/dashboard.php");
    include("./model/connectdb.php");
    $conn = connectdb();
    $totalBookCount = getTotalBookCount($conn);
    $totalReaders = getTotalReaders($conn);
    $totalMuonSach = getTotalMuonSach($conn);
    $totalTraSach = getTotalTraSach($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Danh Mục</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../mvc/view/admin/css/header.css">
    <link rel="stylesheet" href="../mvc/view/admin/css/style.css">
    <link rel="stylesheet" href="../mvc/view/admin/css/dashboard.css">
    <script src="../mvc/view/admin/common/action.js"></script>
</head>
<body>
<?php include "./pages/header.php" ?>
	<div id="app">
        <div class="container wrapper">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Quản Lý Thư Viện</h2>
                </div>
            </div>
        <h5>Bảng điều khiển:</h5>

            <div class="card-wrapper">
                <div class="card card1 ">
                    <a class="card-body card-d" href="/P_QTDL/pages/index.php?act=muonsach">
                        <p class="card-text">Mượn sách</p>
                        <h4 class="card-title"><?=$totalMuonSach?></h4>
                        <p class="card-text">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </div>
                <div class="card card2 ">
                    <a class="card-body card-d" href="/P_QTDL/pages/index.php?act=trasach">
                        <p class="card-text">Trả Sách</p>
                        <h4 class="card-title"><?=$totalTraSach?></h4>
                        <p class="card-text">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </div>
                <div class="card card3 ">
                    <a class="card-body card-d" href="/P_QTDL/pages/index.php?act=khachhang">
                        <p class="card-text">Khách hàng</p>
                        <h4 class="card-title">
                        <?=$totalReaders?>
                        </h4>
                        <p class="card-text">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </div>
                <div class="card card4 ">
                    <a class="card-body card-d" href="/P_QTDL/pages/index.php?act=sach">
                        <p class="card-text">Sách</p>
                        <h4 class="card-title"><?=$totalBookCount?></h4>
                        <p class="card-text">Xem chi tiết <i class="fa-solid fa-arrow-right"></i></p>
                    </a>
                </div>
            </div>

            <h5>Sách mới mượn:</h5>
            <div class="panel-body" style="font-size: 14px">
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
                            <tr>
                                <th width="50px">STT</th>
                                <th>ID Mượn Sách</th>
                                <th>ID Khách</th>
                                <th>ID Sách</th>
                                <th>Số Lượng</th>
                                <th>Ngày Mượn Sách</th>
                                <th>Ngày Trả Sách</th>
                                <th width="50px"></th>
                                <th width="50px"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php 

$conn = connectdb();
$productList = get5_MS($conn);
$index = 0;

if(isset($productList)){
    foreach($productList as $sp){
        echo '
        <tr>
            <td>'.++$index.'</td>
            <td>'.$sp['ID'].'</td>
            <td>'.$sp['Reader_ID'].'</td>
            <td>'.$sp['Book_ID'].'</td>
            <td>'.$sp['soluong'].'</td>
            <td>'.$sp['Borrow_date'].'</td>
            <td>'.$sp['return_date'].'</td>
            <td>
                <a href="./index.php?act=updateMS&id='.$sp['ID'].'"><i class="edit-icon fa-solid fa-pen-to-square text-warning"></i></a>
            </td>
            <td>
                <a href="./index.php?act=deleteMS&id='.$sp['ID'].'"><i class="delete-icon fa-solid fa-trash-can text-danger"></i></a>
            </td>
        </tr>';
    }
}

?>
                    </tbody>
                    </table>
                </div>
        </div>
    </div>

    
</body>
</html>