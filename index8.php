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


                <?php
                    
                            echo"<div class='dis'> <section class='table_header'><h3>AFFICHAGE DES NOTES {$namee}</h3></section><section class='table'><table class='notes' >";
                            echo"<tr><th>Intitule de l'UE</th><th>CC/20</th><th>SN/40</th><th>TP/40</th><th>TOTAL/100</th><th>DEC</th><th>MENTION</th></tr>";
                            $query1="SELECT * FROM ue";
                            $sq1 = mysqli_query($con, $query1);
                            if($sq1){
                                foreach($sq1 as $val1):
                                    echo"<tr>";
                                    echo"<td>{$val1['Nom_UE']}</td>";
                                    $query2 = "SELECT * FROM typeeval as typ ";
                                    $sq2 = mysqli_query($con, $query2);
                                    if($sq2){
                                        $som = 0;
                                        $som2 = 0;
                                        $som1 = 0;
                                        foreach($sq2 as $val2):  
                                            
                                            if($val2["Nom_type"] == "CC"){
                                                
                                                $query3 = "SELECT * from participer as p, evaluation as e WHERE ((e.Id_type = {$val2['Id_type']}) && (p.Id_eval = e.Id_eval) && (p.Matricule = '{$mate}') && (e.Id_UE = {$val1['Id_UE']} ))";
                                                $sq3 = mysqli_query($con, $query3);
                                                if(mysqli_num_rows($sq3)>0){
                                                    foreach($sq3 as $val3): 
                                                        $temp = $val3['note'];
                                                        $temp *=1;
                                                        $som+=$temp;
                                                        echo"<td>{$temp}</td>";
                                                    endforeach;
                                                }else{
                                                    echo"<td>0</td>";
                                                }
                                            }
                                            
                                            if($val2["Nom_type"] == "SN"){
                                                
                                                $query3 = "SELECT * from participer as p, evaluation as e WHERE ((e.Id_type = {$val2['Id_type']}) && (p.Id_eval = e.Id_eval) && (p.Matricule = '{$mate}') && (e.Id_UE = {$val1['Id_UE']} ))";
                                                $sq3 = mysqli_query($con, $query3);
                                                if(mysqli_num_rows($sq3)>0){
                                                    foreach($sq3 as $val3): 
                                                        $temp = $val3['note'];
                                                        $temp *=2;
                                                        $som1+=$temp;
                                                        echo"<td>{$temp}</td>";
                                                    endforeach;
                                                }else{
                                                    echo"<td>0</td>";
                                                }
                                            }
                                          
                                            if($val2["Nom_type"] == "TP"){
                                                
                                                $query3 = "SELECT * from participer as p, evaluation as e WHERE ((e.Id_type = {$val2['Id_type']}) && (p.Id_eval = e.Id_eval) && (p.Matricule = '{$mate}') && (e.Id_UE = {$val1['Id_UE']} ))";
                                                $sq3 = mysqli_query($con, $query3);
                                                if(mysqli_num_rows($sq3)>0){
                                                    foreach($sq3 as $val3):
                                                        $temp = $val3['note'];
                                                        $temp *=2;
                                                        $som2+=$temp; 
                                                        echo"<td>{$temp}</td>";
                                                    endforeach;
                                                }else{
                                                    echo"<td>0</td>";
                                                }
                                            }
                                                                                      
                                            endforeach;
                                            $som2=$som2+$som+$som1;             
                                            echo"<td>$som2</td>"; 
                                            if($som2 < 35 ){
                                                echo"<td>NC</td>"; 
                                            }else if(($som2 >= 35)&&($som2 < 50)){
                                                echo"<td>CANT</td>"; 
                                            }else if(($som2 >= 50)){
                                                echo"<td>CA</td>";
                                            }
                                            if($som2 < 35 ){
                                                echo"<td>F</td>"; 
                                            }else if(($som2 >= 35)&&($som2 < 40)){
                                                echo"<td>D-</td>"; 
                                            }else if(($som2 >= 40)&&($som2 < 45)){
                                                echo"<td>D</td>";
                                            }else if(($som2 >= 45)&&($som2 < 50)){
                                                echo"<td>C-</td>"; 
                                            }else if(($som2 >= 50)&&($som2 < 60)){
                                                echo"<td>C</td>"; 
                                            }else if(($som2 >= 60)&&($som2 < 65)){
                                                echo"<td>B-</td>";
                                            }else if(($som2 >= 65)&&($som2 < 70)){
                                                echo"<td>B</td>"; 
                                            }else if(($som2 >= 70)&&($som2 < 75)){
                                                echo"<td>A-</td>";
                                            }else if(($som2 >= 75)&&($som2 < 80)){
                                                echo"<td>A</td>"; 
                                            }else if(($som2 >= 80)){
                                                echo"<td>A+</td>";
                                            }
                                            
                                    }
                                    
                                    echo"</tr>";
                                endforeach;
                            }

                            echo"</table></section></div>";   
                ?> 
                
</body>
</html>