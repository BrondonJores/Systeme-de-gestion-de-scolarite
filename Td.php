<?php
	include_once"connect.php";
?>
<?php
	session_start();
    if((isset($_SESSION["entry"])) && (isset($_SESSION["entryMAT"]))&& (isset($_SESSION["entryUE"])) && (isset($_SESSION["entryr"]))){
        $mate = $_SESSION["entryMAT"];
        $sem = $_SESSION["entry"];
        $idue = $_SESSION["entryUE"];
        $nomr = $_SESSION["entryr"];
    }else{
        header("location: ue.php");
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
        $_SESSION["entry"] = $_POST["entry"];
        $sem = $_SESSION["entry"];
    }
    if(isset($_POST["entryUE"])){
        $_SESSION["entryUE"] = $_POST["entryUE"];
        $idue = $_POST["entryUE"];
    }
    if(isset($_POST["entryr"])){
        $_SESSION["entryr"] = $_POST["entryr"];
        $nomr = $_POST["entryr"];
    }
    if(!empty($mate) && !empty($sem) && !empty($idue) && !empty($nomr)){
        if($nomr == "requete"){
            echo"<div class='dis2'>"; 
                    $req = "SELECT * FROM etudiant WHERE ((Matricule = '{$mate}'))";
                    $sql = mysqli_query($con, $req);
                    if($sql){
                       foreach($sql as $exe) {
                            $req2 = "SELECT * FROM semestre WHERE ((Id_sm = {$sem}))";
                            $sql2 = mysqli_query($con, $req2);
                            if($sql2){
                                foreach($sql2 as $exe2) {
                                    $req3 = "SELECT * FROM ue WHERE ((Id_sm = {$sem}) && (ue.Id_UE = {$idue}))";
                                    $sql3 = mysqli_query($con, $req3);
                                    if($sql3){
                                        foreach($sql3 as $exe3) {
                                            echo"<section class='table_header2'><h3>{$exe['Nom']}/{$exe2['NomS']}/{$exe3['Nom_UE']}/{$nomr}</h3> <a href='ue.php' class='fas fa-arrow-left'></a></section>";  
                                            echo"<section class='contain'>";
                                            $req4 = "SELECT * FROM ue, evaluation, etudiant as e, reqetrep as req WHERE ((ue.Id_UE = {$idue}) && (evaluation.Id_UE = {$idue}) && (req.Id_eval = evaluation.Id_eval) && (req.Matricule = '{$mate}') && (e.Matricule = '{$mate}') && (req.Matricule = e.Matricule) )";
                                            $sql4 = mysqli_query($con, $req4);
                                            if($sql4){
                                                foreach($sql4 as $exe4) {
                                                    echo"<div class='fold'>";
                                                        echo"<i class='fas fa-file'></i>";
                                                        echo"<div  class='textp' onclick='Folder()'><p>{$exe4['Objet']}</p></div>";
                                                        echo"<a href='Documents/Requete/{$exe4['Nom_fichier']}' class='abtn'>Télecharger</a>";
                                                        
                                                    echo"</div>";
                                                }
                                            }else{
                                                echo"NOM";
                                            }
                                        }
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
        }
        if($nomr == "TD"){
            echo"<div class='dis2'>"; 
                    $req = "SELECT * FROM etudiant WHERE ((Matricule = '{$mate}'))";
                    $sql = mysqli_query($con, $req);
                    if($sql){
                       foreach($sql as $exe) {
                            $req2 = "SELECT * FROM semestre WHERE ((Id_sm = {$sem}))";
                            $sql2 = mysqli_query($con, $req2);
                            if($sql2){
                                foreach($sql2 as $exe2) {
                                    $req3 = "SELECT * FROM ue WHERE ((Id_sm = {$sem}) && (ue.Id_UE = {$idue}))";
                                    $sql3 = mysqli_query($con, $req3);
                                    if($sql3){
                                        foreach($sql3 as $exe3) {
                                            echo"<section class='table_header2'><h3>{$exe['Nom']}/{$exe2['NomS']}/{$exe3['Nom_UE']}/{$nomr}</h3> <a href='ue.php' class='fas fa-arrow-left'></a></section>";  
                                            echo"<section class='contain'>";
                                            $req4 = "SELECT * FROM ue, evaluation, etudiant as e, devoir as dev,typeeval as typ WHERE ((ue.Id_UE = {$idue}) && (evaluation.Id_UE = {$idue}) && (dev.Id_eval = evaluation.Id_eval) && (dev.Matricule = '{$mate}') && (e.Matricule = '{$mate}') && (dev.Matricule = e.Matricule) && (typ.Nom_type = 'TD') && (evaluation.Id_type = typ.Id_type))";
                                            $sql4 = mysqli_query($con, $req4);
                                            if($sql4){
                                                foreach($sql4 as $exe4) {
                                                    echo"<div class='fold'>";
                                                        echo"<i class='fas fa-file'></i>";
                                                        echo"<div  class='textp' onclick='Folder()'><p>{$exe4['intitule']}</p></div>";
                                                        echo"<a href='Documents/Devoir/{$exe4['Nom_devoir']}' class='abtn'>Télecharger</a>";
                                                        
                                                    echo"</div>";
                                                }
                                            }else{
                                                echo"NON";
                                            }
                                        }
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
        }
        if($nomr == "TP"){
            echo"<div class='dis2'>"; 
                    $req = "SELECT * FROM etudiant WHERE ((Matricule = '{$mate}'))";
                    $sql = mysqli_query($con, $req);
                    if($sql){
                       foreach($sql as $exe) {
                            $req2 = "SELECT * FROM semestre WHERE ((Id_sm = {$sem}))";
                            $sql2 = mysqli_query($con, $req2);
                            if($sql2){
                                foreach($sql2 as $exe2) {
                                    $req3 = "SELECT * FROM ue WHERE ((Id_sm = {$sem}) && (ue.Id_UE = {$idue}))";
                                    $sql3 = mysqli_query($con, $req3);
                                    if($sql3){
                                        foreach($sql3 as $exe3) {
                                            echo"<section class='table_header2'><h3>{$exe['Nom']}/{$exe2['NomS']}/{$exe3['Nom_UE']}/{$nomr}</h3> <a href='ue.php' class='fas fa-arrow-left'></a></section>";  
                                            echo"<section class='contain'>";
                                            $req4 = "SELECT * FROM ue, evaluation, etudiant as e, devoir as dev,typeeval as typ WHERE ((ue.Id_UE = {$idue}) && (evaluation.Id_UE = {$idue}) && (dev.Id_eval = evaluation.Id_eval) && (dev.Matricule = '{$mate}') && (e.Matricule = '{$mate}') && (dev.Matricule = e.Matricule) && (typ.Nom_type = 'TP') && (evaluation.Id_type = typ.Id_type))";
                                            $sql4 = mysqli_query($con, $req4);
                                            if($sql4){
                                                foreach($sql4 as $exe4) {
                                                    echo"<div class='fold'>";
                                                        echo"<i class='fas fa-file'></i>";
                                                        echo"<div  class='textp' onclick='Folder()'><p>{$exe4['intitule']}</p></div>";
                                                        echo"<a href='Documents/Devoir/{$exe4['Nom_devoir']}' class='abtn'>Télecharger</a>";
                                                        
                                                    echo"</div>";
                                                }
                                            }else{
                                                echo"NOM";
                                            }
                                        }
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
        }
        if($nomr == "CC"){
            echo"<div class='dis2'>"; 
                    $req = "SELECT * FROM etudiant WHERE ((Matricule = '{$mate}'))";
                    $sql = mysqli_query($con, $req);
                    if($sql){
                       foreach($sql as $exe) {
                            $req2 = "SELECT * FROM semestre WHERE ((Id_sm = {$sem}))";
                            $sql2 = mysqli_query($con, $req2);
                            if($sql2){
                                foreach($sql2 as $exe2) {
                                    $req3 = "SELECT * FROM ue WHERE ((Id_sm = {$sem}) && (ue.Id_UE = {$idue}))";
                                    $sql3 = mysqli_query($con, $req3);
                                    if($sql3){
                                        foreach($sql3 as $exe3) {
                                            echo"<section class='table_header2'><h3>{$exe['Nom']}/{$exe2['NomS']}/{$exe3['Nom_UE']}/{$nomr}</h3> <a href='ue.php' class='fas fa-arrow-left'></a></section>";  
                                            echo"<section class='contain'>";
                                            $req4 = "SELECT * FROM ue, evaluation, etudiant as e, devoir as dev,typeeval as typ WHERE ((ue.Id_UE = {$idue}) && (evaluation.Id_UE = {$idue}) && (dev.Id_eval = evaluation.Id_eval) && (dev.Matricule = '{$mate}') && (e.Matricule = '{$mate}') && (dev.Matricule = e.Matricule) && (typ.Nom_type = 'CC') && (evaluation.Id_type = typ.Id_type))";
                                            $sql4 = mysqli_query($con, $req4);
                                            if($sql4){
                                                foreach($sql4 as $exe4) {
                                                    echo"<div class='fold'>";
                                                        echo"<i class='fas fa-file'></i>";
                                                        echo"<div  class='textp' onclick='Folder()'><p>{$exe4['intitule']}</p></div>";
                                                        echo"<a href='Documents/Devoir/{$exe4['Nom_devoir']}' class='abtn'>Télecharger</a>";
                                                        
                                                    echo"</div>";
                                                }
                                            }else{
                                                echo"NOM";
                                            }
                                        }
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
        }
        if($nomr == "SN"){
            echo"<div class='dis2'>"; 
                    $req = "SELECT * FROM etudiant WHERE ((Matricule = '{$mate}'))";
                    $sql = mysqli_query($con, $req);
                    if($sql){
                       foreach($sql as $exe) {
                            $req2 = "SELECT * FROM semestre WHERE ((Id_sm = {$sem}))";
                            $sql2 = mysqli_query($con, $req2);
                            if($sql2){
                                foreach($sql2 as $exe2) {
                                    $req3 = "SELECT * FROM ue WHERE ((Id_sm = {$sem}) && (ue.Id_UE = {$idue}))";
                                    $sql3 = mysqli_query($con, $req3);
                                    if($sql3){
                                        foreach($sql3 as $exe3) {
                                            echo"<section class='table_header2'><h3>{$exe['Nom']}/{$exe2['NomS']}/{$exe3['Nom_UE']}/{$nomr}</h3> <a href='ue.php' class='fas fa-arrow-left'></a></section>";  
                                            echo"<section class='contain'>";
                                            $req4 = "SELECT * FROM ue, evaluation, etudiant as e, devoir as dev,typeeval as typ WHERE ((ue.Id_UE = {$idue}) && (evaluation.Id_UE = {$idue}) && (dev.Id_eval = evaluation.Id_eval) && (dev.Matricule = '{$mate}') && (e.Matricule = '{$mate}') && (dev.Matricule = e.Matricule) && (typ.Nom_type = 'SN') && (evaluation.Id_type = typ.Id_type))";
                                            $sql4 = mysqli_query($con, $req4);
                                            if($sql4){
                                                foreach($sql4 as $exe4) {
                                                    echo"<div class='fold'>";
                                                        echo"<i class='fas fa-file'></i>";
                                                        echo"<div  class='textp' onclick='Folder()'><p>{$exe4['intitule']}</p></div>";
                                                        echo"<a href='Documents/Devoir/{$exe4['Nom_devoir']}' class='abtn'>Télecharger</a>";
                                                        
                                                    echo"</div>";
                                                }
                                            }else{
                                                echo"NOM";
                                            }
                                        }
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
        }
    }else{
        echo"NONNNN";
    }
?>

<?php
	if(isset($_POST['Notetp'])){
        $notetp = $_POST['Notetp'];
    }
    if(!empty($notetp)){
        $quer1 = "SELECT * from evaluation, typeeval as typ, ue WHERE((ue.Id_UE = {$idue}) && (evaluation.Id_UE = {$idue}) && (evaluation.Id_type = typ.Id_type) && (typ.Nom_type = 'TP'))";
        $sqle1=mysqli_query($con, $quer1);
        foreach($sqle1 as $gd){
            $id_eval = $gd['Id_eval'];
            $quer = "INSERT INTO participer VALUES ('{$mate}', {$id_eval}, {$notetp})";
            $sqle2=mysqli_query($con, $quer);
            if($sqle2){
                echo"<script>alert('Note afféctée avec succès')</script>";
            }else{
                echo"<script>alert('Erreur')</script>";
            }
        }
    }
?>

<?php
	if(isset($_POST['Notecc'])){
        $notecc = $_POST['Notecc'];
    }
    if(!empty($notecc)){
        $quer1 = "SELECT * from evaluation, typeeval as typ, ue WHERE((ue.Id_UE = {$idue}) && (evaluation.Id_UE = {$idue}) && (evaluation.Id_type = typ.Id_type) && (typ.Nom_type = 'CC'))";
        $sqle1=mysqli_query($con, $quer1);
        foreach($sqle1 as $gd){
            $id_eval = $gd['Id_eval'];
            $quer = "INSERT INTO participer VALUES ('{$mate}', {$id_eval}, {$notecc})";
            $sqle2=mysqli_query($con, $quer);
            if($sqle2){
                echo"<script>alert('Note afféctée avec succès')</script>";
            }else{
                echo"<script>alert('Erreur')</script>";
            }
        }
    }
?>

<?php
	if(isset($_POST['Notesn'])){
        $notesn = $_POST['Notesn'];
    }
    if(!empty($notesn)){
        $quer1 = "SELECT * from evaluation, typeeval as typ, ue WHERE((ue.Id_UE = {$idue}) && (evaluation.Id_UE = {$idue}) && (evaluation.Id_type = typ.Id_type) && (typ.Nom_type = 'SN'))";
        $sqle1=mysqli_query($con, $quer1);
        foreach($sqle1 as $gd){
            $id_eval = $gd['Id_eval'];
            $quer = "INSERT INTO participer VALUES ('{$mate}', {$id_eval}, {$notesn})";
            $sqle2=mysqli_query($con, $quer);
            if($sqle2){
                echo"<script>alert('Note afféctée avec succès')</script>";
            }else{
                echo"<script>alert('Erreur')</script>";
            }
        }
    }
?>

        <script src="js/script.js"></script>
    </div>
</body>
</html>