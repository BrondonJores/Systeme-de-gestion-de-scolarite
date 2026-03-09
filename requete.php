<?php
    session_start();
	include_once"connect.php";
    if(isset($_SESSION['mat']) && isset($_SESSION['nom'])){
        $mate = $_SESSION['mat'];
        $namee= $_SESSION['nom'];
    }else{
        header("location: login.php");
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
        	<a href="requete.php"><i class="fas fa-cog fa-spin"></i>Déposer une requête</a>
            <a href="devoir.php"><i class="fas fa-cog fa-spin"></i>Déposer un devoir</a>
            <a href="index8.php"><i class="fas fa-book-open fa-beat-fade"></i>Consulter les notes</a>
        </nav>
        <div class="icon">
        	<a href="exit.php" class="fas fa-door-open"></a>
            <a href="index6.php" class="fas fa-home"></a>
        </div>
    </header>

    
    <div class='dis2'> 
        <section class='table_header2'><h3>DEPOT DES REQUETES</h3></section>
            <section class="contain" id="con">
                <form action="requete.php" method="post" enctype ="multipart/form-data">
                    <div class="title">
                        <h3>REMPLIR SOIGNEUSEMENT LE FORMULAIRE SUIVANT TOUTE ERREUR POURRAIS EMPECHER LE TRAITEMENT DE VOTRE DEMANDE</h3>
                    </div>

                    <div class="input-field">
                        <p>Votre Nom :</p>
						<select class="n" name="mat" required>
						<?php
							$quer = "SELECT Matricule,Nom from etudiant where (Matricule = '{$mate}')";
							$ex = mysqli_query($con, $quer);
							if($ex){
								foreach ($ex as $value) :
									echo"<option value='{$value['Matricule']}'>{$value['Nom']}</option> <br>";
									
								endforeach;
								
							}else{
								echo"<option value='0'>Vide</option>";
							}
						?>
					</select><br><br>
                    </div>

                    <div class="input-field">
                        <p>Selectionner l'UE :</p>
						<select class="n" name="ideval" required>
						<?php
							$quer = "SELECT *,ue.Id_UE,Nom_UE, eval.Id_UE, eval.Id_type, typ.Id_type from ue, evaluation as eval, typeeval as typ where((eval.Id_UE = ue.Id_UE) && (eval.Id_type = typ.Id_type) && (Nom_type NOT LIKE 'TD'))";
							$ex = mysqli_query($con, $quer);
							if($ex){
								foreach ($ex as $value) :
									echo"<option value='{$value['Id_eval']}'> {$value['Nom_type']} de {$value['Nom_UE']}</option> <br>";
									
								endforeach;
								
							}else{
								echo"<option value='0'>Vide</option>";
							}
						?>
					</select><br><br>
                    </div>

                    <div class="input-field">
                        <p style="text-transform: capitalize;">Objet de votre requête :</p>
						<input type="text" name="rqo" id="rqo">
                    </div>

                    <div class="input-field">
                        <p>Téleverser votre requête :</p>
						<input type="file" name="rq" id="rq">
                    </div>

                    <div class="button">
                        <button id="sombtn">Soumettre</button>
                    </div>
                </form>   
            </section>
           
        </section>
    </div>

    <?php 

        if(isset($_POST['mat'])){
            $mat=  $_POST['mat'];
        }
        
        if(isset($_POST['ideval'])){
            $ideval= $_POST['ideval'];
        }

        if(isset($_POST['rqo'])){
            $rqo= $_POST['rqo'];
        }
        if(!empty($mat) && !empty($ideval) && !empty($rqo)){
            $targetDirRq = "Documents/Requete/";
            $targetFileRq = $targetDirRq.$mat.$ideval.basename($_FILES["rq"]["name"]);

            if((move_uploaded_file($_FILES["rq"]["tmp_name"], $targetFileRq))){
                if(!empty($mat) && !empty($ideval)){
                    $query1 = "SELECT * FROM reqetrep";
                    $sql1=mysqli_query($con, $query1);
                    $num = mysqli_num_rows($sql1);
                    $id=$num+1;
                    $targetFileRq = $mat.$ideval.basename($_FILES["rq"]["name"]);
                    $query = "INSERT INTO reqetrep VALUES ($id,{$ideval},'{$mat}','{$targetFileRq}', '$rqo')";
                    $sql=mysqli_query($con, $query);
                    if($sql){
                            echo"<script>alert('Requête déposée avec succès')</script>";
                            header("location: index6.php");
            
                    }else{
                        echo"<script>alert('Information(s) erronée(s)')</script>";
                    }
                }else{
                        echo"<script>alert('Tous les champs doivent être remplis')</script>";
                }
            }else{
                echo"Erreur";
            }
        }
        
    ?>
    <script src="js/pre.js"></script>
</body>
</html>