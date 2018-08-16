<?php

include 'function/getdatasetkriteria.php';

    //proses hitung


    function defuzzyfikasi(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srg";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);

        $sql = "SELECT gunung.*,

        dkharga.murah as hargamurah,
        dkharga.sedang as hargasedang,
        dkharga.mahal as hargamahal,

        dkfasilitas.kurang as fasilitaskurang,
        dkfasilitas.sedang as fasilitassedang,
        dkfasilitas.lengkap as fasilitaslengkap,


        dkjamoperasional.sebentar as jamoperasionalsebentar,
        dkjamoperasional.sedang as jamoperasionalsedang,
        dkjamoperasional.lama as jamoperasionallama


        
        
        FROM gunung 
        JOIN dkharga ON dkharga.gunung_id=gunung.id 
        JOIN dkfasilitas on dkfasilitas.gunung_id=gunung.id 
        JOIN dkjamoperasional on dkjamoperasional.gunung_id=gunung.id 
        
        ";
        $result = $conn->query($sql);
        $data=array();

        while($row = $result->fetch_assoc()){
           

            $array=$row;

            $and=max(

                $row['hargamurah'],
                $row['hargasedang'],
                $row['hargamahal'],
                $row['fasilitaskurang'],
                $row['fasilitassedang'],
                $row['fasilitaslengkap'],
                $row['jamoperasionalsebentar'],
                $row['jamoperasionalsedang'],
                $row['jamoperasionallama']

            );

            $or=min(

                $row['hargamurah'],
                $row['hargasedang'],
                $row['hargamahal'],
                $row['fasilitaskurang'],
                $row['fasilitassedang'],
                $row['fasilitaslengkap'],
                $row['jamoperasionalsebentar'],
                $row['jamoperasionalsedang'],
                $row['jamoperasionallama']

            );

            $dkanddanor=array(

                'and'=>$and,
                'or'=>$or

            );

            $array=array_merge($array,$dkanddanor);

            array_push($data,$array);
            
        }


        return $data;


    }



    function prosesquery($harga,$fasilitas,$jamoperasional){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srg";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        $sql = "SELECT gunung.*,dkharga.$harga as dkharga,dkfasilitas.$fasilitas as dkfasilitas,dkjamoperasional.$jamoperasional as dkjamoperasional, 
        @dk1 :=if(dkharga.$harga>dkfasilitas.$fasilitas,dkfasilitas.$fasilitas,dkharga.$harga) as dk1,
        @dk :=if(@dk1>dkjamoperasional.$jamoperasional,dkjamoperasional.$jamoperasional,@dk1) as dk2
        
        
        FROM gunung 
        JOIN dkharga ON dkharga.gunung_id=gunung.id 
        JOIN dkfasilitas on dkfasilitas.gunung_id=gunung.id 
        JOIN dkjamoperasional on dkjamoperasional.gunung_id=gunung.id 
        
        
        ORDER by dk2 DESC
        ";
        $result = $conn->query($sql);   
        
        $data=array();        

        while($row = $result->fetch_assoc()){
            //cari derejat keanggotaan yang bukan 0
            if($row['dk2']!=0){

                array_push($data,$row);

            }
            
        }


        return $data;
    
    }
    function proseshimpunan(){


        $datagunung=getdatagunung();
        $jumlahdata=getjumlahdata();

        $data=array();

        foreach($datagunung as $value){

            $dkhargamurah=dkhargamurah($value['harga']);
            $dkhargasedang=dkhargasedang($value['harga']);
            $dkhargamahal=dkhargamahal($value['harga']);
            

            $dkfasilitaskurang=dkfasilitaskurang($value['fasilitas']);
            $dkfasilitassedang=dkfasilitassedang($value['fasilitas']);
            $dkfasilitaslengkap=dkfasilitaslengkap($value['fasilitas']);

            $dkjamoperasionalsebentar=dkjamoperasionalsebentar($value['jamoperasional']);
            $dkjamoperasionalsedang=dkjamoperasionalsedang($value['jamoperasional']);
            $dkjamoperasionallama=dkjamoperasionallama($value['jamoperasional']);
            
            $array=array(
                'gunung_id'=>$value['id'],
                'dkhargamurah'=>$dkhargamurah,
                'dkhargasedang'=>$dkhargasedang,
                'dkhargamahal'=>$dkhargamahal,
                'dkfasilitaskurang'=>$dkfasilitaskurang,
                'dkfasilitassedang'=>$dkfasilitassedang,
                'dkfasilitaslengkap'=>$dkfasilitaslengkap,
                'dkjamoperasionalsebentar'=>$dkjamoperasionalsebentar,
                'dkjamoperasionalsedang'=>$dkjamoperasionalsedang,
                'dkjamoperasionallama'=>$dkjamoperasionallama
            );
            array_push($data,$array);

        }

        //insert ke tabel dkharga
        hargastore($data);
        fasilitasstore($data);
        jamoperasionalstore($data);

        return $data;
    }

    function getdatagunung(){


        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srg";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        $sql = "SELECT * FROM gunung";
        $result = $conn->query($sql);
        $data=array();        

        while($row = $result->fetch_assoc()){

            
            array_push($data,$row);

        }


        return $data;
    }

    function getjumlahdata(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srg";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        $sql = "SELECT * FROM gunung";
        $result = $conn->query($sql);
                
        $rowcount=mysqli_num_rows($result);

        $data=$rowcount;
        return $data;

    }

    function dkhargamurah($harga){

        
        //bernilai 1 bila harga lebih murah dari pada setting harga murah
        
        //asumsi dia paling mahal
        $hasil=0;

        
        $hargamurah=getsettingkriteria('harga','murah');
        $hargasedang=getsettingkriteria('harga','sedang');
        $hargamahal=getsettingkriteria('harga','mahal');

        if($harga<=$hargasedang['nilai_minimal']){

            $hasil=1;
            
        }

        if($harga>=$hargasedang['nilai_minimal'] && $harga<=$hargamurah['nilai_maksimal'] ){

            $hasil=($hargamurah['nilai_maksimal']-$harga)/($hargamurah['nilai_maksimal']-$hargasedang['nilai_minimal']);
            
        }

        if($harga>=$hargamurah['nilai_maksimal']){

            $hasil=0;
            
        }



        return $hasil;

    }

    function dkhargasedang($harga){

        
        //bernilai 1 bila harga lebih murah dari pada setting harga murah
        
        //asumsi dia paling mahal
        $hasil=0;

        
        $hargamurah=getsettingkriteria('harga','murah');
        $hargasedang=getsettingkriteria('harga','sedang');
        $hargamahal=getsettingkriteria('harga','mahal');

        if($harga<=$hargasedang['nilai_minimal'] || $harga>=$hargasedang['nilai_maksimal'] ){

            $hasil=0;
            
        }

        if($harga>=$hargasedang['nilai_minimal'] && $harga<=$hargamurah['nilai_maksimal'] ){

            $hasil=($harga-$hargasedang['nilai_minimal'])/($hargamurah['nilai_maksimal']-$hargasedang['nilai_minimal']);
            
        }

        if($harga>=$hargamurah['nilai_maksimal']){

            if($harga<=$hargamahal['nilai_minimal']){

                $hasil=1;
            } 
            
        }

        if($harga>=$hargamahal['nilai_minimal'] && $harga<=$hargasedang['nilai_maksimal'] ){

            $hasil=($hargasedang['nilai_maksimal']-$harga)/($hargasedang['nilai_maksimal']-$hargamahal['nilai_minimal']);
            
            
        }


        return $hasil;

    }

    function dkhargamahal($harga){

        
        //bernilai 1 bila harga lebih murah dari pada setting harga murah
        
        //asumsi dia paling mahal
        $hasil=0;

        
        $hargamurah=getsettingkriteria('harga','murah');
        $hargasedang=getsettingkriteria('harga','sedang');
        $hargamahal=getsettingkriteria('harga','mahal');

        if($harga<=$hargamahal['nilai_minimal']){

            $hasil=0;
            
        }

        if($harga>=$hargamahal['nilai_minimal'] && $harga<=$hargasedang['nilai_maksimal'] ){

            $hasil=($harga-$hargamahal['nilai_minimal'])/($hargasedang['nilai_maksimal']-$hargamahal['nilai_minimal']);
            
        }

        if($harga>=$hargasedang['nilai_maksimal']){

            $hasil=1;
            
        }



        return $hasil;

    }

    function hargastore($data){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srg";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        //kosongkan dulu
        $sql = "TRUNCATE TABLE dkharga";
        $result = $conn->query($sql);

        foreach($data as $value){
            //insert ke database
            $sql = "INSERT INTO dkharga VALUES ('', '$value[gunung_id]', '$value[dkhargamurah]','$value[dkhargasedang]','$value[dkhargamahal]')";
            $conn->query($sql);

        }
        

    }


    function dkfasilitaskurang($fasilitas){

        
        //bernilai 1 bila fasilitas lebih kurang dari pada setting fasilitas kurang
        
        //asumsi dia paling lengkap
        $hasil=0;

        
        $fasilitaskurang=getsettingkriteria('fasilitas','kurang');
        $fasilitassedang=getsettingkriteria('fasilitas','sedang');
        $fasilitaslengkap=getsettingkriteria('fasilitas','lengkap');

        if($fasilitas<=$fasilitassedang['nilai_minimal']){

            $hasil=1;
            
        }

        if($fasilitas>=$fasilitassedang['nilai_minimal'] && $fasilitas<=$fasilitaskurang['nilai_maksimal'] ){

            $hasil=($fasilitaskurang['nilai_maksimal']-$fasilitas)/($fasilitaskurang['nilai_maksimal']-$fasilitassedang['nilai_minimal']);
            
        }

        if($fasilitas>=$fasilitaskurang['nilai_maksimal']){

            $hasil=0;
            
        }



        return $hasil;

    }

    function dkfasilitassedang($fasilitas){

        
        //bernilai 1 bila fasilitas lebih kurang dari pada setting fasilitas kurang
        
        //asumsi dia paling lengkap
        $hasil=0;

        
        $fasilitaskurang=getsettingkriteria('fasilitas','kurang');
        $fasilitassedang=getsettingkriteria('fasilitas','sedang');
        $fasilitaslengkap=getsettingkriteria('fasilitas','lengkap');

        if($fasilitas<=$fasilitassedang['nilai_minimal'] || $fasilitas>=$fasilitassedang['nilai_maksimal'] ){

            $hasil=0;
            
        }

        if($fasilitas>=$fasilitassedang['nilai_minimal'] && $fasilitas<=$fasilitaskurang['nilai_maksimal'] ){

            $hasil=($fasilitas-$fasilitassedang['nilai_minimal'])/($fasilitaskurang['nilai_maksimal']-$fasilitassedang['nilai_minimal']);
            
        }

        if($fasilitas>=$fasilitaskurang['nilai_maksimal']){

            if($fasilitas<=$fasilitaslengkap['nilai_minimal'] ){

                $hasil=1;

            }
            
            
        }

        if($fasilitas>=$fasilitaslengkap['nilai_minimal'] && $fasilitas<=$fasilitassedang['nilai_maksimal'] ){

            $hasil=($fasilitassedang['nilai_maksimal']-$fasilitas)/($fasilitassedang['nilai_maksimal']-$fasilitaslengkap['nilai_minimal']);
            
            
        }


        return $hasil;

    }

    function dkfasilitaslengkap($fasilitas){

        
        //bernilai 1 bila fasilitas lebih kurang dari pada setting fasilitas kurang
        
        //asumsi dia paling lengkap
        $hasil=0;

        
        $fasilitaskurang=getsettingkriteria('fasilitas','kurang');
        $fasilitassedang=getsettingkriteria('fasilitas','sedang');
        $fasilitaslengkap=getsettingkriteria('fasilitas','lengkap');

        if($fasilitas<=$fasilitaslengkap['nilai_minimal']){

            $hasil=0;
            
        }

        if($fasilitas>=$fasilitaslengkap['nilai_minimal'] && $fasilitas<=$fasilitassedang['nilai_maksimal'] ){

            $hasil=($fasilitas-$fasilitaslengkap['nilai_minimal'])/($fasilitassedang['nilai_maksimal']-$fasilitaslengkap['nilai_minimal']);
            
        }

        if($fasilitas>=$fasilitassedang['nilai_maksimal']){

            $hasil=1;
            
        }



        return $hasil;

    }

    function fasilitasstore($data){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srg";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        //kosongkan dulu
        $sql = "TRUNCATE TABLE dkfasilitas";
        $result = $conn->query($sql);

        foreach($data as $value){
            //insert ke database
            $sql = "INSERT INTO dkfasilitas VALUES ('', '$value[gunung_id]', '$value[dkfasilitaskurang]','$value[dkfasilitassedang]','$value[dkfasilitaslengkap]')";
            $conn->query($sql);

        }
        

    }

    //himpunan jamoperasional
    function dkjamoperasionalsebentar($jamoperasional){

        
        //bernilai 1 bila jamoperasional lebih sebentar dari pada setting jamoperasional sebentar
        
        //asumsi dia paling lama
        $hasil=0;

        
        $jamoperasionalsebentar=getsettingkriteria('jam operasional','sebentar');
        $jamoperasionalsedang=getsettingkriteria('jam operasional','sedang');
        $jamoperasionallama=getsettingkriteria('jam operasional','lama');

        if($jamoperasional<=$jamoperasionalsedang['nilai_minimal']){

            $hasil=1;
            
        }

        if($jamoperasional>=$jamoperasionalsedang['nilai_minimal'] && $jamoperasional<=$jamoperasionalsebentar['nilai_maksimal'] ){

            $hasil=($jamoperasionalsebentar['nilai_maksimal']-$jamoperasional)/($jamoperasionalsebentar['nilai_maksimal']-$jamoperasionalsedang['nilai_minimal']);
            
        }

        if($jamoperasional>=$jamoperasionalsebentar['nilai_maksimal']){

            $hasil=0;
            
        }



        return $hasil;

    }

    function dkjamoperasionalsedang($jamoperasional){

        
        //bernilai 1 bila jamoperasional lebih sebentar dari pada setting jamoperasional sebentar
        
        //asumsi dia paling lama
        $hasil=0;

        
        $jamoperasionalsebentar=getsettingkriteria('jam operasional','sebentar');
        $jamoperasionalsedang=getsettingkriteria('jam operasional','sedang');
        $jamoperasionallama=getsettingkriteria('jam operasional','lama');

        if($jamoperasional<=$jamoperasionalsedang['nilai_minimal'] || $jamoperasional>=$jamoperasionalsedang['nilai_maksimal'] ){

            $hasil=0;
            
        }

        if($jamoperasional>=$jamoperasionalsedang['nilai_minimal'] && $jamoperasional<=$jamoperasionalsebentar['nilai_maksimal'] ){

            $hasil=($jamoperasional-$jamoperasionalsedang['nilai_minimal'])/($jamoperasionalsebentar['nilai_maksimal']-$jamoperasionalsedang['nilai_minimal']);
            
        }

        if($jamoperasional>=$jamoperasionalsebentar['nilai_maksimal']){

            if($jamoperasional<=$jamoperasionallama['nilai_minimal'] ){
                $hasil=1;
            }
            
            
        }

        if($jamoperasional>=$jamoperasionallama['nilai_minimal'] && $jamoperasional<=$jamoperasionalsedang['nilai_maksimal'] ){

            $hasil=($jamoperasionalsedang['nilai_maksimal']-$jamoperasional)/($jamoperasionalsedang['nilai_maksimal']-$jamoperasionallama['nilai_minimal']);
            
            
        }


        return $hasil;

    }

    function dkjamoperasionallama($jamoperasional){

        
        //bernilai 1 bila jamoperasional lebih sebentar dari pada setting jamoperasional sebentar
        
        //asumsi dia paling lama
        $hasil=0;

        
        $jamoperasionalsebentar=getsettingkriteria('jam operasional','sebentar');
        $jamoperasionalsedang=getsettingkriteria('jam operasional','sedang');
        $jamoperasionallama=getsettingkriteria('jam operasional','lama');

        if($jamoperasional<=$jamoperasionallama['nilai_minimal']){

            $hasil=0;
            
        }

        if($jamoperasional>=$jamoperasionallama['nilai_minimal'] && $jamoperasional<=$jamoperasionalsedang['nilai_maksimal'] ){

            $hasil=($jamoperasional-$jamoperasionallama['nilai_minimal'])/($jamoperasionalsedang['nilai_maksimal']-$jamoperasionallama['nilai_minimal']);
            
        }

        if($jamoperasional>=$jamoperasionalsedang['nilai_maksimal']){

            $hasil=1;
            
        }



        return $hasil;

    }

    function jamoperasionalstore($data){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "srg";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        
        //kosongkan dulu
        $sql = "TRUNCATE TABLE dkjamoperasional";
        $result = $conn->query($sql);

        foreach($data as $value){
            //insert ke database
            $sql = "INSERT INTO dkjamoperasional VALUES ('', '$value[gunung_id]', '$value[dkjamoperasionalsebentar]','$value[dkjamoperasionalsedang]','$value[dkjamoperasionallama]')";
            $conn->query($sql);

        }
        

    }


















?>