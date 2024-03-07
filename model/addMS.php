<?php
    function getall_MS(){
        $conn = connectdb();
        $sql = "Select * from muonsach";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $kq = $stmt->fetchAll();
        return $kq;
    }

    function deleteMS($id){
        $conn = connectdb();
        $sql = "CALL DeleteMuonSach('".$id."')";
        // use exec because no results are returned
        $conn->exec($sql);
    }

    function getoneMS($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * from muonsach where id=".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function updateMS($id,$Book_ID,$Reader_ID,$Borrow_date,$return_date,$soluong){
        $conn = connectdb();
       
        $sql = "CALL UpdateMuonSach('".$id."','".$Book_ID."','".$Reader_ID."','".$Borrow_date."','".$return_date."','".$soluong."')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
    }

    function checkIDS($id){
        $conn = connectdb();
        $sql = "Select * from books where id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        if($kq != null) return 1;
        else return 0;
    }

    function checkIDK($id){
        $conn = connectdb();
        $sql = "Select * from Readers where ID = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        if($kq != null) return 1;
        else return 0;
    }

    function checkslg($id,$slg){
        $conn = connectdb();
        $sql = "Select * from Books where id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        $kq1 = intval($kq[0]['conlai']);
        $slg1 = intval($slg);
        if($kq1 - $slg1 <0) return 0;
        else return 1;
    }

    

    function themMS($Book_ID,$Reader_ID,$Borrow_date,$return_date,$soluong){
        $conn = connectdb(); 
        $sql = "CALL AddMuonSach('".$Book_ID."','".$Reader_ID."','".$Borrow_date."','".$return_date."', '".$soluong."')";
        $conn->exec($sql);
    }
   
   
?>