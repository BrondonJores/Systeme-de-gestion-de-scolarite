<?php
    session_start();
	include_once"connect.php";
    if(isset($_SESSION['UI']) && isset($_SESSION['PROF'])){
        $mate = $_SESSION['UI'];
        $namee= $_SESSION['PROF'];
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
        </nav>
        <div class="icon">
        	<a href="exit.php" class="fas fa-door-open"></a>
            <a href="indexprof.php" class="fas fa-home"></a>
        </div>
    </header>

    
    <div class='dis2'> 
        <section class='table_header2'><h3>BIENVENUE SUR ProfEtud </h3></section>
            <section class="contain" id="con">
                <?php
                        $query = "SELECT * FROM enseignant where UI like '{$mate}'";
                        $sql = mysqli_query($con,$query);
                        if($sql){
                            foreach($sql as $v):
                                echo"<div class='carte'>";
                                echo"<div class='carte_image'><i class='fas fa-circle-user'></i></div>";
                                $qo = "SELECT * from ue where(Id_UE = '{$v['Id_UE']}')";
                                $sq2=mysqli_query($con, $qo);
                                if($sq2){
                                    $ue = mysqli_fetch_assoc($sq2);
                                    echo"<h2>PROFESSEUR EN ICT <span>{$ue['Nom_UE']}</span></h2>";
                                }
                                
                                echo"<p>Matricule : <span>{$v['UI']}</span></p>";
                                echo"<p>Nom : <span>{$v['Nom_enseignant']}</span></p>";
                                echo"<p>Télephone : <span>{$v['Telephone']}</span></p>";
                                echo"<p>Sexe : <span>{$v['adresse']}</span></p>";
                                echo"<h2 id='ok'>RESTEZ <span>CONNECTEZ</span></h2>";
                                echo"<div class='social_icon'>";
                                echo"<a href='#'><i class='fab fa-facebook'></i></a>";
                                echo"<a href='#'><i class='fab fa-twitter'></i></a>";
                                echo"<a href='#'><i class='fab fa-linkedin'></i></a>";
                                echo"</div>";
                                echo"</div>";
                            endforeach;
                        }
                ?>    
                    <div class='dash'>
                        <h2>Consulter les dossiers <a href="index.php" class='fas fa-arrow-right'></a></h2>
                        <div class='containt'>
                            <h2>Requête déjà déposée</h2>
                            <?php
                                $query = "SELECT * FROM enseignant where UI like '{$mate}'";
                                $sql = mysqli_query($con,$query);
                                if($sql){
                                    foreach($sql as $v):
                                        $query = "SELECT * FROM evaluation as e where (e.Id_UE like '{$v['Id_UE']}')";
                                        $sq2=mysqli_query($con,$query);
                                        if($sq2){
                                            foreach($sq2 as $ue){
                                                $query = "SELECT * FROM reqetrep where Id_eval like {$ue['Id_eval']}";
                                                $sql = mysqli_query($con,$query);
                                                if($sql){
                                                    foreach($sql as $v):
                                                        echo"<p><i class='fas fa-file'></i><span> {$v['Objet']}</span><a href='Documents/requete/{$v['Nom_fichier']}' class='fas fa-arrow-down'></a></p>";
                                                    endforeach;
                                                }
                                            }
                                        }
                                        
                                    endforeach;
                                        echo"<h2>devoir déjà déposé</h2>";
                                        $query = "SELECT * FROM enseignant where UI like '{$mate}'";
                                        $sql = mysqli_query($con,$query);
                                        if($sql){
                                            foreach($sql as $v):
                                                $query = "SELECT * FROM evaluation as e where (e.Id_UE like '{$v['Id_UE']}')";
                                                $sq2=mysqli_query($con,$query);
                                                if($sq2){
                                                    foreach($sq2 as $ue){
                                    
                                                        $query = "SELECT * FROM devoir where Id_eval like {$ue['Id_eval']}";
                                                        $sql = mysqli_query($con,$query);
                                                        if($sql){
                                                            foreach($sql as $v):
                                                                echo"<p><i class='fas fa-file-zipper'></i><span> {$v['intitule']}</span><a href='Documents/devoir/{$v['Nom_devoir']}' class='fas fa-arrow-down'></a></p>";
                                                            endforeach;
                                                        }
                                                    }
                                                }
                                                
                                            endforeach;
                                        }
                                }                                
                            ?>
                        </div>
                        <h2>Consulter ses notes <a href='index2.php' class='fas fa-arrow-right'></a></h2>
                </div>
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
            $targetFileRq = $targetDirRq.$mat.basename($_FILES["rq"]["name"]);

            if((move_uploaded_file($_FILES["rq"]["tmp_name"], $targetFileRq))){
                if(!empty($mat) && !empty($ideval)){
                    $query1 = "SELECT * FROM reqetrep";
                    $sql1=mysqli_query($con, $query1);
                    $num = mysqli_num_rows($sql1);
                    $id=$num+1;
                    $targetFileRq = $mat.basename($_FILES["rq"]["name"]);
                    $query = "INSERT INTO reqetrep VALUES ($id,{$ideval},'{$mat}','{$targetFileRq}', '$rqo')";
                    $sql=mysqli_query($con, $query);
                    if($sql){
                            echo"<script>alert('Requête déposée avec succès')</script>";
            
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