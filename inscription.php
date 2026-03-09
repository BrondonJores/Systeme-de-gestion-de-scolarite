<?php 
	session_start();
	include_once"connect.php";
    if(isset($_POST['nom_ins'])){
        $nom=  $_POST['nom_ins'];
    }
	
    if(isset($_POST['pass_ins'])){
        $password= $_POST['pass_ins'];
    }

	if(isset($_POST['mat_ins'])){
        $mat= $_POST['mat_ins'];
    }

	if(isset($_POST['conf_ins'])){
        $conf= $_POST['conf_ins'];
    }

    if(isset($_POST['email_ins'])){
        $email= $_POST['email_ins'];
    }

	if(!empty($nom) && !empty($password) && !empty($email) && !empty($conf) && !empty($mat)){
		if($conf != $password){
			echo"<script>alert('Les mots de passe ne coïncide pas');</script>";
		}else{
			$query="SELECT Matricule FROM etudiant where (Matricule = '{$mat}')";
			$sq1 = mysqli_query($con,$query);
			if(mysqli_num_rows($sq1)>0){
				$password_encryp = password_hash($password, PASSWORD_BCRYPT);
				$sql=mysqli_query($con, "INSERT INTO accounts(username, password, email, role) VALUES('{$nom}','{$password_encryp}','{$email}', '{$mat}')");
				if($sql){
						header("location: login.php");
				}else{
					echo"<script>alert('Information(s) erronée(s)');</script>";
				}
			}else{
				echo"<script>alert('Vous n'êtes pas étudiant dans l'université');</script>";
			}
				$query="SELECT UI FROM enseignant where (UI = '{$mat}')";
				$sq1 = mysqli_query($con,$query);
				if(mysqli_num_rows($sq1)>0){
					$password_encryp = password_hash($password, PASSWORD_BCRYPT);
					$sql=mysqli_query($con, "INSERT INTO accounts(username, password, email, role) VALUES('{$nom}','{$password_encryp}','{$email}', '{$mat}')");
					if($sql){
							header("location: login.php");
					}else{
						echo"<script>alert('Information(s) erronée(s)');</script>";
					}
				}
			
		}
	}
?>