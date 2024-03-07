<?php 
ob_start();
session_start();
require_once('./model/connectdb.php');
    $username = $password = '';
    if(!empty($_POST)){
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $username = str_replace('"', '\\"',$username);
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
            $password = str_replace('"', '\\"',$password);
        }

        $conn = connectdb();
        $stmt = $conn->prepare("select * from qly_admin where username='".$username."' and password='".$password."'");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        
        if(isset($kq)){
            $id_user = $kq[0]['ID'];
            if(isset($id_user)) $_SESSION['id_user'] = $id_user;
            $username = $kq[0]['username'];
            if(isset($id_user)) $_SESSION['username'] = $username;
            header('location: ./index.php');
        }
        
        else{
             $txt_error ="Username hoặc Password không tồn tại";
        }
    }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Icon -->
    <script src="https://kit.fontawesome.com/4070e71ec7.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/P_QTDL/css/style.css">
    <title>Login</title>
  </head>
  <body>

  <section class="sign-in" style="margin: 80px 0;">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="/P_QTDL/img/signin-image.jpg" alt="sign in image"></figure>
                        <a href="./signup.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="fa-solid fa-user"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Name"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fa-solid fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <p style="color: red; font-size: 13px;">
<?php
    if(isset($txt_error)&&($txt_error != "")){
        echo $txt_error;
    }
?>
                             </p>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
            </div>
        </section>
 
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
   
  </body>
</html>