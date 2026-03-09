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
                    $query = "SELECT * FROM etudiant order by Nom ASC";
                    $sql = mysqli_query($con,$query);
                    if($sql){
                        echo"<div class='dis'> <section class='table_header'><h3>GESTION DES NOTES</h3></section><section class='table'><table >";
                        echo"<tr><th>Matricule</th><th>Nom</th><th>Date naissance</th><th>Sexe</th><th>Telephone</th><th>Region</th><th>Type de Bacc</th><th>Attribuer</th><th>Modifier</th><th>Supprimer</th></tr>";
                        $num = mysqli_num_rows($sql);
                        foreach($sql as $v):
                            echo"<tr>";
                            echo"<td> <i class='fas fa-circle-user fa-beat'></i> {$v['Matricule']}</td>";
                            echo"<td> {$v['Nom']} </td>";
                            echo"<td> {$v['Date_naissance']} </td>";
                            echo"<td> {$v['Sexe']} </td>";
                            echo"<td> {$v['Telephone']}</td>";
                            echo"<td> {$v['Region_ori']} </td>";
                            echo"<td> {$v['Type_bacc']} </td>";
                            echo"<td><form action='Add.php' method='post' class='contform'><input type='text'name='entry' id='entry' class='val' value='{$v['Matricule']}'> <button class='fas fa-plus-square' id='add'></button></form></td>";
                            echo"<td><form action='Mod.php' method='post' class='contform'><input type='text'name='entry' id='entry' class='val' value='{$v['Matricule']}'> <button class='fas fa-pen' id='mod'></button></form></td>";
                            echo"<td><form action='Del.php' method='post' class='contform'><input type='text'name='entry' id='entry' class='val' value='{$v['Matricule']}'> <button class='fas fa-trash-alt' id='delt'></button></form></td>";

                            echo"</tr>";
                        endforeach;
                            echo"<tr>"; 
                            echo"<td colspan='9'>Total</td>";
                            echo"<td>{$num}</td>";
                            echo"</tr>";
                        echo"</table></section></div>";    
                }   
                ?> 
</body>
</html>