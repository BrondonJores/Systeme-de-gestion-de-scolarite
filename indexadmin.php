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
        </nav><div class="icon">
        	<a href="exit.php" class="fas fa-door-open"></a>
            <a href="indexprof.php" class="fas fa-home"></a>
        </div>
    </header>

    
   
</body>
</html>