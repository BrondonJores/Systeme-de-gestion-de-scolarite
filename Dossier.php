<?php
	include_once"connect.php";
?>
<?php
	session_start();
    if((isset($_SESSION["entry"]))  && (isset($_SESSION["entryMAT"]))){
        $mate = $_SESSION["entryMAT"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assert/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Stockage</title>
</head>
<body>
<?php
    if(isset($_POST["entry"])){
        $_SESSION['entry'] = $_POST["entry"];
        $mate = $_SESSION["entry"];
    }
    if(!empty($mate)){
        echo"<div class='dis2'>"; 
                    $req = "SELECT * FROM etudiant WHERE ((Matricule = '{$mate}') OR(Nom = '{$mate}') )";
                    $sql = mysqli_query($con, $req);
                    if($sql){
                       foreach($sql as $exe) {
                            echo"<section class='table_header2'><h3>{$exe['Nom']}</h3> <a href='index.php' class='fas fa-arrow-left'></a></section>";
                            echo"<section class='contain'>";
                            $req2 = "SELECT * FROM semestre";
                            $sql2 = mysqli_query($con, $req2);
                            if($sql){
                                foreach($sql2 as $exe2) {
                                    echo"<div class='fold'>";
                                        echo"<i class='fas fa-folder'></i>";
                                        echo"<div  class='textp' onclick='Folder()'><p>{$exe2['NomS']}</p></div>";
                                        echo"<form action='Semestre.php' method='post' class='contform'><input type='text'name='entry' id='entry' class='val' value='{$exe2['Id_sm']}'><input type='text'name='entryMAT' id='entryMat' class='val' value='{$exe['Matricule']}'> <button class='btn'>Consulter</button></form>";
                                    echo"</div>";
                                }
                            }
                        }
                    }else{
                        echo"<section class='table_header2'><h3>Etudiant</h3> <a href='index.php' class='fas fa-refresh'></a></section>";
                        echo"<section class='contain'>";
                        echo"<div class='fold'>";
                        echo"<i class='fas fa-folder-open'></i>";
                        echo"<div  class='textp'><p>Vide 000000</p></div>";
                        echo"</div>";
                    }
                    
            echo"</section>";
       echo"</section>";
    }else{
        echo"NONNNN";
    }
?>
        <script src="js/script.js"></script>
    </div>
</body>
</html>