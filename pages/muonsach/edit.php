
<!DOCTYPE html>
<html>
<head>
	<title>Sửa Thông Tin Mượn Sách</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="./header.css">
</head>
<body>
    <div id="app">
        
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Sửa Thông Tin Mượn Sách</h2>
                </div>
                <div class="panel-body">
                    <form action="./index.php?act=updateMS" method="post">
                        <div class="form-group">
                                <label for="Book_ID">ID Sách</label>
                                <input type="text" name="id" value="<?=$kqone[0]['ID']?>" hidden="true">
                                <input required="true" type="text" class="form-control" id="Book_ID" name="Book_ID" value="<?=$kqone[0]['Book_ID']?>">
                        </div>
                        <div class="form-group">
                                <label for="Reader_ID">ID Khách:</label>
                                <input required="true" type="text" class="form-control" id="Reader_ID" name="Reader_ID" value="<?=$kqone[0]['Reader_ID']?>">
                        </div>
                        <div class="form-group">
                                <label for="soluong">Số lượng:</label>
                                <input required="true" type="text" class="form-control" id="soluong" name="soluong" value="<?=$kqone[0]['soluong']?>">
                        </div>
                        <div class="form-group">
                                <label for="Borrow_date">Ngày mượn:</label>
                                <input required="true" type="text" class="form-control" id="Borrow_date" name="Borrow_date" value="<?=$kqone[0]['Borrow_date']?>">
                        </div>
                        <div class="form-group">
                                <label for="return_date">Ngày trả:</label>
                                <input required="true" type="text" class="form-control" id="return_date" name="return_date" value="<?=$kqone[0]['return_date']?>">
                        </div>
                        <?php 
                    if(isset($_GET['error'])){
                        echo '<span style="color: red">'.$_GET['error'].'</span></br></br>';
                    }
                ?>
                            <button class="btn btn-success">Lưu</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>
</html>