<?php
    function getall_KH(){
        $conn = connectdb();
        $sql = "select * from readers";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $kq = $stmt->fetchAll();
        return $kq;
    }

    function deleteKH($id){
        $conn = connectdb();
        $sql = "CALL DeleteReader('".$id."')";
        // use exec because no results are returned
        $conn->exec($sql);
    }

    function getoneKH($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * from readers where id=".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function updateKH($id,$name,$ID_Number,$type,$phone, $address,$issued_date,$expiration_date){
        $conn = connectdb();
       
        $sql = 'CALL UpdateReader("'.$id.'", "'.$name.'", "'.$phone.'", "'.$ID_Number.'", "'.$type.'", "'.$address.'", "'.$issued_date.'", "'.$expiration_date.'")';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
    }

    function themKH($name,$ID_Number,$type,$phone,$address, $issued_date,$expiration_date){
        $conn = connectdb(); 
        
        $sql = "CALL AddReader('".$name."','".$phone."','".$ID_Number."','".$type."','".$address."','".$issued_date."','".$expiration_date."')";
        // $sql = "INSERT INTO readers (name,ID_Number,type,phone,address,issued_date,expiration_date) values ('".$name."','".$ID_Number."','".$type."','".$phone."','".$address."','".$issued_date."','".$expiration_date."')";
        // use exec because no results are returned
        $conn->exec($sql);
    }
   
   
?>