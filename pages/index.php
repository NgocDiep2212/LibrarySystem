<?php
    session_start();
    ob_start();
    include("../model/connectdb.php");
    include("../model/khachhang.php");
    include("../model/addk.php");
    include("../model/adds.php");
    include("../model/addMS.php");
    include("../model/addTS.php");
    include("./header.php");
    // include("./common/utility.php");
    if(isset($_GET['act'])){
        switch ($_GET['act']){
            
    //khach hang
            case 'khachhang':
            // nhan yeu cau va xu ly
            // lay ds khach hang
            $kq=getall_KH();
            include "./khachhang/index.php";
        break;

        case 'deleteKH':
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                deleteKH($id);
            }
            $kq=getall_KH();
            header('Location: index.php?act=khachhang'); 
            die(); 
        break;

        case 'updateKH':
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                $kqone=getoneKH($id);
                $kq=getall_KH();
                include "./khachhang/edit.php";
            }
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $name =$_POST['name'];
                $ID =$_POST['ID'];
                $type =$_POST['type'];
                $phone =$_POST['phone'];
                $address =$_POST['address'];
                $issued_date =$_POST['issued_date'];
                $expiration_date =$_POST['expiration_date'];
                updateKH($id,$name,$ID,$type,$phone,$address,$issued_date,$expiration_date);
                $kq=getall_KH();
                header('Location: index.php?act=khachhang'); 
                die(); 
            }
        break;
        
        case 'addKH':    
            
            if(isset($_POST['ID'])&&($_POST['ID'])){
                $name =$_POST['name'];
                $ID =$_POST['ID'];
                $type =$_POST['type'];
                $phone =$_POST['phone'];
                $address =$_POST['address'];
                $issued_date =$_POST['issued_date'];
                $expiration_date =$_POST['expiration_date'];
                themKH($name,$ID,$type,$phone, $address, $issued_date,$expiration_date);
                
                $kq=getall_KH();
                header('Location: index.php?act=khachhang'); 
                die(); 
            } else{
                include "./khachhang/add.php";
            }

        break;
        

    //sach
            case 'sach':
            // nhan yeu cau va xu ly
            // lay ds sach
            $kq=getAll_S();
            include "./sach/index.php";
        break;

        case 'deleteS':
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                deleteS($id);
            }
            $kq=getAll_S();
            header('Location: index.php?act=sach'); 
            die(); 
        break;

        case 'updateS':
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                $kqone=getoneS($id);
                $kq=getAll_S();
                include "./sach/edit.php";
            }
            if(isset($_POST['id'])&&($_POST['id'])){
                $id =$_POST['id'];
                $title =$_POST['title'];
                $author =$_POST['author'];
                $type =$_POST['type'];
                $quantity =$_POST['quantity'];
                $conlai =$_POST['conlai'];
                updateS($id, $title,$author,$type,$quantity,$conlai);
                $kq=getAll_S();
                header('Location: index.php?act=sach'); 
                die(); 
            }
        break;
        
        case 'addS':    
            
            if(isset($_POST['title'])&&($_POST['title'])){
                $title =$_POST['title'];
                $author =$_POST['author'];
                $type =$_POST['type'];
                $quantity =$_POST['quantity'];
                $conlai =$_POST['conlai'];
                themS($title,$author,$type,$quantity, $conlai);
                
                $kq=getAll_S();
                header('Location: index.php?act=sach'); 
                die(); 
            } else{
                include "./sach/add.php";
            }

        break;
        

    //muon sach
            case 'muonsach':
            // nhan yeu cau va xu ly
            // lay ds muon sach
            $kq=getall_MS();
            include "./muonsach/index.php";
        break;

        case 'deleteMS':
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                deleteMS($id);
            }
            $kq=getall_MS();
            header('Location: index.php?act=muonsach'); 
            die(); 
        break;

        case 'updateMS':
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                $kqone=getoneMS($id);
                $kq=getall_MS();
                include "./muonsach/edit.php";
            }
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $Book_ID = $_POST['Book_ID'];
                $Reader_ID = $_POST['Reader_ID'];
                $soluong = $_POST['soluong'];
                $Borrow_date = $_POST['Borrow_date'];
                $return_date = $_POST['return_date'];
                $checkIDs = checkIDS($Book_ID);
                $checkIDk = checkIDK($Reader_ID);
                $checkslg = checkSlg($Book_ID,$soluong);
                
                if($checkIDs == 1 && $checkIDk == 1 && $checkslg == 1){
                    updateMS($id,$Book_ID,$Reader_ID,$Borrow_date,$return_date,$soluong);
                    $kq=getall_MS();
                    header('Location: index.php?act=muonsach'); 
                    die(); 
                }
                else if($checkIDs == 1 &&  $checkIDk ==1 && $checkSlg == 0){
                    $error .= 'Khong du so luong sach';
                    header('Location: index.php?act=updateMS&id='.$id.'&error='.$error);
                }
                else if($checkIDs == 0 ||  $checkIDk ==0 ){
                    $error .= 'Sach hoac user khong ton tai';
                    header('Location: index.php?act=updateMS&id='.$id.'&error='.$error);
                }
            }
        break;
        
        case 'addMS':    
            
            if(isset($_POST['Book_ID'])&&($_POST['Book_ID'])){
                $Book_ID = $_POST['Book_ID'];
                $Reader_ID = $_POST['Reader_ID'];
                $Borrow_date = $_POST['Borrow_date'];
                $return_date = $_POST['return_date'];
                $soluong = $_POST['soluong'];
                $checkIDs = checkIDS($Book_ID);
                $checkIDk = checkIDK($Reader_ID);
                $checkslg = checkSlg($Book_ID,$soluong);
                $error = '';
                if($checkIDs == 1 && $checkIDk == 1 && $checkslg == 1){
                    themMS($Book_ID,$Reader_ID,$Borrow_date,$return_date,$soluong);
                    $kq=getall_MS();
                    header('Location: index.php?act=muonsach');
                    die(); 
                }
                else if($checkIDs == 1 &&  $checkIDk ==1 && $checkslg == 0){
                    $error .= 'Khong du so luong sach';
                    header('Location: index.php?act=addMS&error='.$error);
                }
                else if($checkIDs == 0 ||  $checkIDk ==0 ){
                    $error .= 'Sach hoac user khong ton tai';
                    header('Location: index.php?act=addMS&error='.$error);
                }
                 
                
            } else{
                include "./muonsach/add.php";
            }

        break;

    //tra sach
            case 'trasach':
            // nhan yeu cau va xu ly
            // lay ds tra sach
            $kq=getall_TS();
            include "./trasach/index.php";
        break;

        case 'deleteTS':
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                deleteTS($id);
            }
            $kq=getall_TS();
            header('Location: index.php?act=trasach'); 
            die(); 
        break;

        case 'updateTS':
            if(isset($_GET['id'])){
                $id =$_GET['id'];
                $kqone=getoneTS($id);
                $kq=getall_TS();
                include "./trasach/edit.php";
            }
            if(isset($_POST['id'])){
                $id =$_POST['id'];
                $Borrow_ID = $_POST['Borrow_ID'];
                $Return_date = $_POST['Return_date'];
                $Status = $_POST['Status'];
                $soluong = $_POST['soluong'];
                $checkSlgTS = checkSlgTS($Borrow_ID,$soluong);
                $checkIDMS = checkIDMS($Borrow_ID);
                if($checkIDMS == 1 && $checkSlgTS == 1){
                    updateTS($id,$Borrow_ID,$Return_date,$Status,$soluong);
                    $kq=getall_TS();
                    header('Location: index.php?act=trasach'); 
                    die(); 
                }
                else if($checkIDMS == 0 && $checkSlgTS == 1){
                    $error .= 'Không tồn tại mã mượn sách';
                    header('Location: index.php?act=updateTS&id='.$id.'&error='.$error);
                }else if($checkIDMS == 1 && $checkSlgTS == 0){
                    $error .= 'Số sách trong kho không đủ';
                    header('Location: index.php?act=updateTS&id='.$id.'&error='.$error);
                }else{
                    $error .= 'Khong hop le';
                    header('Location: index.php?act=updateTS&id='.$id.'&error='.$error);
                }
            }
        
        break;
        
        case 'addTS':    
            
            if(isset($_POST['Borrow_ID'])&&($_POST['Borrow_ID'])){
                $Borrow_ID = $_POST['Borrow_ID'];
                $Return_date = $_POST['Return_date'];
                $Status = $_POST['Status'];
                $soluong = $_POST['soluong'];
                $checkIDMS = checkIDMS($Borrow_ID);
                $checkSlgTS = checkSlgTS($Borrow_ID,$soluong);
                if($checkIDMS == 1 && $checkSlgTS == 1){
                    themTS($Borrow_ID,$Return_date,$Status, $soluong);
                    $kq=getall_TS();
                    header('Location: index.php?act=trasach'); 
                    die(); 
                }
                else if($checkIDMS == 0 && $checkSlgTS == 1){
                    $error .= 'Không tồn tại mã mượn sách';
                    header('Location: index.php?act=addTS&error='.$error);
                }else if($checkIDMS == 1 && $checkSlgTS == 0){
                    $error .= 'Số sách trả phải nhỏ hơn hoặc bằng số sách mượn';
                    header('Location: index.php?act=addTS&error='.$error);
                }else{
                    $error .= 'Khong hop le';
                    header('Location: index.php?act=addTS&error='.$error);
                }
                
                 
                
            } else{
                include "./trasach/add.php";
            }

        break;
        
    
    }
}
?>