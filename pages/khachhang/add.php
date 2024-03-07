
<!DOCTYPE html>
<html>
<head>
	<title>Thêm Khách Hàng</title>
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
                    <h2 class="text-center">Thêm Khách Hàng</h2>
                </div>
                <div class="panel-body">
                    <form action="./index.php?act=addKH" method="post">
                        <div class="form-group">
                                <label for="ID">ID Khách Hàng</label>
                                
                                <input required="true" type="text" class="form-control" id="ID" name="ID" value="">
                        </div>
                        <div class="form-group">
                                <label for="name">Tên Khách Hàng</label>
                                <input required="true" type="text" class="form-control" id="name" name="name" value="">
                        </div>
                        <div class="form-group">
                                <label for="type">Loại Khách Hàng:</label>
                                <!-- <input required="true" type="text" class="form-control" name="type" value=""> -->
                                <select name="type">
                                    <option value='0'>Sinh viên</option>
                                    <option value='1'>Giáo viên</option>
                                    <option value='2'>Bên ngoài</option>
                                </select>
                        </div>
                        <div class="form-group">
                                <label for="phone">Số điện thoại:</label>
                                <input required="true" type="text" class="form-control" id="phone" name="phone" value="">
                        </div>
                        <div class="form-group">
                                <label for="address">Địa chỉ:</label>
                                <input required="true" type="text" class="form-control" id="address" name="address" value="">
                        </div>
                        <div class="form-group">
                                <label for="issued_date">Ngày cấp thẻ:</label>
                                <input required="true" type="text" class="form-control" id="issued_date" name="issued_date" value="">
                        </div>
                        <div class="form-group">
                                <label for="expiration_date">Ngày hết hạn thẻ:</label>
                                <input required="true" type="text" class="form-control" id="expiration_date" name="expiration_date" value="">
                        </div>
                            
                            <button class="btn btn-success">Lưu</button>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>
</html>