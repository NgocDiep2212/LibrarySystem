<?php
    function getAll_S(){
        $conn = connectdb();
        $sql = "Select * from books";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function deleteS($id){
        $conn = connectdb();
        $sql = "CALL DeleteBook('".$id."')";
        // use exec because no results are returned
        $conn->exec($sql);
    }

    function getoneS($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * from books where id=".$id);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        return $kq;
    }

    function updateS($id,$title,$author,$type,$quantity,$conlai){
        $conn = connectdb();
       
        $sql = "CALL UpdateBook('".$id."','".$title."','".$author."','".$type."','".$quantity."','".$conlai."')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
    }

    function checkSl($id){
        $conn = connectdb();
        $sql = "Select * from books where id = ".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq = $stmt->fetchAll();
        if($kq[0]['quantity'] > $kq[0]['conlai']) return 0;
        else return 1;
    }


    function themS($title, $author, $type, $quantity,$conlai){
        $conn = connectdb(); 
        
        $sql = "CALL AddNewBook('".$title."', '".$author."', '".$type."', '".$quantity."', '".$conlai."')";
        $conn->exec($sql);
    }
   
   
?>