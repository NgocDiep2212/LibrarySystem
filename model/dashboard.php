<?php
    function getTotalBookCount(){
        $conn = connectdb();
        $sql = "select GetTotalBookCount();";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        $kq = $stmt->fetch();
        return (int) $kq[0];
    }
    function getTotalReaders(){
        $conn = connectdb();
        $sql = "select GetTotalReaders();";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        $kq = $stmt->fetch();
        return (int) $kq[0];
    }
    function getTotalMuonSach(){
        $conn = connectdb();
        $sql = "select GetTotalMuonSach();";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        $kq = $stmt->fetch();
        return (int) $kq[0];
    }
    function getTotalTraSach(){
        $conn = connectdb();
        $sql = "select GetTotalTraSach();";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
        $kq = $stmt->fetch();
        return (int) $kq[0];
    }

    function get5_MS(){
        $conn = connectdb();
        $sql = "Select * from muonsach";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $kq = $stmt->fetchAll();
        return $kq;
    }

?>