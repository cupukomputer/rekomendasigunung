<?php


    function getsettingkriteria($namakriteria,$namasetkriteria){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srg";
        // Create connection
        $conn = new mysqli($servername, $username, $password);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);


        $sql = "SELECT * FROM setkriteria join kriteria on kriteria.id=setkriteria.kriteria_id where kriteria.nama_kriteria='$namakriteria' and setkriteria.nama_setkriteria='$namasetkriteria'";
        $result = $conn->query($sql);
        // output data of each row
        $row = $result->fetch_assoc();
        
        return $row;

    }







?>