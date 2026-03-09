<?php
	include_once"connect.php";
?>
<?php
	session_start();
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
                        $mate = $_POST['entry'];
                        $query = "SELECT * FROM etudiant where Matricule like '{$mate}'";
                        $sql = mysqli_query($con,$query);
                        if($sql){
                            foreach($sql as $v):
                                echo"<div class='disAdd'> <section class='table_header'><h3>ATTRIBUTION DES NOTES</h3></section><section class='tableAdd'>";
                                echo"<div class='usercard'>";
                                echo"<div class='userlogo'><i class='fas fa-circle-user'></i></div>";
                                echo"<div class='personalinfo'>";
                                echo"<p>Matricule : {$v['Matricule']}</p>";
                                echo"<p>Nom : {$v['Nom']}</p>";
                                echo"<p>Télephone : {$v['Telephone']}</p>";
                                echo"<p>Sexe : {$v['Sexe']}</p>";
                                echo"</div>";
                                echo"</div>";
                                
                                echo"<div class='taf'>";
                                echo"<h3>SELECTION L'UE, LE TYPE D'EVALUATION ET ENTRER LA NOTE CORRESPONDANTE A CETTE ETUDIANT </h3>";
                                echo"<form action='Del.php' method='post'>";
                                echo"<div class='contenir'>";
                                echo"<p>UE</p> <select name='ue' id='ue'>";
                                $quer1 = "SELECT * from ue";
                                $sq1 = mysqli_query($con, $quer1);
                                if($sq1){
                                    foreach($sq1 as $ex):
                                        echo"<option value='{$ex['Id_UE']}'>{$ex['Nom_UE']}</option>";
                                    endforeach;
                                }
                                echo"</select>";
                                echo"<p>Type</p> <select name='type' id='type'>";
                                $quer2 = "SELECT * from typeeval";
                                $sq2 = mysqli_query($con, $quer2);
                                if($sq2){
                                    foreach($sq2 as $ex):
                                        echo"<option value='{$ex['Id_type']}'>{$ex['Nom_type']}</option>";
                                    endforeach;
                                }
                                echo"</select>";
                                echo"<input type='text'name='entry' id='entry' class='val' value='{$mate}'>";
                                echo"</div>";
                                echo"<button id='btnAdd''>Supprimer</button>";
                                echo"</form>";
                                echo"</div>";
                                echo"</section></div>"; 
                            endforeach;   
                    } 
                ?>

                <?php
                    if((isset($_POST['entry'])) && (isset($_POST['type'])) && (isset($_POST['ue']))){
                        $mate = $_POST['entry'];
                        $type = $_POST['type'];
                        $ue = $_POST['ue'];
                    }
                    if((!empty($mate)) && (!empty($type)) && (!empty($ue))){
                        $quer1 = "SELECT * from evaluation, typeeval as typ, ue WHERE((ue.Id_UE = {$ue}) && (evaluation.Id_UE = {$ue}) && (evaluation.Id_type = typ.Id_type) && (typ.Id_type = {$type}))";
                        $sqle1=mysqli_query($con, $quer1);
                        if($sqle1){
                            foreach($sqle1 as $gd){
                                $id_eval = $gd['Id_eval'];
                                $quer = "DELETE FROM participer where ((Matricule like '{$mate}') && (Id_eval = $id_eval))";
                                $sqle2=mysqli_query($con, $quer);
                                if($sqle2){
                                    echo"<script>alert('Suppréssion effectuée avec succès')</script>";
                                }else{
                                    echo"<script>alert('Erreur')</script>";
                                }
                            }
                        }else{
                            echo"<script>alert('note inexistante')</script>";
                        }
                          
                    }   
                ?>
                
</body>
</html>
