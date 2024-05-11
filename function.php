<?php
$conect = mysqli_connect("localhost","root","","suratku");

function query($query){
    global $conect;
    $result = mysqli_query($conect, $query);
    $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
    return $rows;
}

function uploud(){
    $namafile = $_FILES['file']['name'];
    $ukuranfile = $_FILES['file']['size'];
    $tmpname = $_FILES['file']['tmp_name'];

    $ekstensifilevalid = ["jpg","jpeg","png", "docx","pdf","pptx"];
    $ekstensifile = explode(".", $namafile);
    $ekstensifile = strtolower(end($ekstensifile));
    if(!in_array($ekstensifile, $ekstensifilevalid)){
        echo"<script>alert('file tidak sesuai')
            </script>";
        return false;
    }

    if ($ukuranfile > 2000000){
        echo"<script>alert('file terlalu besar')
            </script>";
    return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= ".";
    $namafilebaru .= $ekstensifile;

    move_uploaded_file($tmpname, 'file/'. $namafilebaru);

    return $namafilebaru;
}


function suratmasuk($datasuratmasuk){
    global $conect;

    $namamasuk = htmlspecialchars($datasuratmasuk["nama"]);
    $tanggalsuk = htmlspecialchars($datasuratmasuk["tanggal"]);
    $nsmsuk = htmlspecialchars($datasuratmasuk["nsm"]);
    $asalsuk = htmlspecialchars($datasuratmasuk["asal"]);
    $tersuk = htmlspecialchars($datasuratmasuk["terima"]);
    $persuk = htmlspecialchars($datasuratmasuk["perihal"]);
    $tipe = htmlspecialchars($datasuratmasuk["tipe"]);

    $fisuk = uploud();
    if (!$fisuk){
        return false;
    }

    $query = "INSERT INTO suratmasuk VALUES('','$namamasuk','$tanggalsuk','$nsmsuk','$asalsuk','$tersuk','$persuk','$fisuk', '$tipe')";
    mysqli_query($conect, $query);

    return mysqli_affected_rows($conect);

}

function suratkeluar($datasuratkeluar){
    global $conect;

    $namamake = htmlspecialchars($datasuratkeluar["namake"]);
    $tanggalke = htmlspecialchars($datasuratkeluar["tanggalke"]);
    $nsmke = htmlspecialchars($datasuratkeluar["nsmke"]);
    $tuke = htmlspecialchars($datasuratkeluar["tujuan"]);
    $perke = htmlspecialchars($datasuratkeluar["perihalke"]);
    $tipeke = htmlspecialchars($datasuratkeluar["tipeke"]);

    $fiku = uploud();
    if (!$fiku){
        return false;
    }

    $query = "INSERT INTO suratkeluar VALUES('','$namamake','$tanggalke','$nsmke','$tuke','$perke','$fiku', '$tipeke')";
    mysqli_query($conect, $query);

    return mysqli_affected_rows($conect);

}

function registrasi($daftar){
    global $conect;
    $username = strtolower(stripcslashes($daftar["username"]));
    $password = mysqli_real_escape_string( $conect, $daftar["pass1"] );
    $password1 = mysqli_real_escape_string( $conect, $daftar["pass2"] );

    $file = uploud();
    if(!$file){
        return false;
    }

    $result = mysqli_query($conect,"SELECT username FROM admin_surat WHERE username = '$username' ");

    if(mysqli_fetch_assoc( $result )){
        echo"
        <script>alert('username ada');
        </script>";
    return false;
    }

    if ($password !== $password1){
        echo"konfirmasi pasword tidak sesuai";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conect, "INSERT INTO  admin_surat VALUES (' ', '$username', '$password','$file')");

    return mysqli_affected_rows($conect);
}

?> 