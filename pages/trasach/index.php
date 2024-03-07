<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Trả Sách</title>
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
                    <h2 class="text-center mt-4">Quản Lý Trả Sách</h2>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="./index.php?act=addTS">
                            <button class="btn btn-success mb-4">Thêm Trả Sách</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="panel-body" style="font-size: 14px;">
                    <table class="table table-bordered table-hover table-striped ">
                        <thead>
                            <tr>
                                <th width="50px">STT</th>
                                <th>ID Trả Sách</th>
                                <th>ID Mượn Sách</th>
                                <th>Ngày Trả Dự Định </th>
                                <th>Ngày Trả Thực Tế</th>
                                <th>Tình Trạng</th>
                                <th>Số Lượng</th>
                                <th>Còn Lại</th>
                                
                                <th width="50px"></th>
                                <th width="50px"></th>
                            </tr>
                        </thead>
                        <tbody>
<?php 
$conn = connectdb();
$productList = getAll_TS($conn);
$index = 0;
if(isset($productList) && (count($kq) >0)){
    foreach($productList as $sp){
        $ngaytradd = GetReturnDateByBorrowID($sp['Borrow_ID']);
        $conlai = GetBooksDontReturn($sp['Borrow_ID']);
        echo '
        <tr>
            <td>'.++$index.'</td>
            <td>'.$sp['ID'].'</td>
            <td>'.$sp['Borrow_ID'].'</td>
            <td>'.$ngaytradd.'</td>
            <td>'.$sp['Return_date'].'</td>';
            if($sp['Status'] == 0) echo '<td>Đúng hạn</td>';
            else if($sp['Status'] == 1) echo '<td>Không đúng hạn</td>'; 
            echo '<td>'.$sp['soluong'].'</td>
            <td>'.$conlai.'</td>
            <td>
                <a href="./index.php?act=updateTS&id='.$sp['ID'].'"><i class="edit-icon fa-solid fa-pen-to-square text-warning"></i></a>
            </td>
            <td>
                <a href="./index.php?act=deleteTS&id='.$sp['ID'].'"><i class="delete-icon fa-solid fa-trash-can text-danger"></i></a>
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