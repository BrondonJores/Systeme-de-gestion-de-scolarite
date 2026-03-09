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
    
    <div class='dis2'> 
        <section class='table_header2'><h3>Liste des étudiants</h3> <form action="Dossier.php" method="post" class="search"><input type="text" placeholder="Recherchez ici par le matricule" name="entry" id="entry"> <button class="fas fa-search"></button></form><a href="index.php" class="fas fa-refresh"></a></section>
            <section class="contain" id="con">
                <?php
                    $req = "SELECT * FROM etudiant as et, participer as pa where et.Matricule like pa.Matricule";
                    $sql = mysqli_query($con, $req);
                    $num = mysqli_num_rows($sql);
                    if($sql){
                        foreach($sql as $exe) { 
                            echo"<div class='fold'>";
                                echo"<i class='fas fa-user'></i>";
                                echo"<p>{$exe['Nom']} {$exe['Matricule']}</p>";
                                echo"<form action='Dossier.php' method='post' class='contform'><input type='text'name='entry' id='entry' class='val' value='{$exe['Matricule']}'> <button class='btn'>Consulter</button></form>";
                            echo"</div>";
                            $num--;
                        }
                    }else{
                        echo"<div class='fold'>";
                        echo"<i class='fas fa-folder-open'></i>";
                        echo"<div  class='textp'><p>Vide 000000</p></div>";
                        echo"</div>";
                    }
                    
                ?>    
            </section>
           
        </section>
    </div>
</body>
</html>