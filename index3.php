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
                    $query = "SELECT * FROM ue";
                    $sql = mysqli_query($con,$query);
                    if($sql){
                        foreach($sql as $v):
                            echo"<div class='dis'> <section class='table_header'><h3>AFFICHAGE DES NOTES DE L'UE {$v['Nom_UE']}</h3></section><section class='table'><table >";
                            echo"<tr><th>Matricule</th><th>Nom</th><th>CC/20</th><th>EE/40</th><th>EP/40</th><th>TOTAL/100</th><th>DEC</th><th>MENTION</th></tr>";
                            $rq1 = "SELECT DISTINCT Id_eval from evaluation, typeeval as typ, ue WHERE((ue.Id_UE = {$v['Id_UE']}) && (evaluation.Id_UE = {$v['Id_UE']}) && (evaluation.Id_type = typ.Id_type))";
                            $sqle1=mysqli_query($con, $rq1);
                            $som = 0;
                            if($sqle1){
                                $gd = mysqli_fetch_assoc($sqle1);
                                
                                    $id_eval = $gd['Id_eval'];
                                    $rq2 = "SELECT * from etudiant as e, participer as p, evaluation as eval where((p.Matricule IN (e.Matricule)) && (p.Id_eval = {$id_eval}) && (eval.Id_eval = {$id_eval}))";
                                    $sqle2=mysqli_query($con, $rq2);
                                    
                                    foreach( $sqle2 as $g){
                                        echo"<tr>";
                                        echo"<td>{$g['Matricule']}</td>";
                                        echo"<td>{$g['Nom']}</td>";

                                        $rq3="SELECT * from evaluation, typeeval as typ, ue WHERE((ue.Id_UE = {$v['Id_UE']}) && (evaluation.Id_UE = {$v['Id_UE']}) && (evaluation.Id_type = typ.Id_type) && (typ.Nom_type = 'CC'))";
                                        $sql3 = mysqli_query($con,$rq3);
                                        if($sql3){
                                            foreach($sql3 as $b){
                                                $id_eval = $b['Id_eval'];
                                                $rq4 = "SELECT * from etudiant as e, participer as p, evaluation as eval where((e.Matricule like p.Matricule) && (p.Id_eval = {$id_eval}) && (eval.Id_eval = {$id_eval}))";
                                                $sqle4=mysqli_query($con, $rq4);
                                                if(mysqli_num_rows($sqle4)>0){
                                                    foreach($sqle4 as $h){
                                                        $som+=$h['note'];
                                                        echo"<td>{$h['note']}</td>";  
                                                    }
                                                    
                                                }else{
                                                    echo"<td> </td>";  
                                                }
                                            }
                                        }

                                        $rq5="SELECT * from evaluation, typeeval as typ, ue WHERE((ue.Id_UE = {$v['Id_UE']}) && (evaluation.Id_UE = {$v['Id_UE']}) && (evaluation.Id_type = typ.Id_type) && (typ.Nom_type = 'SN'))";
                                        $sql5 = mysqli_query($con,$rq5);
                                        if($sql5){
                                            foreach($sql5 as $A){
                                                $id_eval = $A['Id_eval'];
                                                $rq6 = "SELECT * from etudiant as e, participer as p, evaluation as eval where((e.Matricule like p.Matricule) && (p.Id_eval = {$id_eval}) && (eval.Id_eval = {$id_eval}))";
                                                $sqle6=mysqli_query($con, $rq6);
                                                if(mysqli_num_rows($sqle6)>0){
                                                    foreach($sqle6 as $U){
                                                        $temp = 2*$U['note'];
                                                        $som+=$temp;
                                                        echo"<td>{$temp}</td>";  
                                                    }
                                                    
                                                }else{
                                                    echo"<td> </td>";  
                                                }
                                            }
                                        }

                                        $rq7="SELECT * from evaluation, typeeval as typ, ue WHERE((ue.Id_UE = {$v['Id_UE']}) && (evaluation.Id_UE = {$v['Id_UE']}) && (evaluation.Id_type = typ.Id_type) && (typ.Nom_type = 'TP'))";
                                        $sql7 = mysqli_query($con,$rq7);
                                        if($sql7){
                                            foreach($sql7 as $T){
                                                $id_eval = $T['Id_eval'];
                                                $rq8 = "SELECT * from etudiant as e, participer as p, evaluation as eval where((e.Matricule like p.Matricule) && (p.Id_eval = {$id_eval}) && (eval.Id_eval = {$id_eval}))";
                                                $sqle8=mysqli_query($con, $rq8);
                                                if(mysqli_num_rows($sqle8)>0){
                                                    foreach($sqle8 as $K){
                                                        $temp = 2*$K['note'];
                                                        $som+=$temp;
                                                        echo"<td>{$temp}</td>";  
                                                    }
                                                    
                                                }else{
                                                    echo"<td> </td>";  
                                                }
                                            }
                                        }
                                        echo"<td>{$som}</td>";
                                        if($som < 35 ){
                                            echo"<td>NC</td>"; 
                                        }else if(($som >= 35)&&($som < 50)){
                                            echo"<td>CANT</td>"; 
                                        }else if(($som >= 50)){
                                            echo"<td>CA</td>";
                                        }
                                        if($som < 35 ){
                                            echo"<td>F</td>"; 
                                        }else if(($som >= 35)&&($som < 40)){
                                            echo"<td>D-</td>"; 
                                        }else if(($som >= 40)&&($som < 45)){
                                            echo"<td>D</td>";
                                        }else if(($som >= 45)&&($som < 50)){
                                            echo"<td>C-</td>"; 
                                        }else if(($som >= 50)&&($som < 60)){
                                            echo"<td>C</td>"; 
                                        }else if(($som >= 60)&&($som < 65)){
                                            echo"<td>B-</td>";
                                        }else if(($som >= 65)&&($som < 70)){
                                            echo"<td>B</td>"; 
                                        }else if(($som >= 70)&&($som < 75)){
                                            echo"<td>A-</td>";
                                        }else if(($som >= 75)&&($som < 80)){
                                            echo"<td>A</td>"; 
                                        }else if(($som >= 80)){
                                            echo"<td>A+</td>";
                                        }
                                        echo"</tr>";
                                    }
                                
                            }
                            echo"</table></section></div>";  
                        endforeach;
                          
                }   
                ?> 
                
</body>
</html>