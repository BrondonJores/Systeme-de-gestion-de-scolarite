<?php 
	session_start();
	include_once"connect.php";
    if(isset($_POST['nom_con'])){
        $nom=  $_POST['nom_con'];
    }
	
    if(isset($_POST['pass_con'])){
        $password= $_POST['pass_con'];
    }

	if(!empty($nom) && !empty($password)){

		$sql=mysqli_query($con, "SELECT * FROM accounts where username = '{$nom}'");
		if(mysqli_num_rows($sql)>0){
			foreach($sql as $passbd):
				if(password_verify($password, $passbd['password'])){
					$quer="SELECT * from etudiant where (Matricule = '{$passbd['role']}') ";
					$sq1=mysqli_query($con,$quer);
					if(mysqli_num_rows($sq1)>0){
						$nom = mysqli_fetch_assoc($sq1);
						$_SESSION['mat']=$passbd['role'];
						$_SESSION['nom']=$nom['Nom'];
						header('location: index6.php');
					}else{
						$quer="SELECT * from enseignant where (UI = {$passbd['role']}) ";
						$sq1=mysqli_query($con,$quer);
						if(mysqli_num_rows($sq1)>0){
							$nom = mysqli_fetch_assoc($sq1);
							$_SESSION['UI']=$passbd['role'];
							$_SESSION['PROF']=$nom['Nom_enseignant'];
							header('location: indexprof.php');
						}
					}
					if(($nom == "Admin") && ($password == "Admin")){
						header('location: index.php');
					}
				}
			endforeach;		
		}else{
			echo"<script>alert('Information(s) erronée(s)');</script>";
		}
	}
?>