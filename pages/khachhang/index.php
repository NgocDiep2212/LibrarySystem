<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Khách Hàng</title>
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
    <link rel="stylesheet" href="./header.css">
    <script src="../mvc/view/admin/common/action.js"></script>
</head>
<body>
	<div id="app">
        <div class="container wrapper">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center mt-4">Quản Lý Khách Hàng</h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="./index.php?act=addKH">
                            <button class="btn btn-success mb-4">Thêm Khách Hàng</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="font-size: 14px;">
                    <table class="table table-bordered table-hover table-striped ">
                        <thead>
                            <tr>
                                <th width="50px">STT</th>
                                <th>ID Khách Hàng</th>
                                <th>Tên Khách Hàng</th>
                                <th>Loại Khách Hàng</th>
                                <th>Số Điện Thoại</th>
                                <th>Địa Chỉ</th>
                                <th>Ngày cấp thẻ</th>
                                <th>Ngày hết hạn thẻ</th>
                                <th width="50px"></th>
                                <th width="50px"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php 

$conn = connectdb();
$productList = getAll_KH($conn);
$index = 0;
if(isset($productList) && (count($kq) >0)){
    foreach($productList as $sp){
        echo '
        <tr>
            <td>'.++$index.'</td>
            <td>'.$sp['ID'].'</td>
            <td>'.$sp['name'].'</td>';
        if($sp['type'] == 0) echo '<td>Sinh Viên</td>';
        else if($sp['type'] == 1) echo '<td>Giáo viên</td>';    
        else echo '<td>Bên ngoài</td>';    
        echo'
            <td>'.$sp['phone'].'</td>
            <td>'.$sp['address'].'</td>
            <td>'.$sp['issued_date'].'</td>
            <td>'.$sp['expiration_date'].'</td>
            <td>
                <a href="./index.php?act=updateKH&id='.$sp['ID'].'"><i class="edit-icon fa-solid fa-pen-to-square text-warning"></i></a>
            </td>
            <td>
                <a href="./index.php?act=deleteKH&id='.$sp['ID'].'"><i class="delete-icon fa-solid fa-trash-can text-danger"></i></a>
            </td>
        </tr>';
    }
}

?>
                    </tbody>
                    </table>
            <!-- Bai toan phan trang -->
       
                </div>
            </div>
        </div>
    </div>

</body>
</html>