<?php
    function getall_TS(){
        $conn = connectdb();
        $sql = "Select * from trasach";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $kq = $stmt->fetchAll();
        return $kq;
    }

    function deleteTS($id){
        $conn = connectdb();
        $sql = "CALL DeleteTraSach('".$id."')";
        // use exec because no results are returned
        $conn->exec($sql);
    }

    function getoneTS($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * from trasach where id=".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function updateTS($id,$Borrow_ID,$Return_date,$Status, $soluong){
        $conn = connectdb();
       
        $sql = "CALL UpdateTraSach('".$id."','".$Borrow_ID."', '".$Return_date."', '".$Status."', '".$soluong."')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
    }

    function checkIDMS($id){
        $conn = connectdb();
        $sql = "Select * from muonsach where id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        if($kq != null) return 1;
        else return 0;
    }

    function GetBooksDontReturn($id){
        $conn = connectdb();
        $sql = "Select GetBooksDontReturn($id)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        $kq = $stmt->fetch();
        return $kq[0];
    }

    function checkSlgTS($id, $slg){
        $conn = connectdb();
        $sql = "Select * from muonsach where ID = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        $kq1 = intval($kq[0]['soluong']);//slg muon
        $slg1 = intval($slg);//slg tra
        //ktra so luong tra <= muon
        if($slg1 > $kq1) return 0;
        else return 1;
    }

    function themTS($Borrow_ID,$Return_date,$Status, $soluong){
        $conn = connectdb(); 
        
        $sql = "CALL AddTraSach('".$Borrow_ID."', '".$Return_date."', '".$Status."', '".$soluong."')";
        $conn->exec($sql);
    }

    function GetReturnDateByBorrowID($id){
        $conn = connectdb();
        $sql = "Select GetReturnDateByBorrowID($id)";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        $kq = $stmt->fetch();
        return $kq[0];
    }
   
   
?>