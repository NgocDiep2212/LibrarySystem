
<!DOCTYPE html>
<html>
<head>
	<title>Sửa Thông Tin Sách</title>
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
                    <h2 class="text-center">Sửa Thông Tin Sách</h2>
                </div>
                <div class="panel-body">
                    <form action="index.php?act=updateS" method="post">
                        <div class="form-group">
                                <label for="title">Tên sách:</label>
                                <input type="text" name="id" value="<?=$kqone[0]['ID']?>" hidden="true">
                                <input required="true" type="text" class="form-control" id="title" name="title" value="<?=$kqone[0]['title']?>">
                        </div>
                        <div class="form-group">
                                <label for="author">Tác giả</label>
                                <input required="true" type="text" class="form-control" id="author" name="author" value="<?=$kqone[0]['author']?>">
                        </div>
                        <div class="form-group">
                                <label for="type">Loại Sách:</label>
                                <input required="true" type="text" class="form-control" id="type" name="type" value="<?=$kqone[0]['type']?>">
                        </div>
                        <div class="form-group">
                                <label for="quantity">Số lượng:</label>
                                <input required="true" type="text" class="form-control" id="quantity" name="quantity" value="<?=$kqone[0]['quantity']?>">
                        </div>
                        <div class="form-group">
                                <label for="conlai">Còn lại:</label>
                                <input required="true" type="text" class="form-control" id="conlai" name="conlai" value="<?=$kqone[0]['conlai']?>">
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