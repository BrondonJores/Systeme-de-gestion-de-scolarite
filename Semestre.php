<?php
	include_once"connect.php";
?>
<?php
	session_start();
    if((isset($_SESSION["entry"])) && (isset($_SESSION["entryMAT"])) && isset($_SESSION['UI']) && isset($_SESSION['PROF'])){
        $mate = $_SESSION["entryMAT"];
        $sem = $_SESSION["entry"];
        $matee = $_SESSION['UI'];
        $namee= $_SESSION['PROF'];
    }else{
        header("location: Dossier.php");
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
<header class="header">
    	<div id="menu-btn" class="fas fa-bars"></div>
    	<a href="#" class="Logo"> <i class="fas fa-globe-africa fa-fade"> </i> ProfEtud</a>
        <nav class="navbar">
        	<a href="index.php"><i class="fas fa-cog fa-spin"></i>Gestion des dossiers étudiants</a>
            <a href="index2.php"><i class="fas fa-pen fa-shake"></i>Gestion des notes</a>
            <a href="index3.php"><i class="fas fa-book-open fa-beat-fade"></i>Affichage des notes</a>
        </nav><div class="icon">
        	<a href="exit.php" class="fas fa-door-open"></a>
            <a href="indexprof.php" class="fas fa-home"></a>
        </div>
    </header>
<?php
    if(isset($_POST["entryMAT"])){
        $_SESSION["entryMAT"] = $_POST["entryMAT"];
        $mate = $_SESSION["entryMAT"];
    }
    if(isset($_POST["entry"])){
        $_SESSION['entry'] = $_POST["entry"];
        $sem = $_SESSION["entry"];
    }
    if(!empty($mate) && !empty($sem)){
        echo"<div class='dis2'>"; 
                    $req = "SELECT * FROM etudiant WHERE ((Matricule = '{$mate}'))";
                    $sql = mysqli_query($con, $req);
                    if($sql){
                       foreach($sql as $exe) {
                            $req2 = "SELECT * FROM semestre WHERE ((Id_sm = {$sem}))";
                            $sql2 = mysqli_query($con, $req2);
                            if($sql2){
                                foreach($sql2 as $exe2) {
                                    echo"<section class='table_header2'><h3>{$exe['Nom']}/{$exe2['NomS']}</h3> <a href='Dossier.php' class='fas fa-arrow-left'></a></section>";
                                    echo"<section class='contain'>";
                                    $query = "SELECT * FROM enseignant where UI like '{$matee}'";
                                    $sql = mysqli_query($con,$query);
                                    if($sql){
                                        foreach($sql as $v):
                                            
                                            
                                                $req3 = "SELECT * FROM ue WHERE ((Id_sm = {$sem}) && (Id_UE = '{$v['Id_UE']}'))";
                                                $sql3 = mysqli_query($con, $req3);
                                                if($sql3){
                                                    foreach($sql3 as $exe3) {
                                                        echo"<div class='fold'>";
                                                            echo"<i class='fas fa-folder'></i>";
                                                            echo"<div  class='textp' onclick='Folder()'><p>{$exe3['Nom_UE']}</p></div>";
                                                            echo"<form action='ue.php' method='post' class='contform'><input type='text'name='entry' id='entry' class='val' value='{$exe2['Id_sm']}'><input type='text'name='entryUE' id='entryUE' class='val' value='{$exe3['Id_UE']}'><input type='text'name='entryMAT' id='entry' class='val' value='{$exe['Matricule']}'> <button class='btn'>Consulter</button></form>";
                                                        echo"</div>";
                                                    }
                                                }
                                            
                                        endforeach;
                                    }
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