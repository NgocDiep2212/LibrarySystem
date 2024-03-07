
<!DOCTYPE html>
<html>
<head>
	<title>Sửa Thông Tin Khách Hàng</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./header.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div id="app">
        
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h2 class="text-center">Sửa Thông Tin Khách Hàng</h2>
                </div>
                <div class="panel-body">
                    <form action="index.php?act=updateKH" method="post">
                        <div class="form-group">
                                <label for="ID">ID Khách Hàng</label>
                                <input type="text" name="id" value="<?=$kqone[0]['ID']?>" hidden="true">
                                <input required="true" type="text" class="form-control" id="ID" name="ID" value="<?=$kqone[0]['ID']?>">
                        </div>
                        <div class="form-group">
                                <label for="type">Tên Khách Hàng:</label>
                                <input required="true" type="text" class="form-control" id="name" name="name" value="<?=$kqone[0]['name']?>">
                        </div>
                        <div class="form-group">
                                <label for="type">Loại Khách Hàng:</label>
                                <select name="type">
                                    <option <?php if($kqone[0]['type'] == 0) echo 'selected ' ?>value='0'>Sinh viên</option>
                                    <option <?php if($kqone[0]['type'] == 1) echo 'selected ' ?>value='1'>Giáo viên</option>
                                    <option <?php if($kqone[0]['type'] == 2) echo 'selected ' ?>value='2'>Bên ngoài</option>
                                </select>
                                      
                        </div>
                        <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input required="true" type="text" class="form-control" id="phone" name="phone" value="<?=$kqone[0]['phone']?>">
                        </div>
                        <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input required="true" type="text" class="form-control" id="address" name="address" value="<?=$kqone[0]['address']?>">
                        </div>
                        <div class="form-group">
                                <label for="issued_date">Ngày cấp thẻ:</label>
                                <input required="true" type="text" class="form-control" id="issued_date" name="issued_date" value="<?=$kqone[0]['issued_date']?>">
                        </div>
                        <div class="form-group">
                                <label for="expiration_date">Ngày hết hạn thẻ:</label>
                                <input required="true" type="text" class="form-control" id="expiration_date" name="expiration_date" value="<?=$kqone[0]['expiration_date']?>">
                        </div>
                            
                            <button class="btn btn-success">Lưu</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>
</html>