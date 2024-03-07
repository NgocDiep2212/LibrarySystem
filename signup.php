<?php 
ob_start();
session_start();
require_once('./model/connectdb.php');
    $name = $username = $confirm_password = $password = $chucvu ='';
    if(!empty($_POST)){
        if(isset($_POST['name'])){
            $name = $_POST['name'];
            $name = str_replace('"', '\\"',$name);
        }
        if(isset($_POST['username'])){
            $username = $_POST['username'];
            $username = str_replace('"', '\\"',$username);
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
            $password = str_replace('"', '\\"',$password);
        }
        if(isset($_POST['confirm_password'])){
            $confirm_password = $_POST['confirm_password'];
            $confirm_password = str_replace('"', '\\"',$confirm_password);
        }
        if(isset($_POST['chucvu'])){
            $chucvu = $_POST['chucvu'];
            $chucvu = str_replace('"', '\\"',$chucvu);
        }


        if(!empty($username) && !empty($password) && ($confirm_password == $password)){
            $conn = connectdb();
            $sql = 'insert into qly_admin(username, password, name, chucvu) values 
                ("'.$username.'",
                "'.$password.'",
                "'.$name.'",
                "'.$chucvu.'")';
        
            $stmt = $conn->prepare($sql);
            $stmt->execute();  
            header('Location: ./index.php'); 
            die();
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
    
  <section class="signup" style="margin: 15px 0;">
            <div class="container">
                <div class="signup-content" style="padding: 20px 0;">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="fa-regular fa-user"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Name"/>
                            </div>
                            
                            <div class="form-group">
                                <label for="username"><i class="fa-solid fa-user"></i></label>
                                <input type="text" name="username" id="username" placeholder="Your Username"/>
                            </div>
                            <div class="form-group">
                                <label for="chucvu"><i class="fa-solid fa-envelope"></i></label>
                                <input type="chucvu" name="chucvu" id="chucvu" placeholder="Your Role"/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fa-solid fa-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password"><i class="fa-solid fa-lock-open"></i></label>
                                <input type="password" name="confirm_password" id="confirm_password" placeholder="Repeat your password"/>
                            </div>
<?php 
if($confirm_password !== $password){
    echo 'Mật khẩu không trùng khớp';
}
?>
                            

                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/P_QTDL/img/signup-image.jpg" alt="sing up image"></figure>
                        <a href="./login.php" class="signup-image-link">I am already member</a>
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